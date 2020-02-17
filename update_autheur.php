<?php include "assest/head.php"; ?>
<?php

    $autheur_id = $_GET["id"];

    // Get article Data to display
    $autheur = $conn->query("SELECT * FROM autheur WHERE autheur_id = $autheur_id ")->fetch();

    // print_r($autheur);

    if (isset($_POST["submit"])){

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
            uploadImage("authImage", "img/avatar/");
        }else { 
            $imageName = $autheur["autheur_avatar"];  
        }
        
        // UPDATE `autheur` 
        // SET `autheur_fullname`=[value-2],`autheur_desc`=[value-3],`autheur_email`=[value-4],`autheur_twitter`=[value-5],`autheur_github`=[value-6],`autheur_link`=[value-7],`autheur_avatar`=[value-8]
        // WHERE 1  

        try {

            $sql = "UPDATE `autheur` 
                SET `autheur_fullname`= ?, `autheur_desc`= ?,`autheur_email`=?, `autheur_twitter`=?, `autheur_github`= ?, `autheur_link`= ?, `autheur_avatar`= ?
                WHERE `autheur_id` = $autheur_id";
            
            $stmt = $conn->prepare($sql);

            $stmt->execute([$fullName, $description, $email, $twitter, $github, $linkedin, $imageName]);
            
            // echo a message to say the UPDATE succeeded
            echo "Autheur UPDATED successfully";

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // Go to show.php 
        header("refresh:1; url=autheur.php");
    }

    function uploadImage($name, $dest){
        // Upload Image
        $fileName = $_FILES[$name]['name'];
        $fileTmpName = $_FILES[$name]['tmp_name'];
        $fileError = $_FILES[$name]['error'];

        if ($fileError === 0) {
            $fileDestination = $dest . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            echo "Image Upload Successful";
        } else {
            echo "Image Upload Error";
        }
    }
?>

<link href="css/footer.css" rel="stylesheet">

<title>Update Autheur</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 bg-white border-bottom shadow-sm">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <img src="img/logo/logo.png" alt="dev culture logo" style="width: 100%;height: auto;">
            </a>

            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 px-5 text-muted" href="index.php">Home</a>
                <a class="p-2 px-5 text-muted" href="categories.php">Category</a>
                <a class="p-2 px-5 text-muted" href="article.php">Article</a>
                <!-- <a class="p-2 px-5 text-muted" href="single_article.php">Single Article</a> -->
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">Update Autheur</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="authName">Full Name</label>
                        <input type="text" class="form-control" name="authName" id="authName" value="<?= $autheur['autheur_fullname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="authDesc">Description</label>
                        <input type="text" class="form-control" name="authDesc" id="authDesc" value="<?= $autheur['autheur_desc'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="authEmail">Email</label>
                        <input type="text" class="form-control" name="authEmail" id="authEmail" value="<?= $autheur['autheur_email'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="authImage">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="authImage" id="authImage">
                            <label class="custom-file-label" for="authImage"> <?= $autheur['autheur_avatar'] ?> </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authTwitter" id="authTwitter" value="<?= $autheur['autheur_twitter'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="authGithub">Github Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authGithub" id="authGithub" value="<?= $autheur['autheur_github'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authLinkedin" id="authLinkedin" value="<?= $autheur['autheur_link'] ?>">
                    </div>


                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-info btn-lg w-25">Submit</button>
                    </div>


                </form>
            </div>

            <div class="col-lg-4 mb-4">
                <!-- <h1> Random Articles </h1>  -->
            </div>


        </div>

    </main><!-- /.container -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>