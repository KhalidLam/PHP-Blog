<?php require "db.php"; ?>
<?php 

// Get type from header
$type = $_GET['type'];

if ($conn) {
    
    if (isset($_POST["submit"])) {
        
        switch($type){
            case "article":
                // Upload Image
                uploadImage("arImage", "../img/article/");

                // PREPARE DATA TO INSERT INTO DB 
                $data = array (
                    "article_title" => $_POST["arTitle"],
                    "article_content" => $_POST["arContent"],
                    "article_image" => $_FILES["arImage"]["name"],
                    "article_created_time" => date('Y-m-d H:i:s'),
                    "id_categorie" => $_POST["arCategory"],
                    "id_autheur" => $_POST["arAutheur"]
                );

                // $tableName = 'article';

                // Call insert function 
                insertToDB($conn, $type, $data);

                // Go to show.php 
                // header("refresh:1; url=../index.php");
                header("Location: ../index.php", true, 301);
                exit;
                break;

            case "category":

                 // Upload Image
                uploadImage("catImage", "../img/category/");
                
                // PREPARE DATA TO INSERT INTO DB 
                $data = array (
                    "category_name"  => $_POST["catName"],
                    "category_image" => $_FILES["catImage"]["name"],
                    "category_color" => $_POST["catColor"],
                );

                // $tableName = 'category';

                // Call insert function 
                insertToDB($conn, $type, $data);

                // Go to show.php 
                // header("refresh:1; url=../categories.php");
                header("Location: ../categories.php", true, 301);
                exit;
                break;

            case "autheur":

                // Upload Image
                uploadImage("authImage", "../img/avatar/");

                // PREPARE DATA TO INSERT INTO DB 
                $data = array(
                    "autheur_fullname" => $_POST["authName"],
                    "autheur_desc" => $_POST["authDesc"],
                    "autheur_email" =>  $_POST["authEmail"],
                    "autheur_twitter" =>  $_POST["authTwitter"],
                    "autheur_github" => $_POST["authGithub"],
                    "autheur_link" => $_POST["authLinkedin"],
                    "autheur_avatar" =>$_FILES["authImage"]["name"]
                );

                $tableName = 'autheur';

                // Call insert function 
                insertToDB($conn, $tableName, $data);

                // Go to show.php 
                // header("refresh:1; url=../autheur.php");
                header("Location: ../autheur.php", true, 301);
                exit;
                break;
            
            case "comment":
                
                $id = $_POST["id_article"];

                // PREPARE DATA TO INSERT INTO DB 
                $data = array(
                    "comment_username" => $_POST["username"],
                    // "comment_avatar" => $_POST["comment_avatar"],
                    "comment_content" => $_POST["comment"],
                    "comment_date" => date('Y-m-d H:i:s'),
                    "id_article" =>  $_POST["id_article"]
                );

                $tableName = 'comment';

                // Call insert function 
                insertToDB($conn, $tableName, $data);

                // Go to show.php 
                // header("refresh:1; url=../single_article.php?id=$id");
                header("Location: ../single_article.php?id=$id", true, 301);
                exit;
                break;
            
            default:
                echo "ERROR";
                break;
        }
    }

}else {
    echo 'Error: ' . $e->getMessage();
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

function implodeArray($array){
    return implode(", ", $array);
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