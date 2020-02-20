<!-- Include Head -->
<?php include "assest/head.php"; ?>

    <title>All Autheur</title>
    <style>
        .fa-twitter, .fa-github,.fa-linkedin-square {
            font-size: 2.3rem;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Autheur</h1>
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
                    $stmt = $conn->prepare("SELECT * FROM autheur");
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    foreach ($data as $row) :
                        echo "<tr>";
                    ?>

                        <td><?= $row['autheur_id'] ?></td>
                        <td><?= $row['autheur_fullname'] ?></td>
                        <td><?= $row['autheur_desc'] ?></td>
                        <td>
                            <img src="img/avatar/<?= $row['autheur_avatar'] ?>" style="width: 100px; height: auto;border-radius: 100%;">
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
                            <a class="btn btn-danger" href="assest/delete.php?type=autheur&id=<?= $row['autheur_id'] ?>">
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
                <a class="btn btn-info" href="add_autheur.php">Add Autheur</a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>