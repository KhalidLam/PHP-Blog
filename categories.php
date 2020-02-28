<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php 
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $categories = $stmt->fetchAll();
?>
    <title>Category</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <?php include "assest/header.php" ?>
    </header>

    <!-- Main -->
    <main role="main" class="">

        <div class="jumbotron text-center mb-0 pb-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                    <?php
                        foreach ($categories as $category) :   
                    ?>

                        <div class="col mb-4 d-flex align-items-stretch">
                            <a href="articleOfCategory.php?catID=<?= $category['category_id'] ?>" 
                                class="card text-white py-3 btn w-100" 
                                style="background-color: <?= $category['category_color'] ?>" >
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h2 class="card-title">
                                        <?= $category['category_name'] ?>
                                    </h2>
                                </div>
                            </a>
                        </div>

                    <?php endforeach ?>

                </div>

                <div class="row">
                    <div class="col-lg-12 text-center mt-5">
                        <a class="btn btn-info" href="add_category.php">Add Category</a>
                        <a class="btn btn-success" href="allCategories.php">Modify Category</a>
                    </div>
                </div>

            </div>
            
        </div>


    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>