<?php include "assest/head.php"; ?>

<!-- Footer CSS -->
<link href="css/footer.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

<title>All Categories</title>
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

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Categories</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="px-4">

        <div class="row">
            <table class='table table-striped table-bordered'>

                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Image</th>
                        <th scope='col'>Color</th>
                        <th scope='col' colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $data = $conn->query("SELECT * FROM category")->fetchAll();
                    foreach ($data as $row) {
                        echo "<tr>";
                    ?>

                        <td><?= $row['category_id'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td>
                            <img src="img/category/<?= $row['category_image'] ?>" style="width: 100px; height: auto;">
                        </td>
                        <td class="">
                            <div style="width: 40px; height: 40px; border-radius: 100% ;background-color: <?= $row['category_color'] ?>"></div>
                        </td>

                        <td>
                            <a class="btn btn-success" href="update_category.php?id=<?= $row['category_id'] ?> ">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="assest/delete.php?type=category&id=<?= $row['category_id'] ?> ">
                                <i class="fa fa-trash " aria-hidden="true"></i>
                            </a>
                        </td>

                    <?php
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="row ">

            <div class="col-lg-12 text-center mb-3">
                <a class="btn btn-primary" href="add_category.php">Add Article</a>
            </div>

        </div>

    </main><!-- /.container -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>