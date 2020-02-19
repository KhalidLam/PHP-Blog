<!-- Include Head -->
<?php include "assest/head.php"; ?>


<title>All Categories</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Categories</h1>
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
                    $stmt = $conn->prepare("SELECT * FROM category");
                    $stmt->execute();
                    $data = $stmt->fetchAll();
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
                <a class="btn btn-primary" href="add_category.php">Add Category</a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>


</body>

</html>