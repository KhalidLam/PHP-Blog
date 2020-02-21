<?php require "db.php"; ?>
<?php 

// Get type from header
$type = $_GET['type'];
$urlId = $_GET["id"];
$urlImage = $_GET['img'];

if ($conn) {
        
    if (isset($_POST["update"])) {
        
        switch($type){
            case "article":
                
                // Update DataBase  
                $title = test_input($_POST["arTitle"]);
                $content = $_POST["arContent"];
                $categorie = test_input($_POST["arCategory"]);
                $autheur = test_input($_POST["arAutheur"]);
                $imageName = test_input($_FILES["arImage"]["name"]);

                // Upload Image
                if($_FILES["arImage"]['error'] === 0){
                    uploadImage("arImage", "../img/article/");
                }else { 
                    $imageName = $urlImage;  
                }

                try {
                    $sql = "UPDATE `article` 
                        SET `article_title`= ?, `article_content`= ?,`article_image`=?, `id_categorie`=?, `id_autheur`= ? 
                        WHERE `article_id` = ?";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$title, $content, $imageName, $categorie, $autheur, $urlId]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Article UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                // header("refresh:1; url=../article.php");
                header("Location: ../article.php", true, 301);
                exit;
                break;

            case "category":
                
                // Update DataBase  
                $name = test_input($_POST["catName"]);
                $color = test_input($_POST["catColor"]);
                $imageName = test_input($_FILES["catImage"]["name"]);

                // Upload Image
                if($_FILES["catImage"]['error'] === 0){
                    uploadImage("catImage", "../img/category/");
                }else { 
                    $imageName = $urlImage;
                }

                try {

                    $sql = "UPDATE `category` 
                        SET `category_name`= ?, `category_image`= ?,`category_color`=? 
                        WHERE `category_id` = ?";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$name, $imageName, $color, $urlId]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Category UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                // header("refresh:1; url=../allCategories.php");
                header("Location: ../allCategories.php", true, 301);
                exit;
                
                break;
            case "autheur":
                // Update DataBase  
                $fullName = test_input($_POST["authName"]);
                $description = test_input($_POST["authDesc"]);
                $email = test_input($_POST["authEmail"]);
                $twitter = test_input($_POST["authTwitter"]);
                $github = test_input($_POST["authGithub"]);
                $linkedin = test_input($_POST["authLinkedin"]);
                $imageName = test_input($_FILES["authImage"]["name"]);

                // Upload Image
                if($_FILES["authImage"]['error'] === 0){
                    uploadImage("authImage", "../img/avatar/");
                }else { 
                    $imageName = $urlImage;  
                } 

                try {
                    $sql = "UPDATE `autheur` 
                        SET `autheur_fullname`= ?, `autheur_desc`= ?,`autheur_email`=?, `autheur_twitter`=?, `autheur_github`= ?, `autheur_link`= ?, `autheur_avatar`= ?
                        WHERE `autheur_id` = ?";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$fullName, $description, $email, $twitter, $github, $linkedin, $imageName, $urlId]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Autheur UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                header("Location: ../autheur.php", true, 301);
                exit;
                break;

            default:
                break;
        }
    }

}else {
    echo 'Error: ' . $e->getMessage();
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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
