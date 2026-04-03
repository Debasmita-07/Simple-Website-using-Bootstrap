<?php
include("config.php"); // Your DB connection

if (isset($_POST["submit_contact"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    date_default_timezone_set('Asia/Kolkata');

    $curentDatetime = date('Y-m-d H:i:s');



    $sql = "INSERT INTO contact_list (name, email, message, created_at) VALUES ('$name', '$email', '$message', '$curentDatetime')";


    if (mysqli_query($conn, $sql)) {
        $success = true;
    }


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
            <h1 class="text-white">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- contact form -->
    <div class="container-wrapper contact-form">
        <div class="my-container">
            <div class="row ">
                <div class="col-7 contact-left">
                    <form  method="post">
                        <div class="dot d-inline-flex align-items-center justify-content-start py-2 my-2 w-100">
                            <i class="fa-solid fa-circle me-3 text-warning"></i>
                            <h5 class=" mb-0 text-warning">CONTACT NOW</h5>
                        </div>
                        <h1 class="text-dark text-start">Live Sports This Contacts Us</h1>
                        <p class="text-secondary text-start">In job gives you handcrafted options such as front adm in
                            reviews or
                            email notifications. It also gives employer management fo apps ial media in area.</p>
                        <div class="d-flex gap-4 mb-4">
                            <input class="form-control p-3" type="text" placeholder="Your Name" name="name"
                                aria-label="default input example">
                            <input class="form-control p-3" type="text" placeholder="Your Email" name="email"
                                aria-label="default input example">
                        </div>
                        <textarea class="form-control mb-4" id="exampleFormControlTextarea1" rows="5" name="message"
                            placeholder="Message"></textarea>
                        <button type="submit" name="submit_contact" class="btn btn-warning btn-lg text-white">Send
                            Request</button>
                    </form>
                </div>
                <div class="col-5 contact-right">
                    <div class="contact-img d-flex justify-content-center align-items-center ">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex gap-4 justify-content-start align-items-center">
                                <div
                                    class=" icon-div rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                    <i class=" icon fa-solid fa-phone text-white "></i>
                                </div>
                                <div>
                                    <h4 class="text-white">Call Me</h4>
                                    <a href="tel:+918257841299">+91 68269176639</a>
                                    <br>
                                    <a href="tel:+918257841299">+91 68269176639</a>
                                </div>
                            </div>
                            <div class="d-flex gap-4 justify-content-start align-items-center">
                                <div
                                    class=" icon-div rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                    <i class=" icon fa-solid fa-envelope text-white "></i>
                                </div>
                                <div>
                                    <h4 class="text-white">Mail Us</h4>
                                    <a href="mailto:debasmita1204@gmail.com">debasmita1204@gmail.com</a>
                                    <br>
                                    <a href="mailto:debasmita1204@gmail.com">debasmita@gmail.com</a>
                                </div>
                            </div>
                            <div class="d-flex gap-4 justify-content-start align-items-center">
                                <div
                                    class=" icon-div rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                    <i class=" icon fa-solid fa-location-dot text-white "></i>
                                </div>
                                <div>
                                    <h4 class="text-white">Address</h4>
                                    <p class="text-white mb-0">IT Bhavan, 3rd Floor</p>
                                    <p class="text-white mb-0">Agartala, Tripura(W)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($success): ?>
<script>
    Swal.fire({
        title: 'Success!',
        text: 'Your message has been sent successfully.',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = 'contact.php';
    });
</script>
<?php endif; ?>


    <!-- bootstrap script cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slider javascipt -->
    <script src="assets/javascript/swiper-bundle.min.js"></script>
    <script src="assets/javascript/script.js"></script>

    

</body>

</html>