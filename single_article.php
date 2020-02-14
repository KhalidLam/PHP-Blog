<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/flogo.png" sizes="32x32" type="image/png">
    <title>Single Article</title>

    <!-- Bootstrap, FontAwesome, Custom Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link href="css/footer.css" rel="stylesheet">

    <style>
        .post__img {
            height: 20rem;
            background-image: url('img/article/post_img_1.jpg');
            background-size: cover;
            background-position: center;
        }
        
        .post__date {
            display: block;
            margin-top: -.5rem;
            margin-bottom: 1rem;
            color: #767676;
        }

        .profile-thumbnail {
            width: 150px; 
            height: 150px;
        }

        .bg-l {
            background-color: #e9ecef;
        }
    </style>
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
                <a class="p-2 px-5 text-muted" href="autheur.php">Autheur</a>
            </nav>

            <a class="btn btn-outline-primary" href="#">Sign up</a>
        </div>
    </header>


    <main role="main" class="bg-l py-5">

        <div class="container bg-white">

            <div class="row">

                <div class="col-lg-9 p-0 border border-muted">
                    <!-- Article Post -->
                    <div class="post__img"></div>
                    <div class="post__content w-75 mx-auto">
                        <div class="post-head text-center">
                            <h1 class="post__title my-3">Applying CSS :focus-within</h1>
                            <span class="post__date">14 Dec 2019</span>
                        </div>
                        <div class="post-body">
                            <p>In my quest to learn something new every week. I came across a not so new pseudo-class
                                element :focus-within. Let's take a look at how it works and how to apply it to our
                                styles.</p>
                            <p>The :focus-within pseudo-class represents an element that is paired with the :focus
                                pseudo-class or has a descendant that is matched by :focus.</p>
                            <h2 class="my-4">How is this different from :focus? </h2>
                            <p>The :focus pseudo-element works differently, an element receives focus when the :focus
                                element is applied to it, but, in a case when you have a collection of child elements it
                                is not common to use :focus pseudo-class to select the parent element. The :focus
                                pseudo-class applies only to the focused element itself.</p>
                            <p>This is what :focus-within is able to solve. We can use :focus-withinpseudo-class if we
                                want to select an element that contains a focused element or elements that has
                                descendants matched by :focus. Let's see how to achieve that.</p>
                            <h2 class="my-4">Applying :focus-within </h2>
                            <p>:focus-within is useful for different use-cases. You can think of using it:</p>
                            <ul>
                                <li>To highlight an entire form when one of its input fields is in focus.</li>
                                <li>Highlight rows of a table and change the background color when a user clicks on it.
                                </li>
                            </ul>
                            <h2 class="my-4"> Browser Support </h2>
                            <p>As of 2020, This CSS feature is widely supported only IE browsers don't have support yet.
                                Here's a table of current browser that fully supports :focus-within.</p>
                        </div>

                        <div class="post-footer d-flex my-4 py-3 border border-muted">
                            <img class="profile-thumbnail" src="img/avatar/icons8-man-with-brown-hair-in-green-sweater.png" alt="test avatar image" >
                            <div class="d-flex flex-column justify-content-between">
                                <h2 class="font-italic">Quincy Larson</h2>
                                <p class="text-muted mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil voluptatibus in ullam eum corrupti reiciendis.</p>
                                <div class="social_media ">
                                    <a href="" class="mr-3"><i class="fa fa-twitter"></i><span
                                            class="px-1">loujaybee</span></a>
                                    <a href="" class="mr-3"><i class="fa fa-github"></i><span
                                            class="px-1">loujaybee</span></a>
                                    <a href="" class="mr-3"><i class="fa fa-linkedin-square"></i><span
                                            class="px-1">larson</span></a>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="col p-3 border border-muted">
                    <!-- Sidebar -->
                </div>


            </div>

        </div>


    </main>

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