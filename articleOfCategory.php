<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php
$catID = $_GET["catID"];

// $stmt = $conn->prepare("SELECT * FROM article WHERE id_categorie = ?");
// $stmt->execute([$catID]);
// $articles = $stmt->fetchAll();

// Get All Categories
$stmt = $conn->prepare("SELECT * FROM `category` ");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get Category Info
$stmt = $conn->prepare("SELECT * FROM `category` WHERE category_id = ?");
$stmt->execute([$catID]);
$category = $stmt->fetch();

// Get Latest articles
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id WHERE id_categorie = ?  ORDER BY `article_created_time` DESC ");
$stmt->execute([$catID]);
$articles = $stmt->fetchAll();

?>

<!-- Google Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

<!-- Custom CSS -->
<!-- <link href="css/home.css" rel="stylesheet"> -->
<link href="css/style.css" type="text/css" rel="stylesheet" />

<title>Articles</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main class="main">

        <!-- Latest Articles -->
        <div class="section jumbotron mb-0">
            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2><?= $category['category_name'] ?> Articles</h2>
                            <ul class="list-inline mt-1 mb-4">
                                <?php foreach ($categories as $category) : ?>
                                    <li class="list-inline-item">
                                        <a href="articleOfCategory.php?catID=<?= $category['category_id'] ?>" class="text-muted">
                                            <?= $category['category_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <?php foreach ($articles as $article) : ?>
                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img" href="single_article.php?id=<?= $article['article_id'] ?>">
                                    <img src="img/article/<?= $article['article_image'] ?>" alt="">
                                </a>
                                <di class="post-body">

                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="articleOfCategory.php?catID=<?= $article['category_id'] ?>" style="background-color:<?= $article['category_color'] ?>"><?= $article['category_name'] ?></a>
                                        <span class="post-date">
                                            <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?>
                                        </span>
                                    </div>

                                    <h3 class="post-title"><a href="single_article.php?id=<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></h3>

                                </di>
                            </div>
                        </div>
                        <!-- /post -->

                    <?php endforeach;  ?>

                    <div class="clearfix visible-md visible-lg"></div>
                </div>
                <!-- /row -->

            </div>
            <!-- /container -->
        </div>

        <!-- <div class="jumbotron mb-0">
            <div class="container">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <?php
                    foreach ($articles as $article) :
                        ?>
                        <div class="col mb-4 stretch">
                            <div class="card shadow-sm">
                                <img class="card-img-top" src="img/article/<?= $article['article_image'] ?>" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="single_article.php?id=<?= $article['article_id'] ?>" class="text-dark"> <?= $article['article_title'] ?> </a>
                                    </h5>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="single_article.php?id=<?= $article['article_id'] ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="update_article.php?id=<?= $article['article_id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                        <small class="text-muted"><?= $article['article_created_time'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>
        </div> -->


    </main><!-- </Main> -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>
    <!-- </Footer> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>