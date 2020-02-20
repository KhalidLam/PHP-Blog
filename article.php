<!-- Include Head -->
<?php include "assest/head.php"; ?>

    <title>Add Article</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Articles</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="px-4">

        <div class="row">
            <table class='table table-striped table-bordered'>

                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Content</th>
                        <th scope='col'>Image</th>
                        <th scope='col'>Created Time</th>
                        <th scope='col'>Category</th>
                        <th scope='col'>Autheur</th>
                        <th scope='col' colspan="3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM article, autheur, category WHERE id_categorie = category_id AND autheur_id = id_autheur ORDER BY article_id DESC");
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    foreach ($data as $row) :
                        echo "<tr>";
                    ?>

                        <td><?= $row['article_id'] ?></td>
                        <td><?= $row['article_title'] ?></td>
                        <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                        <td><img src="img/article/<?= $row['article_image'] ?>" style="width: 100px; height: auto;"></td>
                        <td><?= $row['article_created_time'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td><?= $row['autheur_fullname'] ?></td>

                        <td>
                            <a class="btn btn-info" href="single_article.php?id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="update_article.php?id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="assest/delete.php?type=article&id=<?= $row['article_id'] ?> ">
                                <i class="fa fa-trash " aria-hidden="true"></i>
                            </a>
                        </td>

                    <?php
                        echo "</tr>";
                        endforeach;
                    ?>
                </tbody>

            </table>
        </div>

        <div class="row ">

            <div class="col-lg-12 text-center mb-3">
                <a class="btn btn-info" href="add_article.php">Add Article</a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>