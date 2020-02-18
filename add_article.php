<?php include "assest/head.php"; ?>
    
    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link href="css/add_article.css" rel="stylesheet">

    <title>Add Article</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center ">
            <h1 class="display-3 font-weight-normal text-muted">Submit an Article</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/insert.php?type=article" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="arTitle">Title</label>
                        <input type="text" class="form-control" name="arTitle" id="arTitle">
                    </div>

                    <div class="form-group">
                        <label for="arContent">Content</label>

                        <textarea class="form-control" name="arContent" id="arContent" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="arImage">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="arImage" id="arImage">
                            <label class="custom-file-label" for="arImage">Choose file</label>
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