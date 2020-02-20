<?php
    $catID = $_GET["catID"];
?>
<!-- Include Head -->
<?php include "assest/head.php"; ?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">

    <title>Articles</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">

        <?php include "assest/header.php" ?>

    </header>

    <!-- Main -->
    <main role="main">

        <div class="jumbotron mb-0">
            <div class="container">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM article WHERE id_categorie = ?");
                        $stmt->execute([$catID]);
                        $data = $stmt->fetchAll();
                        foreach ($data as $row) :
                    ?>
                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="img/article/<?= $row['article_image'] ?>" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="single_article.php?id=<?= $row['article_id'] ?>" class="text-dark"> <?= $row['article_title'] ?> </a>
                                </h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="single_article.php?id=<?= $row['article_id'] ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="update_article.php?id=<?= $row['article_id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-muted"><?= $row['article_created_time'] ?></small>
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>


    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>