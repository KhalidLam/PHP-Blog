<?php 

    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }

?>

<!-- Include Head -->
<?php include "assest/head.php"; ?>
  
    <!-- Custom CSS -->
    <link href="css/footer.css" rel="stylesheet">

    <title>Add Category</title>
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
            <h1 class="display-3 font-weight-normal text-muted">Submit a Category</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/insert_category.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="catName">Category Name</label>
                        <input type="text" class="form-control" name="catName" id="catName">
                    </div>

                    <div class="form-group">
                        <label for="catImage">Category Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="catImage" id="catImage">
                            <label class="custom-file-label" for="catImage">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catColor">Category Color</label>
                        <input type="color" id="catColor" name="catColor" value="#0f88e1">
                    </div>

                   
                    <div class="text-center">
                        <button type="submit" name="insert" class="btn btn-info btn-lg w-25">Submit</button>
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