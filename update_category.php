<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php 

    $category_id = $_GET["id"];

    // Get category Data to display
    $category = $conn->query("SELECT * FROM category WHERE category_id = $category_id ")->fetch(); 

    if(isset($_POST["update"])){

        // Update DataBase  
        $name = $_POST["catName"];
        $color = $_POST["catColor"];
        $imageName = $_FILES["catImage"]["name"];

        // Upload Image
        if($_FILES["catImage"]['error'] === 0){
            uploadImage("catImage", "img/category/");
        }else { 
            $imageName = $category["category_image"];  
        }

        try {

            $sql = "UPDATE `category` 
                SET `category_name`= ?, `category_image`= ?,`category_color`=? 
                WHERE `category_id` = $category_id";
            
            $stmt = $conn->prepare($sql);

            $stmt->execute([$name, $imageName, $color]);
            
            // echo a message to say the UPDATE succeeded
            echo "Category UPDATED successfully";

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        // Go to show.php 
        header("refresh:1; url=allCategories.php");
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

    <!-- Custom CSS -->
    <link href="css/footer.css" rel="stylesheet">

    <title>Update Category</title>
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
            <h1 class="display-3 font-weight-normal text-muted">Update a Category</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

        <!-- UPDATE `category` 
            SET `category_id`=[value-1],`category_name`=[value-2],`category_image`=[value-3],`category_color`=[value-4] 
            WHERE 1 -->

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="catName">Category Name</label>
                        <input type="text" class="form-control" name="catName" id="catName" value="<?= $category["category_name"] ?>">
                    </div>

                    <div class="form-group">
                        <label for="catImage">Category Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="catImage" id="catImage">
                            <label class="custom-file-label" for="catImage">Choose file</label>
                        </div>
                    </div>

                    <div class="my-2" style="width: 200px;">
                        <img class="w-100 h-auto" src="img/category/<?= $category["category_image"] ?>" alt="">
                    </div>

                    <div class="form-group">
                        <label for="catColor">Category Color</label>
                        <input type="color" id="catColor" name="catColor" value="<?= $category["category_color"] ?>">
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


</body>

</html>