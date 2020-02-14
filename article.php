<?php require "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/flogo.png" sizes="32x32" type="image/png">
    <title>Add Article</title>

    <!-- Bootstrap, FontAwesome, Custom Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link href="css/add_article.css" rel="stylesheet">

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
                <a class="p-2 px-5 text-muted" href="single_article.php">Single Article</a>
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>

        <div class="jumbotron text-center ">
            <h1 class="display-3 font-weight-normal text-muted">Submit an Article</h1>
            <!-- <p class="h4 text-black">Home > Add Article</p> -->
        </div>

    </header>

    <main role="main" class="container">

        <div class="row">

            <div class="col-lg-8 mb-4">
                <!-- Form -->
                <form action="insertArticle.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="arTitle">Title</label>
                        <input type="text" class="form-control" name="arTitle" id="arTitle">
                    </div>

                    <div class="form-group">
                        <label for="arContent">Content</label>
                        <textarea class="form-control" name="arContent" id="arContent" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="UploadImage">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="arImage" id="arImage">
                            <label class="custom-file-label" for="UploadImage">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="arCategory">Category</label>
                        <select class="custom-select" name="arCategory" id="arCategory">
                            <option disabled>-- Select Category --</option>
                            <option value="1">Programming</option>
                            <option value="2">Data Science</option>
                            <option value="3">Blockchain</option>
                            <option value="4">Android Dev</option>
                            <option value="5">Cybersecurity</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="arAutheur">Autheur</label>
                        <select class="custom-select" name="arAutheur" id="arAutheur">
                            <option disabled>-- Select Autheur --</option>
                            <option value="1">Autheur 1</option>
                            <option value="2">Autheur 2</option>
                            <option value="3">Autheur 3</option>
                            <option value="4">Autheur 4</option>
                        </select>
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

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built by <a href="https://twitter.com/mdo">@KhalidLam</a>.</p>
        <p><a href="#">Back to top</a></p>
    </footer>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>