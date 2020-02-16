<?php include "assest/head.php"; ?>
    
    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link href="css/add_article.css" rel="stylesheet">

    <title>Add Article</title>
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

        <div class="jumbotron text-center ">
            <h1 class="display-3 font-weight-normal text-muted">Submit an Article</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/insert_article.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="arTitle">Title</label>
                        <input type="text" class="form-control" name="arTitle" id="arTitle">
                    </div>

                    <div class="form-group">
                        <label for="arContent">Content</label>

                        <textarea class="form-control" name="arContent" id="arContent" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="UploadImage">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="arImage" id="arImage">
                            <label class="custom-file-label" for="UploadImage">Choose file</label>
                        </div>
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

    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace( 'arContent' );
    </script>

</body>

</html>