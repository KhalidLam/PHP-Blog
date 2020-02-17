<?php include "assest/head.php"; ?>

<link href="css/category.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<title>All Autheur</title>
<style>
    .fa-twitter, 
    .fa-github, 
    .fa-linkedin-square {
        font-size: 2.3rem;
    }
</style>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
            <a href="index.html" class="my-0 mr-md-auto" style="width: 6rem;">
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

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Autheur</h1>
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
                        <th scope='col'>Full Name</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Avatar</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Twitter</th>
                        <th scope='col'>Github</th>
                        <th scope='col'>Linkedin</th>
                        <th scope='col' colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $data = $conn->query("SELECT * FROM autheur")->fetchAll();
                    foreach ($data as $row) {
                        echo "<tr>";
                    ?>

                        <td><?= $row['autheur_id'] ?></td>
                        <td><?= $row['autheur_fullname'] ?></td>
                        <td><?= $row['autheur_desc'] ?></td>
                        <td>
                            <img src="img/avatar/<?= $row['autheur_avatar'] ?>" style="width: 100px; height: auto;">
                        </td>
                        <td><?= $row['autheur_email'] ?></td>
                        <td class="text-center">
                            <a href="https://twitter.com/<?= $row['autheur_twitter'] ?>" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="https://github.com/<?= $row['autheur_github'] ?>" target="_blank">
                                <i class="fa fa-github"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="https://www.linkedin.com/in/<?= $row['autheur_link'] ?>" target="_blank">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </td>

                        <td>
                            <a class="btn btn-success" href="update_autheur.php?id=<?= $row['autheur_id'] ?>">
                                <i class="fa fa-pencil " aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="assest/delete_autheur.php?id=<?= $row['autheur_id'] ?>">
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
                <a class="btn btn-primary" href="add_autheur.php">Add Article</a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>