<?php require "db.php" ?>
<?php
$catID = $_GET["catID"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/flogo.png" sizes="32x32" type="image/png">
    <title>Home</title>

    <!-- Bootstrap, FontAwesome, Custom Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link href="css/home.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

</head>

<body>

    <header class="blog-header">

        <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 bg-white border-bottom shadow-sm">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <img src="img/logo/logo.png" alt="dev culture logo" style="width: 100%;height: auto;">
            </a>

            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 px-5 text-muted" href="categories.php">Category</a>
                <a class="p-2 px-5 text-muted" href="article.php">Article</a>
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>

    </header><!-- Header -->

    <main role="main">

        <div class="jumbotron mb-0">
                <div class="container">

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                        <?php
                        $data = $conn->query("SELECT * FROM article WHERE id_categorie = $catID ")->fetchAll();
                        foreach ($data as $row) :
                        ?>
                            <div class="col mb-4 stretch stretch">
                                <div class="card shadow-sm">
                                    <img class="card-img-top" src="img/article/<?= $row['article_image'] ?>" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="single_article.php?id=<?= $row['article_id'] ?>" class="text-dark"> <?= $row['article_title'] ?> </a>
                                        </h5>

                                        <!-- <p class="card-text"> // truncate($row['article_content'], 80)</p> -->

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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


    </main><!-- /.container -->


    <footer class="blog-footer">
        <p>Blog template built by <a href="https://twitter.com/mdo">@KhalidLam</a>.</p>
        <p><a href="#">Back to top</a></p>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</body>