<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/Asset 7.png" type="image/x-icon">

    <!-- Bootstrap CDN -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 background">
                <!-- register box -->
                <div class="row  d-flex d-none vh-100" id="userReg">
                    <div class="col-11 col-lg-8 col-xl-6 p-3 align-self-center m-auto content-bx">
                        <div class="row">
                            <div class="col-12 logo"></div>
                        </div>
                        <div class="row mt-2">
                            <div class=" col-12 text-center text-capitalize heading">
                                <h3 class="fw-bold">Set Up Your HASH Account</h3>
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <input type="text" minlength="4" class="input-field" autocomplete="off" required id="firstName">
                                    <label class="inlabel">First Name</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <input type="text" minlength="4" class="input-field" autocomplete="off" required id="lastName">
                                    <label class="inlabel">Last Name</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <input type="email" minlength="4" class="input-field" autocomplete="off" required id="email">
                                    <label class="inlabel">Email</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <input type="text" minlength="4" class="input-field" autocomplete="off" required id="contact">
                                    <label class="inlabel">Contact</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <select class="input-field" id="gender">
                                        <option value="0">Gender</option>

                                        <?php

                                        require "connection.php";

                                        $result = Database::search("SELECT * FROM `gender`");
                                        $n = $result->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $gn = $result->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $gn["id"] ?>"><?php echo $gn["name"]; ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                    <!-- <label class="inlabel">Gender</label> -->
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <div class="input-wrap">
                                    <input type="password" minlength="4" class="input-field" autocomplete="off" required id="password">
                                    <label class="inlabel">Password</label>
                                </div>
                            </div>

                            <div class="check text-center col-12 mt-1">
                                <input type="checkbox" class="me-3" id="agreement" name="agreement" id="tac">
                                <label for="agreement" class="text-dark"> I agree with Hash's <span>Terms & Privacy
                                        Policy</span></label>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="w-100 reigister-btn" onclick="userReg();">Register</button>
                            </div>

                            <div class="col-12 mt-3 text-center login">
                                <span class="text-dark">Already have an Account? <a href="#" onclick="toggleView();">Log in</a> </span>
                            </div>
                        </div>
                    </div>
                    <!--register box -->
                </div>
                <!-- login box -->
                <div class="row d-flex vh-100" id="userLog">
                    <div class="col-11 col-md-8 col-lg-6 col-xl-4 p-3 align-self-center m-auto content-bx">
                        <div class="row">
                            <div class="col-12 logo"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center text-capitalize heading">
                                <h3>Log in to Your  Account</h3>
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-12 mt-1">
                                <div class="input-wrap">
                                    <input type="email" minlength="4" class="input-field" autocomplete="off" required id="loginEmail">
                                    <label class="inlabel">Email</label>
                                </div>
                            </div>

                            <div class="col-12 mt-1">
                                <div class="input-wrap">
                                    <input type="password" minlength="4" class="input-field" autocomplete="off" required id="loginPassword">
                                    <label class="inlabel">Password</label>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="w-100 reigister-btn" onclick="userlog();">Log In</button>
                            </div>

                            <div class="col-12 mt-3 text-center login">
                                <span class="text-dark">Forgot Password? <a href="#" onclick="forgotPassword();">Click Here</a> </span>
                            </div>
                            <div class="col-12 mt-3 text-center login">
                                <span class="text-dark">Don't Have an Account? <a href="#" onclick="toggleView();">Register Now</a> </span>
                            </div>
                            <div class="col-12 mt-3 text-center login">
                                <button class="btn btn-primary"><a href="home.php" class="text-white">Goto Home Page</a></button>
                            </div>
                        </div>
                    </div>
                    <!-- content box -->
                </div>
            </div>
        </div>
        <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

        <!-- Sweet Alerts -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- JS File -->
        <script src="js/script.js"></script>

</body>

</html>