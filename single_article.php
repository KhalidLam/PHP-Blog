<?php include "assest/head.php"; ?>

<?php
    $article_id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `autheur` ON `article`.id_autheur = `autheur`.autheur_id  WHERE `article_id` = ?");
    $stmt->execute([$article_id]);
    $data = $stmt->fetchAll();
    
    $stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `comment` WHERE `article`.`article_id`= `comment`.`id_article` AND `article`.`article_id` = ?");
    $stmt->execute([$article_id]);
    $commentQuery = $stmt->fetchAll();
?>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/single_article.css">

    <title>Single Article</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <?php include "assest/header.php" ?>
    </header>

    <!-- Main -->
    <main role="main" class="bg-l py-5">

        <div class="container bg-white">

            <div class="row">

                <!-- Article Post -->
                <div class="content col-lg-9 p-0 border border-muted">

                    <?php foreach ($data as $row) : ?>

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

                            <div class="post-body text-break">

                                <?= $row["article_content"] ?>

                            </div>

                            <!-- Autheur Info -->
                            <div class="post-footer d-flex my-4 py-3 border border-muted">

                                <img class="profile-thumbnail rounded-circle" src="img/avatar/<?= $row['autheur_avatar'] ?>" alt="test avatar image" style="width: 150px;height: 150px;">
                                <div class="d-flex flex-column justify-content-between">
                                    <h2 class="font-italic"><?= $row['autheur_fullname'] ?></h2>
                                    <p class="text-muted mb-1"><?= $row['autheur_desc'] ?></p>
                                    <div class="social_media ">
                                        <a href="" class="mr-3"><i class="fa fa-twitter"></i><span class="px-1"><?= $row['autheur_twitter'] ?></span></a>
                                        <a href="" class="mr-3"><i class="fa fa-github"></i><span class="px-1"><?= $row['autheur_github'] ?></span></a>
                                        <a href="" class="mr-3"><i class="fa fa-linkedin-square"></i><span class="px-1"><?= $row['autheur_link'] ?></span></a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        </div>

                </div>

                <!-- Sidebar -->
                <div class="col py-3 border border-primary">
                </div>

            </div>

            <div class="row">
                <div class="container">

                    <div class="post-comments">

                        <form action="assest/insert.php?type=comment&id=<?= $article_id ?>" method="POST">
                            <div class="form-group mt-3">
                                <!-- <label for="comment">Your Comment</label> -->
                                <input type="hidden" name="username" value="<?= rand() ?>">
                                <input type="hidden" name="id_article" value="<?= $article_id ?>">
                                <textarea name="comment" class="form-control" rows="3" placeholder="Add your comment..."></textarea>
                                <button name="submit" type="submit" class="btn btn-primary float-right">Add Comment</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                    
                    <div class="comments">
                        <h2 class="text-center text-muted py-3">Comments</h2>
                        
                        <?php
                        foreach ($commentQuery as $comment) :
                        ?>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="img/avatar/<?= $comment['comment_avatar'] ?>" class="img img-rounded img-fluid w-50" />
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left" href="#"><strong><?= "User-".$comment['comment_username'] ?></strong></a>
                                            <span class="float-right px-2 text-muted"><?= $comment['comment_date'] ?></span>
                                        </p>
                                        <div class="clearfix"></div>
                                        <p class="text-secondary mt-2"><?= $comment['comment_content'] ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                
                </div>
            </div>


    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>