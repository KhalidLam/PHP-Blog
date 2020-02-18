<?php include "assest/head.php"; ?>

    <link href="css/home.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    
    <title>Home</title>
</head>

<body>

    <header class="blog-header">

        <?php include "assest/header.php" ?>

        <!-- <div class="nav-scroller border py-1 px-4  mb-0">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">Accessibility</a>
                <a class="p-2 text-muted" href="#">Android Dev</a>
                <a class="p-2 text-muted" href="#">Gadgets</a>
                <a class="p-2 text-muted" href="#">Blockchain</a>
                <a class="p-2 text-muted" href="#">Cryptocurrency</a>
                <a class="p-2 text-muted" href="#">Cybersecurity</a>
                <a class="p-2 text-muted" href="#">Data Science</a>
                <a class="p-2 text-muted" href="#">iOS Dev</a>
                <a class="p-2 text-muted" href="#">Javascript</a>
                <a class="p-2 text-muted" href="#">Programming</a>
                <a class="p-2 text-muted" href="#">UX</a>
            </nav>
        </div> -->

        <div class="jumbotron text-center p-0 mb-0">
            <div class="p-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/slider/1.jpg" class="w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slider/1.jpg" class="w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/slider/1.jpg" class="w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </header><!-- Header -->
    


    <main role="main" class="">

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                    <?php
                        $data = $conn->query("SELECT * FROM article")->fetchAll();
                        foreach ($data as $row) :
                    ?>
                        <div class="col mb-4 stretch">
                            <div class="card shadow-sm w-100">
                                <img class="card-img-top" src="img/article/<?= $row['article_image'] ?>" alt="...">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title">
                                        <a href="single_article.php?id=<?= $row['article_id']?>" class="text-dark"> <?= $row['article_title'] ?> </a>
                                    </h5>
                                    
                                    <!-- <p class="card-text"> // truncate($row['article_content'], 80)</p> -->
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="single_article.php?id=<?= $row['article_id']?>" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="update_article.php?id=<?= $row['article_id']?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                        <small class="text-muted"><?= $row['article_created_time'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php 
                        endforeach;
                    ?>


                    <!-- <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural
                                with supporting text below as a natural
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/715"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4 stretch">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="https://picsum.photos/360/215"  alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pagedraw UI Builder Turns Your Website Design</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">March 27, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

    </main><!-- /.container -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>

</body>

</html>