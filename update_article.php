<?php include "assest/head.php"; ?>
<?php 

    $article_id = $_GET["id"];

    // Get article Data to display
    $article = $conn->query("SELECT * FROM article WHERE article_id = $article_id ")->fetch();

    if(isset($_POST["update"])){

        // Update DataBase  
        $title = $_POST["arTitle"];
        $content = $_POST["arContent"];
        $categorie = $_POST["arCategory"];
        $autheur = $_POST["arAutheur"];
        $imageName = $_FILES["arImage"]["name"];

        // Upload Image
        if($_FILES["arImage"]['error'] === 0){
            uploadImage("arImage", "img/article/");
        }else { 
            $imageName = $article["article_image"];  
        }

        try {

            $sql = "UPDATE `article` 
                SET `article_title`= ?, `article_content`= ?,`article_image`=?, `id_categorie`=?, `id_autheur`= ? 
                WHERE `article_id` = $article_id";
            
            $stmt = $conn->prepare($sql);

            $stmt->execute([$title, $content, $imageName, $categorie, $autheur]);
            
            // echo a message to say the UPDATE succeeded
            echo "Article UPDATED successfully";

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // Go to show.php 
        header("refresh:1; url=article.php");
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
    
    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link href="css/footer.css" rel="stylesheet">

    <title>Update Article</title>
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
            <h1 class="display-3 font-weight-normal text-muted">Update Article</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

        <!-- 
            UPDATE `article` SET `article_content` = 'This is a longer card with supporting text below as a ' 
            WHERE `article`.`article_id` = 2;  -->
            
            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="arTitle">Title</label>
                        <input type="text" class="form-control" name="arTitle" id="arTitle" value="<?= $article["article_title"] ?>">
                    </div>

                    <div class="form-group">
                        <label for="arContent">Content</label>
                        <textarea class="form-control" name="arContent" id="arContent" rows="3">
                            <?= $article["article_content"] ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="UploadImage">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="arImage" id="arImage">
                            <label class="custom-file-label" for="UploadImage">Choose file</label>
                        </div>
                        
                    </div>

                    <div class="my-2" style="width: 200px;">
                        <img class="w-100 h-auto" src="img/article/<?= $article["article_image"] ?>" alt="">
                    </div>
             

                    <div class="form-group">
                        <label for="arCategory">Category</label>
                        <select class="custom-select" name="arCategory" id="arCategory">
                            <option disabled>-- Select Category --</option>

                            <?php
                                $data = $conn->query("SELECT category_id, category_name FROM category")->fetchAll();
                                foreach ($data as $row) :
                            ?>
                                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                            <?php  
                                endforeach;
                            ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="arAutheur">Autheur</label>
                        <select class="custom-select" name="arAutheur" id="arAutheur">
                            <option disabled>-- Select Autheur --</option>

                            <?php
                                $data = $conn->query("SELECT autheur_id, autheur_fullname FROM autheur")->fetchAll();
                                foreach ($data as $row) :
                            ?>

                                <option value="<?= $row['autheur_id'] ?>"><?= $row['autheur_fullname'] ?></option>
                            
                            <?php  
                                endforeach;
                            ?>


                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="update" class="btn btn-info btn-lg w-25">Update</button>
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

    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace( 'arContent' );
    </script>

</body>

</html>