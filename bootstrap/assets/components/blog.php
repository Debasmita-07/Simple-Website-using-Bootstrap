<?php
include "config.php";

$query = "SELECT id, blog_image, blog_title, blog_description, created_at
          FROM blog_list
          ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
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
            <h1 class="text-white">Blog List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- blog content -->
    <section class="container-wrapper blog-content">
        <div class="my-container">
            <div class="best-features-note text-center mb-5">
                <div class="dot d-inline-flex align-items-center py-2 my-2">
                    <i class="fa-solid fa-circle me-2 text-warning"></i>
                    <h5 class=" mb-0 text-warning">WHAT WE DO</h5>
                </div>
                <h3 class="display-5">We High Service That Stand</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($blog = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col px-2 ">
                            <div class="card border">
                                <img src="../../admin/<?php echo $blog['blog_image']; ?>" class="card-img-top rounded"
                                    style=" object-fit: cover;" alt="<?php echo htmlspecialchars($blog['blog_title']); ?>">

                                <div class="card-body">
                                    <div class="d-flex gap-2">
                                        <p class="text-secondary mb-1">By: Admin</p>
                                        <p class="text-secondary mb-1">
                                            <?php echo date("F j, Y", strtotime($blog['created_at'])); ?>
                                        </p>
                                    </div>

                                    <h4 class="card-title">
                                        <?php echo htmlspecialchars($blog['blog_title']); ?>
                                    </h4>

                                    <p class="card-text text-secondary clamp-2">
                                        <?php echo htmlspecialchars($blog['blog_description']); ?>
                                    </p>

                                    <h6><a href="blog_list.php?id=<?php echo $blog['id']; ?>">Read More +</a></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='col-12 text-center'>No blogs found</div>";
                }
                ?>
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