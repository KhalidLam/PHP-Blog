<!-- Include Head -->
<?php include "assest/head.php"; ?>
  
    <title>Add Author</title>
</head>

<body>

    <!-- Header -->
    <header class="blog-header">
        <?php include "assest/header.php" ?>

        <div class="jumbotron text-center ">
            <h1 class="display-3 font-weight-normal text-muted">Add Author</h1>
        </div>

    </header>

    <!-- Main -->
    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="assest/insert.php?type=author" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="authName">Full Name</label>
                        <input type="text" class="form-control" name="authName" id="authName">
                    </div>

                    <div class="form-group">
                        <label for="authDesc">Description</label>
                        <input type="text" class="form-control" name="authDesc" id="authDesc">
                    </div>

                    <div class="form-group">
                        <label for="authEmail">Email</label>
                        <input type="email" class="form-control" name="authEmail" id="authEmail">
                    </div>

                    <div class="form-group">
                        <label for="authImage">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="authImage" id="authImage">
                            <label class="custom-file-label" for="authImage">Choose file</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authTwitter" id="authTwitter" placeholder="Ex: Moon96Schwarz">
                    </div>
                    <div class="form-group">
                        <label for="authGithub">Github Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authGithub" id="authGithub" placeholder="Ex: Moon96Schwarz">
                    </div>
                    <div class="form-group">
                        <label for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                        <input type="text" class="form-control" name="authLinkedin" id="authLinkedin" placeholder="Ex: Moon96Schwarz">
                    </div>


                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-info btn-lg w-25">Submit</button>
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