<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- css files -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    <?php

    session_reset();
    session_start();
    require "connection.php";
    $id = $_SESSION["userEmail"]["id"];

    if (isset($_SESSION["userEmail"])) {
    ?>
        <div class="container-fluid">

            <!-- top bar -->
            <div class="row">
                <div class="col-4 topbar-boxes">
                    <button class="home-btn" onclick="switchHome();">Home</button>
                </div>
                <div class="col-4 topbar-boxes user-prof-logo">
                    <img src="img/Asset 7.png" alt="">
                </div>
                <div class="col-4 topbar-boxes">
                    <?php
                    $imgrs = Database::search("SELECT * FROM prof_img WHERE user_id = '" . $id . "'");
                    $imgn = $imgrs->num_rows;
                    $imgd = $imgrs->fetch_assoc();

                    if ($imgn == 1) {
                    ?>
                        <div class="prof-pic overflow-hidden d-flex justify-content-center">
                            <img style="display: block;  margin-left: auto;  margin-right: auto;  height: 100%;" src="<?php echo $imgd["code"]; ?>" id="prev2">
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="prof-pic overflow-hidden d-flex justify-content-center">
                            <img style="display: block;  margin-left: auto;  margin-right: auto;  height: 100%;" src="img/defaulturs.webp" id="prev2">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- page content -->
            <div class="row user-prof-page-content">
                <div class="col-12 page-title">
                    <h3 class="text-center">User Profile</h3>

                    <!-- user profile -->
                    <div class="row  justify-content-center">
                        <!-- content-box-1 -->
                        <div class="col-12 col-lg-3  up-box-1">
                            <div class="row text-white">
                                <div class="col-12 p-4 profile-pic-bg">

                                    <?php

                                    if ($imgn == 1) {
                                    ?>
                                        <div class="prof-img my-4 overflow-hidden d-flex justify-content-center">
                                            <img style="display: block;  margin-left: auto;  margin-right: auto;  height: 100%;" src="<?php echo $imgd["code"]; ?>" id="prev">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="prof-img my-4 overflow-hidden d-flex justify-content-center">
                                            <img style="display: block;  margin-left: auto;  margin-right: auto;  height: 100%;" src="img/defaulturs.webp" id="prev">
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <h5 class="text-center my-2"><?php
                                                                    $urs = Database::search("SELECT * FROM user WHERE id = '" . $id . "'");
                                                                    $un = $urs->num_rows;
                                                                    $ud = $urs->fetch_assoc();

                                                                    $fname = $ud["first_name"];
                                                                    $lname = $ud["last_name"];

                                                                    echo $fname . " " . $lname;

                                                                    ?></h5>
                                    <h6 class="text-center my-2">Registered : 17 Aug 2022</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-control my-1 d-none" id="profPicChngBtn">
                                    <div class="row d-flex justify-content-center">
                                        <!-- <button type="file" class="col-11 btn btn-primary my-1">Change Profile Picture</button> -->
                                        <input type="file" class="d-none" accept="img/*" id="imageUploader" />
                                        <label for="imageUploader" class="btn btn-primary d-grid col-11 my-1" onclick="profileImgUpload();">Upload Profile Image</label>
                                    </div>
                                </div>
                                <div class="col-12 form-control my-1">
                                    <label for="upFName">First Name</label>
                                    <input type="text" id="upFName" readonly class="form-control mt-1" value="<?php echo $fname; ?>">
                                </div>
                                <div class="col-12 form-control my-1">
                                    <label for="upLName">Last Name</label>
                                    <input type="text" id="upLName" readonly class="form-control mt-1" value="<?php echo $lname; ?>">
                                </div>
                                <div class="col-12 form-control my-1">
                                    <label for="email">Email</label>
                                    <input type="text" id="upEmail" readonly class="form-control mt-1" value="<?php echo $ud["email"]; ?>">
                                </div>
                                <div class="col-12 form-control my-1">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" id="upContact" readonly class="form-control mt-1" value="<?php echo $ud["contact_number"]; ?>">
                                </div>
                                <div class=" col-12 form-control my-1">
                                    <label for="upPassword">Password</label>
                                    <div class="input-group ">
                                        <input type="password" id="upPassword" readonly class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION["userEmail"]["password"] ?>">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="revealPW();"><i class='bx bx-show'></i></button>
                                    </div>
                                </div>
                                <div class=" col-12 form-control my-1 d-none" id="upCnfmPwBx">
                                    <label for="upCnfrmPassword">Confirm Password</label>
                                    <div class="input-group ">
                                        <input type="password" class="form-control" id="upCnfrmPassword" readonly placeholder="Confirm Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="revealCnfmPW();"><i class='bx bx-show'></i></button>
                                    </div>
                                </div>
                                <div class="col-12 form-control my-1">
                                    <label for="Address">Address</label>

                                    <?php

                                    $rs2 = Database::search("SELECT *  FROM user_has_address WHERE user_id = '" . $id . "'");
                                    $n = $rs2->num_rows;
                                    $d = $rs2->fetch_assoc();

                                    if ($n == 1) {
                                    ?>
                                        <input type="text" readonly class="form-control mt-1" value="<?php echo $d["line1"]; ?>" placeholder="Line 1" id="upAddl1">
                                        <input type="text" readonly class="form-control mt-1" value="<?php echo $d["line2"]; ?>" placeholder="Line 2" id="upAddl2">
                                        <input type="text" readonly class="form-control mt-1" value="<?php echo $d["city"]; ?>" placeholder="City" id="upCity">
                                        <input type="text" readonly class="form-control mt-1" value="<?php echo $d["postal_code"]; ?>" placeholder="Postal Code" id="upPostCode">
                                    <?php
                                    } else {
                                    ?>
                                        <input type="text" readonly class="form-control mt-1" value="" placeholder="Line 1" id="upAddl1">
                                        <input type="text" readonly class="form-control mt-1" value="" placeholder="Line 2" id="upAddl2">
                                        <input type="text" readonly class="form-control mt-1" value="" placeholder="City" id="upCity">
                                        <input type="text" readonly class="form-control mt-1" value="" placeholder="Postal Code" id="upPostCode">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12 form-control my-1">
                                    <div class="row d-flex justify-content-center">
                                        <button class="col-11 btn btn-primary my-1" id="editProfileBtn" onclick="editProfileBtn();">Edit Profile</button>
                                        <button class="col-11 btn btn-primary my-1 d-none" id="saveChangesBtn" onclick="upSaveChanges();">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- user profile -->

                </div>
            </div>
        <?php
    } else {
        ?>
            <script>
                window.location = "home.php";
            </script>
        <?php
    }
        ?>



        <!-- js -->
        <script src="js/script.js"></script>
</body>

</html>