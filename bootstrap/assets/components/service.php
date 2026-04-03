<?php
include("config.php");

$serviceQuery = "SELECT service_image, service_name, service_description FROM add_service";
$serviceResult = mysqli_query($conn, $serviceQuery);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- favicon -->
     <link rel="shortcut icon" href="../images/main_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css?v=<?php echo time()?>">
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
            <h1 class="text-white">Service</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="container-wrapper service-sec">
        <div class="my-container">
            <div class="best-features-note text-center py-5 mx-5">
                <div class="dot d-inline-flex align-items-center py-2 my-2">
                    <i class="fa-solid fa-circle me-2 text-warning"></i>
                    <h5 class=" mb-0 text-warning">WHAT WE DO</h5>
                </div>
                <h3 class="display-5">We High Service That Stand</h3>
            </div>
            <div class=" row service-carousal mb-3">
                <?php while ($service = mysqli_fetch_assoc($serviceResult)) { ?>
                    <div class="col-4">
                        <div class="my-card border rounded d-flex flex-column justify-content-center mb-3">

                            <div class="my-card-img">
                                <img src="../../admin/<?php echo $service['service_image']; ?>"
                                    alt="<?php echo htmlspecialchars($service['service_name']); ?>" class="rounded">
                            </div>

                            <div
                                class="icon-div rounded-circle d-flex align-items-center justify-content-center border border-5 border-white ms-auto">
                                <i class="icon fa-solid fa-signal text-white"></i>
                            </div>

                            <div class="card-text mx-3">
                                <h4 class="mb-2">
                                    <?php echo htmlspecialchars($service['service_name']); ?>
                                </h4>

                                <p class="text-secondary">
                                    <?php echo htmlspecialchars($service['service_description']); ?>
                                </p>

                                
                            </div>

                        </div>
                    </div>
                <?php } ?>

                
            </div>
            
        </div>
    </div>

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

</body>

</html>