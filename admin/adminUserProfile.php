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

            $adminResult = Database::search("SELECT * FROM user WHERE email = '" . $_SESSION["admin"]["email"] . "' AND user_type_id = '2'");
            $data = $adminResult->fetch_assoc();
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
                    <div class="col-12 aup-greeting-text text-center">
                        <span>Welcome Back <?php echo $_SESSION["admin"]["first_name"] ?></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="d-flex align-items-center justify-content-center col-12 col-md-8 col-lg-5 aup-propic-bg">
                        <div class="avatar-upload">
                            <div class="avatar-edit d-none" id="profilePicEdit" onclick="profileImgUploadAdmin();">
                                <input type='file' id="imageUploadAdmin" />
                                <label for="imageUploadAdmin"></label>
                            </div>
                            <div class="avatar-preview">
                                <!-- <div id="imagePreviewAdmin"></div> -->

                                <?php
                                $id = $_SESSION["admin"]["id"];
                                $imgrs = Database::search("SELECT * FROM prof_img WHERE user_id = '" . $id . "'");
                                $imgn = $imgrs->num_rows;
                                $imgd = $imgrs->fetch_assoc();
                                if ($imgn == 1) {
                                ?>
                                    <img id="avatarPreview" src="<?php echo $imgd["code"]; ?>">
                                <?php
                                } else {
                                ?>
                                    <img id="avatarPreview" src="../img/defaulturs.webp">
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" id="profileDetails">
                    <div class="col-12 gx-4 col-md-8 col-lg-5 border mt-3 p-3 aup-details d-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="fname">
                                    <label for="fName" class="text-black-50">Full Name</label>
                                    <input type="text" value="<?php echo $data["first_name"] . " " . $data["last_name"] ?>" readonly class="d-block w-100">
                                </div>
                                <div class="email">
                                    <label for="lName" class="text-black-50">Email Address</label>
                                    <input type="text" value="<?php echo $data["email"] ?>" readonly class="d-block w-100">

                                </div>
                                <div class="reg-date">
                                    <label for="email" class="text-black-50">Registered Date</label>
                                    <input type="text" value="<?php echo $data["register_date"]; ?>" readonly class="d-block w-100">
                                </div>

                                <div class="contact">
                                    <label for="email" class="text-black-50">Contact Number</label>
                                    <input type="text" value="<?php echo $data["contact_number"]; ?>" readonly class="d-block w-100">
                                </div>

                                <div class="row gap-2 gap-md-1 password align-items-center justify-content-between">
                                    <div class="col-1">
                                        <label for="password" class="text-black-50 d-inline"><i class='bx bx-lock-alt'></i></label>
                                    </div>
                                    <div class="col-10">
                                        <button data-bs-toggle="modal" data-bs-target="#myModal">Change Password</button>
                                    </div>
                                    <!-- model -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Change Password</h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <label class="text-black-50 bg-transparent">Your Old Password</label>
                                                    <div class="row g-2 justify-content-around">
                                                        <input type="password" class="d-inline col-9" id="adminOldPw">
                                                        <button onclick="revealOldPwAdmin();" id="adminOldPwBtn" class="d-inline col-2">show</button>
                                                    </div>

                                                    <label class="text-black-50 bg-transparent">New Password</label>
                                                    <div class="row g-2 justify-content-around">
                                                        <input type="password" class="d-inline col-9" id="adminNewPw">
                                                        <button class="d-inline col-2" id="adminNewPwBtn" onclick="revealNewPwAdmin();">show</button>
                                                    </div>

                                                    <label class="text-black-50 bg-transparent">Confirm Password</label>
                                                    <div class="row g-2 justify-content-around">
                                                        <input type="password" class="d-inline col-9" id="adminCnfmPw">
                                                        <button id="adminCnfmPwBtn" class="d-inline col-2" onclick="revealCnfmPwAdmin();">show</button>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" onclick="updateAdminPassword();">Update Password</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- model -->
                                </div>
                                <div class="edit-profile my-3">
                                    <button class="btn btn-primary w-100" onclick="editProfile();">Edit Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center d-none" id="editProfileDetails">
                    <div class="col-12 gx-4 col-md-8 col-lg-5 border mt-3 p-3 aup-details">
                        <div class="first-name">
                            <label for="first-name" class="text-black-50">First Name</label>
                            <input type="text" value="<?php echo $data["first_name"]; ?>" readonly class="d-block w-100" id="fName">
                        </div>

                        <div class="last-name">
                            <label for="last-name" class="text-black-50">Last Name</label>
                            <input type="text" value="<?php echo $data["last_name"]; ?>" readonly class="d-block w-100" id="lName">
                        </div>

                        <div class="email">
                            <label for="email" class="text-black-50">Email Address</label>
                            <input type="text" value="<?php echo $data["email"]; ?>" readonly class="d-block w-100" id="email">
                        </div>

                        <div class="contact">
                            <label for="contact" class="text-black-50">Contact</label>
                            <input type="text" value="<?php echo $data["contact_number"]; ?>" readonly class="d-block w-100" id="contact">
                        </div>
                        <div class="row gap-2 gap-md-1 password align-items-center justify-content-between">
                            <div class="col-1">
                                <label for="password" class="text-black-50 d-inline"><i class='bx bx-lock-alt'></i></label>
                            </div>
                            <div class="col-10">
                                <button>Change Password</button>
                            </div>
                        </div>
                        <div class="edit-profile my-3">
                            <button class="btn btn-primary w-100" onclick="adminSaveChanges();">Save Changes</button>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 gx-4 col-md-8 col-lg-5 border mt-3 p-3 aup-details">
                        <div class="row gap-2 gap-md-1 password align-items-center justify-content-between">
                            <div class="col-1">
                                <label for="password" class="help-icon text-black-50 d-inline"><i class='bx bx-question-mark'></i></label>
                            </div>
                            <div class="col-10 help">
                                <button onclick="help();">Help</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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