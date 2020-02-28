<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php
    $stmt = $conn->prepare("SELECT * FROM `article` ORDER BY `article`.`article_created_time` DESC");
    $stmt->execute();
    $articles = $stmt->fetchAll();
?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="css/home.css" rel="stylesheet"> 
    
    <title>Home</title>
</head>

<body>

    <header class="blog-header">

        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center p-0 mb-0">
            <div class="p-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height: 480px;width: 100%;">
                        <div class="carousel-item active">
                            <img src="img/slider/1.jpg" class="w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slider/2.jpg" class="w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slider/3.jpg" class="w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </header><!-- Header -->
    


    <main role="main" class="">

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                    <?php
                        foreach ($articles as $article) :
                    ?>
                        <div class="col mb-4 stretch">
                            <div class="card shadow-sm w-100">
                                <img class="card-img-top" src="img/article/<?= $article['article_image'] ?>" alt="...">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title">
                                        <a href="single_article.php?id=<?= $article['article_id']?>" class="text-dark"> <?= $article['article_title'] ?> </a>
                                    </h5>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="single_article.php?id=<?= $article['article_id']?>" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="update_article.php?id=<?= $article['article_id']?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                        <small class="text-muted"><?= $article['article_created_time'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php 
                        endforeach;
                    ?>

                </div>
            </div>
        </div>

    </main><!-- /.container -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>