<?php require "db.php"; ?>
<?php 
    $article_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/flogo.png" sizes="32x32" type="image/png">
    <title>Single Article</title>

    <!-- Bootstrap, FontAwesome, Custom Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/single_article.css">

</head>

<body>

    <header class="blog-header">
        <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 bg-white border-bottom shadow-sm">
            <a href="index.php" class="my-0 mr-md-auto" style="width: 6rem;">
                <img src="img/logo/logo.png" alt="dev culture logo" style="width: 100%;height: auto;">
            </a>

            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 px-5 text-muted" href="index.php">Home</a>
                <a class="p-2 px-5 text-muted" href="categories.php">Category</a>
                <a class="p-2 px-5 text-muted" href="article.php">Article</a>
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>
    </header>


    <main role="main" class="bg-l py-5">

        <div class="container bg-white">

            <div class="row">
                
                <!-- Article Post -->
                <div class="col-lg-9 p-0 border border-muted">

                    <?php
                        $data = $conn->query("SELECT * FROM `article` INNER JOIN `autheur` ON `article`.id_autheur = `autheur`.autheur_id  WHERE `article_id` = $article_id ")->fetchAll();                 
                        foreach ($data as $row) :
                    ?>

                        <!-- Post Image -->
                        <div class="post__img" style="background-image: url('img/article/<?= $row["article_image"] ?>');"></div>

                        <!-- Post Content -->
                        <div class="post__content w-75 mx-auto">

                            <div class="post-head text-center">
                                <h1 class="post__title my-3">
                                    <?= $row["article_title"] ?>
                                </h1>
                                <span class="post__date">
                                    <?= $row["article_created_time"] ?>
                                </span>
                            </div>

                            <div class="post-body">

                                <?= $row["article_content"] ?>

                            </div>

                            <!-- Autheur Info -->
                            <div class="post-footer d-flex my-4 py-3 border border-muted">
                            
                                <img class="profile-thumbnail" src="img/avatar/<?= $row['autheur_avatar']?>" alt="test avatar image" >
                                <div class="d-flex flex-column justify-content-between">
                                    <h2 class="font-italic"><?= $row['autheur_fullname']?></h2>
                                    <p class="text-muted mb-1"><?= $row['autheur_desc']?></p>
                                    <div class="social_media ">
                                        <a href="" class="mr-3"><i class="fa fa-twitter"></i><span
                                                class="px-1"><?= $row['autheur_twitter']?></span></a>
                                        <a href="" class="mr-3"><i class="fa fa-github"></i><span
                                                class="px-1"><?= $row['autheur_github']?></span></a>
                                        <a href="" class="mr-3"><i class="fa fa-linkedin-square"></i><span
                                                class="px-1"><?= $row['autheur_link']?></span></a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                       

                    </div>

                </div>

                <div class="col p-3 border border-muted">
                    <!-- Sidebar -->
                </div>


            </div>

        </div>


    </main>

    <footer class="blog-footer">
        <p>Blog template built by <a href="https://twitter.com/Moon96Schwarz">@KhalidLam</a>.</p>
        <p><a href="#">Back to top</a></p>
    </footer>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>