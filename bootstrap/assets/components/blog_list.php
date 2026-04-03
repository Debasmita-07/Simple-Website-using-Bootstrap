<?php
include "config.php";

$sql = "SELECT id, blog_title, blog_image, created_at 
        FROM blog_list 
        ORDER BY created_at DESC 
        LIMIT 3";

$result = mysqli_query($conn, $sql);



$blog_id = $_GET['id'] ?? null;

if (!$blog_id) {
    die("Blog ID not provided.");
}

// fetch blog data
$blog_sql = "SELECT * FROM blog_list WHERE id = '$blog_id'";
$blog_result = mysqli_query($conn, $blog_sql);
$blog = mysqli_fetch_assoc($blog_result);

// fetch blog images
$image_sql = "SELECT * FROM blog_list_images WHERE blog_id = '$blog_id'";
$image_result = mysqli_query($conn, $image_sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
    <!-- favicon -->
     <link rel="shortcut icon" href="../images/main_logo.png" type="image/x-icon">
     
    <link rel="stylesheet" href="../style/style.css?v=<?php echo time() ?>">
    <!-- slider stylesheet -->
    <link rel="stylesheet" href="../style/swiper-bundle.min.css">
    <link rel="stylesheet" href="../style/style 2.css">

    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/124b221006.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="container-wrapper">

        <div class="my-container">
            <div class="navigation">
                <div class="logo">
                    <img src="../images/main_logo.png" alt="">
                </div>
                <div class="nav-content">
                    <!-- navbar left -->
                    <nav class="navbar navbar-expand-lg  gap-3">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav gap-3">
                                    <li class="nav-item">
                                        <a class="nav-link fs-5" href="../../index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5" href="../components/about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5" href="../components/service.php">Services</a>
                                    </li>
                            
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle fs-5" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Blog
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../components/blog.php">Blog List</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-5" href="../components/contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- /navbar left -->
                </div>
                <div class="contact-details d-flex align-items-center">
                    <div
                        class="search border border-dark rounded-circle d-flex justify-content-center align-items-center me-4">
                        <i class="fa-solid fa-magnifying-glass mx-3"></i>
                    </div>
                    <button type="button" class="btn btn-warning btn-lg">Contact <i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- banner -->
    <section class="container-wrapper banner">
        <div class="my-container d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-white">Blog Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- blog list content -->
    <section class="container-wrapper blog-list-content">
        <div class="my-container">
            <div class="row">
                <div class="col-8 ">
                    <div class="blog-first-list border border-secondary-subtle mb-5 ">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <?php
                                $active = true;

                                if (mysqli_num_rows($image_result) > 0) {
                                    while ($img = mysqli_fetch_assoc($image_result)) {

                                        if (empty($img['images'])) {
                                            continue; // skip broken rows
                                        }
                                        ?>
                                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                            <img src="../../admin/<?php echo htmlspecialchars($img['images']); ?>"
                                                class="d-block w-100" alt="Blog Image">
                                        </div>
                                        <?php
                                        $active = false;
                                    }
                                }
                                ?>


                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="first-list-content py-4 px-5">
                            <div class="d-flex gap-3 top-list">
                                <p class="mb-0 text-secondary">By: <a href="">Admin</a></p>
                                <div class="d-flex align-items-center gap-1">
                                    <i class="fa-regular fa-calendar text-warning"></i>
                                    <p class="mb-0"><?php
                                    if (!empty($blog['created_at'])) {
                                        echo date("F j, Y", strtotime($blog['created_at']));
                                    }
                                    ?></p>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <i class="fa-regular fa-comment text-warning"></i>
                                    <p class="mb-0">Comments(2)</p>
                                </div>
                            </div>
                            <h4 class=" my-2 mb-3"><?php echo $blog['blog_title']; ?>
                            </h4>
                            <p class="h5 my-2 text-secondary mb-3"><?php echo strip_tags($blog['blog_description']); ?></p>
                            <div class="video d-flex gap-4 text-center py-2 justify-content-start">
                                <!-- <button type="button" class="btn btn-warning btn-lg text-white">Read More <i
                                        class="fa-solid fa-arrow-right"></i></button> -->
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <h6 class="mb-0">Social Media:</h6>
                                    <div class="d-flex gap-2">
                                        <div
                                            class="footer-icon-div rounded-circle border border-secondary d-flex justify-content-center align-items-center">
                                            <i class="fa-brands fa-facebook-f text-secondary"></i>
                                        </div>
                                        <div
                                            class="footer-icon-div rounded-circle border border-secondary d-flex justify-content-center align-items-center">
                                            <i class="fa-brands fa-x-twitter text-secondary"></i>
                                        </div>
                                        <div
                                            class="footer-icon-div rounded-circle border border-secondary d-flex justify-content-center align-items-center">
                                            <i class="fa-brands fa-instagram text-secondary"></i>
                                        </div>
                                        <div
                                            class="footer-icon-div rounded-circle border border-secondary d-flex justify-content-center align-items-center">
                                            <i class="fa-brands fa-linkedin-in text-secondary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="bg-secondary-subtle p-3 mb-5">
                        <div class="d-flex gap-3 justify-content-start my-2 px-4">
                            <i class="icon fa-solid fa-quote-left text-warning"></i>
                            <p class="text-secondary text-start mb-0 fst-italic">There are many variations of
                                passages of
                                Fasts by
                                injected humour, or randomised ere we must-have solution to satisfy. Lorem ipsum dolor
                                sit amet consectetur, adipisicing elit. Earum in optio reprehenderit minima amet sint
                                voluptas vero voluptatem quisquam maxime ipsam perferendis aperiam dicta, velit ea
                                blanditiis excepturi corrupti inventore.</p>

                        </div>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-4 ">
                    <div class="blog-search border border-secondary-subtle d-flex mb-5">
                        <input type="text" placeholder="Search..." class="ps-3">
                        <div class="search-icon-div d-flex justify-content-center align-items-center bg-warning ">
                            <i class="fa-solid fa-magnifying-glass text-white "></i>
                        </div>
                    </div>
                    <div class="border border-secondary-subtle mb-5 pb-2">
                        <h5 class="mx-4 mt-4 mb-3">Recents Post</h5>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="d-flex flex-column justify-content-start mx-4 gap-3 mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="../../admin/<?php echo $row['blog_image']; ?>" alt="" class="post-img">
                                        <div>
                                            <div class="d-flex sm-text justify-content-start align-items-center gap-2">
                                                <i class="fa-regular fa-calendar text-warning "></i>
                                                <p class="text-secondary mb-0">
                                                    <?php echo date("M d, Y", strtotime($row['created_at'])); ?>
                                                </p>
                                            </div>
                                            <h6><?php echo htmlspecialchars($row['blog_title']); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>


                    </div>
                    <div class="border border-secondary-subtle mb-5">
                        <h5 class="m-4">Categories</h5>
                        <ul class="mx-4 text-start category-list d-flex flex-column ">
                            <li class="d-flex justify-content-between">
                                <a href="">Business</a>
                                <span>(8)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="">Maintainence</a>
                                <span>(8)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="">Business</a>
                                <span>(8)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="">Business</a>
                                <span>(8)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="">Business</a>
                                <span>(8)</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="">Business</a>
                                <span>(8)</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- above footer -->
    <section class="container-wrapper footer-top-wrapper">
        <div class="my-container footer-top">
            <div
                class="icon-div rounded-circle d-flex align-items-center justify-content-center border border-5 border-white bg-warning">
                <i class=" icon fa-solid fa-tower-cell text-white "></i>
            </div>
            <div class="row align-items-center px-4">
                <div class="col-6 p-5">
                    <h2 class="text-white">News Letter To Connect Our Services In Your Area</h2>
                </div>
                <div class="col-6 p-5">
                    <div class="d-flex subscribe">
                        <input type="email" class="form-control py-2 ps-4 rounded-start rounded-end-0"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                        <button type="button"
                            class="btn btn-warning text-white px-5 py-2 rounded-end rounded-start-0 fw-semibold">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="container-wrapper footer-bg">
        <div class="my-container my-5">
            <div class="container text-start">
                <div class="row">
                    <div class="col-3">
                        <img src="../images/IMG_2882-removebg-preview.png" alt=""
                            class="footer-logo">
                        <div class="d-flex gap-3">
                            <div
                                class="footer-icon-div rounded-circle border border-white d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-facebook-f text-white"></i>
                            </div>
                            <div
                                class="footer-icon-div rounded-circle border border-white d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-x-twitter text-white"></i>
                            </div>
                            <div
                                class="footer-icon-div rounded-circle border border-white d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-instagram text-white"></i>
                            </div>
                            <div
                                class="footer-icon-div rounded-circle border border-white d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-linkedin-in text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <h4 class="text-white">Quick Links</h4>
                        <div class="border-element"></div>
                        <div class="d-flex flex-column">
                            <a href="">- Best Services</a>
                            <a href="">- Department</a>
                            <a href="">- About Our Company</a>
                            <a href="">- Business Contact</a>
                            <a href="">- Make An Appointment</a>
                        </div>
                    </div>
                    <div class="col-3">
                        <h4 class="text-white">Our Contacts</h4>
                        <div class="border-element"></div>
                        <div class="footer-address">
                            <p class="text-white mb-0">IT Bhavan, 3rd Floor</p>
                            <p class="text-white">Agartala, Tripura</p>
                        </div>
                        <div class="footer-call">
                            <p class="text-white mb-0"><b>Phone:</b> <a href="tel:+918257841299">(+91) 795493702</a></p>
                            <p class="text-white "><b>Fax:</b> <a href="tel:+918257841299">(+91) 795493702</a></p>
                        </div>
                        <div class="footer-mail">
                            <p class="text-white mb-0"><b>Email:</b> <a href="tel:+918257841299">debasmita@gmail.com</a>
                            </p>
                            <p class="text-white "><b>Website:</b> <a href="tel:+918257841299">website.com</a></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <h4 class="text-white">Recent Post</h4>
                        <div class="border-element"></div>
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex gap-3 justify-content-center">
                                <div class="footer-rp-img rounded-circle overflow-hidden">
                                    <img src="../images/img-02.jpg" alt="">
                                </div>
                                <div class=" text-start">
                                    <p class="text-white mb-0 date">23 Jan 2025</p>
                                    <h6 class="text-white"><a href=""></a>Get Around Easily Your Service</h6>
                                </div>
                            </div>
                            <div class="d-flex gap-3 justify-content-center">
                                <div class="footer-rp-img rounded-circle overflow-hidden">
                                    <img src="../images/img-02.jpg" alt="">
                                </div>
                                <div class=" text-start">
                                    <p class="text-white mb-0 date">23 Jan 2025</p>
                                    <h6 class="text-white"><a href=""></a>Get Around Easily Your Service</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- bootstrap script cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slider javascipt -->
    <script src="assets/javascript/swiper-bundle.min.js"></script>
    <script src="assets/javascript/script.js"></script>
</body>

</html>