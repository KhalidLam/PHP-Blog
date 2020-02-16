<?php require "db.php"; ?>
<?php 

if ($conn) {

    if (isset($_POST["insert"])) {

        // Upload Image
        uploadImage("catImage", "../img/category/");
        
        // PREPARE DATA TO INSERT INTO DB 
        $data = array (
            "category_name"  => $_POST["catName"],
            "category_image" => $_FILES["catImage"]["name"],
            "category_color" => $_POST["catColor"],
        );

        $tableName = 'category';

        // Call insert function 
        insertToDB($conn, $tableName, $data);

        // Go to show.php 
        header("refresh:1; url=../categories.php");
    }

}else {
    echo 'Error: ' . $e->getMessage();
}

function implodeArray($array){
    return implode(", ", $array);
}

function insertToDB($conn, $table, $data){

    // Get keys string from data array 
    $columns = implodeArray(array_keys($data));

    // Get values string from data array with prefix (:) added  
    $prefixed_array = preg_filter('/^/', ':', array_keys($data));
    $values = implodeArray($prefixed_array);

    try {
        // prepare sql and bind parameters
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $conn->prepare($sql);

        // insert row
        $stmt->execute($data);

        echo "New records created successfully";

    } catch (PDOException $error) {
        echo $error;
    }
}

function uploadImage($name, $dest){
    // Upload Image
    $fileName = $_FILES[$name]['name'];
    $fileTmpName = $_FILES[$name]['tmp_name'];
    $fileError = $_FILES[$name]['error'];

    if($fileError === 0){
        $fileDestination = $dest.$fileName;
        move_uploaded_file($fileTmpName, $fileDestination);
        echo "Image Upload Successful";
    }else {
        echo "Image Upload Error";
    }
}

?>