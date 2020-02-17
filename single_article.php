<?php 
    $article_id = $_GET['id'];
?>

<?php include "assest/head.php"; ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/single_article.css">
    <title>Single Article</title>    
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
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>
    </header>

    <!-- Main -->
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

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>