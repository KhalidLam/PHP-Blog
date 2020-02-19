<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php 

    $article_id = $_GET["id"];

    // Get article Data to display
    $article = $conn->query("SELECT * FROM article WHERE article_id = $article_id ")->fetch();

?>
    
    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <title>Update Article</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">Update Article</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/update.php?type=article&id=<?= $article_id ?>&img=<?= $article["article_image"] ?>" method="POST" enctype="multipart/form-data">
                
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
                            <label class="custom-file-label" for="UploadImage"> <?= $article['article_image'] ?></label>
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

                                <?php if($article['id_categorie'] == $row['category_id']) : ?>
                                
                                    <option value="<?= $row['category_id'] ?>" selected><?= $row['category_name'] ?></option>
                                    
                                <?php else : ?>
                                 
                                    <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>

                                <?php endif; ?>

                            <?php  endforeach; ?>

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

                                <?php if($article['id_autheur'] == $row['autheur_id']) : ?>
                                
                                    <option value="<?= $row['autheur_id'] ?>" selected><?= $row['autheur_fullname'] ?></option>

                                <?php else : ?>
                                
                                    <option value="<?= $row['autheur_id'] ?>"><?= $row['autheur_fullname'] ?></option>

                                <?php endif; ?>

                            
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

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace( 'arContent' );
    </script>

</body>

</html>