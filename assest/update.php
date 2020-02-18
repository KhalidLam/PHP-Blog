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
                $title = $_POST["arTitle"];
                $content = $_POST["arContent"];
                $categorie = $_POST["arCategory"];
                $autheur = $_POST["arAutheur"];
                $imageName = $_FILES["arImage"]["name"];

                // Upload Image
                if($_FILES["arImage"]['error'] === 0){
                    uploadImage("arImage", "../img/article/");
                }else { 
                    $imageName = $urlImage;  
                }

                try {
                    $sql = "UPDATE `article` 
                        SET `article_title`= ?, `article_content`= ?,`article_image`=?, `id_categorie`=?, `id_autheur`= ? 
                        WHERE `article_id` = $urlId";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$title, $content, $imageName, $categorie, $autheur]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Article UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                header("refresh:1; url=../article.php");
                break;

            case "category":
                
                // Update DataBase  
                $name = $_POST["catName"];
                $color = $_POST["catColor"];
                $imageName = $_FILES["catImage"]["name"];

                // Upload Image
                if($_FILES["catImage"]['error'] === 0){
                    uploadImage("catImage", "../img/category/");
                }else { 
                    $imageName = $urlImage;
                }

                try {

                    $sql = "UPDATE `category` 
                        SET `category_name`= ?, `category_image`= ?,`category_color`=? 
                        WHERE `category_id` = $urlId";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$name, $imageName, $color]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Category UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                header("refresh:1; url=../allCategories.php");
                
                break;
            case "autheur":
                // Update DataBase  
                $fullName = $_POST["authName"];
                $description = $_POST["authDesc"];
                $email = $_POST["authEmail"];
                $twitter = $_POST["authTwitter"];
                $github = $_POST["authGithub"];
                $linkedin = $_POST["authLinkedin"];
                $imageName = $_FILES["authImage"]["name"];

                // Upload Image
                if($_FILES["authImage"]['error'] === 0){
                    uploadImage("authImage", "../img/avatar/");
                }else { 
                    $imageName = $urlImage;  
                } 

                try {
                    $sql = "UPDATE `autheur` 
                        SET `autheur_fullname`= ?, `autheur_desc`= ?,`autheur_email`=?, `autheur_twitter`=?, `autheur_github`= ?, `autheur_link`= ?, `autheur_avatar`= ?
                        WHERE `autheur_id` = $urlId";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$fullName, $description, $email, $twitter, $github, $linkedin, $imageName]);
                    
                    // echo a message to say the UPDATE succeeded
                    echo "Autheur UPDATED successfully";

                }catch(PDOException $e){
                    echo $e->getMessage();
                }

                // Go to show.php 
                header("refresh:1; url=../autheur.php");
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
