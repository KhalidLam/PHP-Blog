<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

    $autheur_id = $_GET["id"];

    // Get article Data to display
    $autheur = $conn->query("SELECT * FROM autheur WHERE autheur_id = $autheur_id ")->fetch();

?>

    <title>Update Autheur</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">

        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">Update Autheur</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/update.php?type=autheur&id=<?= $autheur_id ?>&img=<?= $autheur["autheur_avatar"] ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="authName">Full Name</label>
                        <input type="text" class="form-control" name="authName" id="authName" value="<?= $autheur['autheur_fullname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="authDesc">Description</label>
                        <input type="text" class="form-control" name="authDesc" id="authDesc" value="<?= $autheur['autheur_desc'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="authEmail">Email</label>
                        <input type="text" class="form-control" name="authEmail" id="authEmail" value="<?= $autheur['autheur_email'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="authImage">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="authImage" id="authImage">
                            <label class="custom-file-label" for="authImage"> <?= $autheur['autheur_avatar'] ?> </label>
                        </div>
                    </div>

                    <div class="my-2" style="width: 200px;">
                        <img class="w-100 h-auto" src="img/avatar/<?= $autheur['autheur_avatar'] ?>" alt="">
                    </div>

                    <div class="form-group">
                        <label for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authTwitter" id="authTwitter" value="<?= $autheur['autheur_twitter'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="authGithub">Github Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authGithub" id="authGithub" value="<?= $autheur['autheur_github'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authLinkedin" id="authLinkedin" value="<?= $autheur['autheur_link'] ?>">
                    </div>


                    <div class="text-center">
                        <button type="submit" name="update" class="btn btn-info btn-lg w-25">Submit</button>
                    </div>


                </form>
            </div>

            <div class="col-lg-4 mb-4">
                <!-- <h1> Random Articles </h1>  -->
            </div>


        </div>

    </main>

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>