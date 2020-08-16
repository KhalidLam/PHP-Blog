<?php require "db.php"; ?>
<?php

// Get type from header
$type = $_GET['type'];
$urlId = $_GET["id"];
$urlImage = $_GET['img'];

if ($conn) {

    if (isset($_POST["update"])) {

        switch ($type) {
            case "article":

                // Update DataBase
                $title = test_input($_POST["arTitle"]);
                $content = $_POST["arContent"];
                $categorie = test_input($_POST["arCategory"]);
                $author = test_input($_POST["arAuthor"]);
                $imageName = test_input($_FILES["arImage"]["name"]);

                // Upload Image
                if ($_FILES["arImage"]['error'] === 0) {
                    uploadImage2("arImage", "../img/article/");
                } else {
                    $imageName = $urlImage;
                }

                try {
                    $sql = "UPDATE `article`
                        SET `article_title`= ?, `article_content`= ?,`article_image`=?, `id_categorie`=?, `id_author`= ?
                        WHERE `article_id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$title, $content, $imageName, $categorie, $author, $urlId]);

                    // echo a message to say the UPDATE succeeded
                    echo "Article UPDATED successfully";
                } catch (PDOException $e) {
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
                if ($_FILES["catImage"]['error'] === 0) {
                    uploadImage2("catImage", "../img/category/");
                } else {
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
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to show.php
                // header("refresh:1; url=../allCategories.php");
                header("Location: ../categories.php", true, 301);
                exit;

                break;
            case "author":
                // Update DataBase
                $fullName = test_input($_POST["authName"]);
                $description = test_input($_POST["authDesc"]);
                $email = test_input($_POST["authEmail"]);
                $twitter = test_input($_POST["authTwitter"]);
                $github = test_input($_POST["authGithub"]);
                $linkedin = test_input($_POST["authLinkedin"]);
                $imageName = test_input($_FILES["authImage"]["name"]);

                // Upload Image
                if ($_FILES["authImage"]['error'] === 0) {
                    uploadImage2("authImage", "../img/avatar/");
                } else {
                    $imageName = $urlImage;
                }

                try {
                    $sql = "UPDATE `author`
                        SET `author_fullname`= ?, `author_desc`= ?,`author_email`=?, `author_twitter`=?, `author_github`= ?, `author_link`= ?, `author_avatar`= ?
                        WHERE `author_id` = ?";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute([$fullName, $description, $email, $twitter, $github, $linkedin, $imageName, $urlId]);

                    // echo a message to say the UPDATE succeeded
                    echo "author UPDATED successfully";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                // Go to show.php
                header("Location: ../author.php", true, 301);
                exit;
                break;

            default:
                break;
        }
    }
} else {
    echo 'Error: ' . $e->getMessage();
}

// function uploadImage($name, $dest){
//     // Upload Image
//     $fileName = $_FILES[$name]['name'];
//     $fileTmpName = $_FILES[$name]['tmp_name'];
//     $fileError = $_FILES[$name]['error'];

//     if($fileError === 0){
//         $fileDestination = $dest.$fileName;
//         move_uploaded_file($fileTmpName, $fileDestination);
//         echo "Image Upload Successful";
//     }else {
//         echo "Image Upload Error";
//     }
// }

function uploadImage2($name, $dest)
{

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$name]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$name]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
