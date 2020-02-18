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

        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center ">
            <h1 class="display-3 font-weight-normal text-muted">Submit a Category</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/insert.php?type=category" method="POST" enctype="multipart/form-data">
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