<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Admin</title>
    <!-- css links -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ==================================== -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/adminSideNav.css">
</head>

<body>
    <?php

    session_start();
    require "../connection.php";

    if (isset($_SESSION["admin"])) {
    ?>
        <div class="wrapper d-flex align-items-stretch">
            <?php
            require "adminNav.php";
            ?>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">

                <div class="row">
                    <div class="col-2">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>
                    <div class="col-8 logo"></div>
                    <div class="col fs-4 fw-bold">Admin</div>
                </div>

                <div class="row">
                    <div class="col-12 aup-greeting-text">
                        <span>Welcome Back Hashan!</span>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex align-items-center justify-content-center col-12 aup-propic-bg">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('../img/defaulturs.webp');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 gx-4 col-md-4 col-lg-3 border mt-3 p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="fname">
                                    <label for="fName" class="text-black-50">First Name</label>
                                    <input type="text" readonly class="d-block form-control">
                                </div>
                                <div class="lName">
                                    <label for="lName" class="text-black-50">Last Name</label>
                                    <input type="text" readonly class="d-block form-control">
                                </div>
                                <div class="email">
                                    <label for="email" class="text-black-50">Email Address</label>
                                    <input type="text" readonly class="d-block form-control">
                                </div>
                                <div class="password">
                                    <label for="password" class="text-black-50">Password</label>
                                    <input type="password" readonly class="d-block form-control">
                                </div>
                                <div class="edit-profile my-3">
                                    <button class="btn btn-primary w-100">Edit Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-8 mx-auto">
                        <div class="row">
                            <div class="col-12 col-md-6 border mt-3 aup-cards customer-feedbacks">
                                Customer Feedbacks
                            </div>
                            <div class="col-12 col-md-6 border mt-3 aup-cards customer-messages">
                                Messages
                            </div>
                            <div class="col-12 col-md-6 border mt-3 aup-cards orders">
                                Orders
                            </div>
                            <div class="col-12 col-md-6 border mt-3 aup-cards product-listing">
                                Product Listing
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/admin.js"></script>

    <?php
    } else {
    ?>
        <script>
            window.location = "adminLogin.php";
        </script>
    <?php
    }

    ?>
</body>

</html>