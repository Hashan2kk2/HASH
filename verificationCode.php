<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset | Verificaion Code</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onpageshow="verificationTimer();">
    <?php
    echo "Email Address is '" . $_SESSION["resetEmail"] . "'";
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-0" style="min-height: 550px;">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 verification-logo"></div>
                </div>
                <div class="row">
                    <div class="col-12 verification-img"></div>
                </div>


                <div class="row" id="verificationCodeInput">
                    <div class="col-12 text-center verification-input">
                        <label>Please Enter Your Verification Code</label>
                        <br>
                        <input type="text" id="verificationCode">
                        <p> Session Expires in <span id="countdowntimer">180 </span> Seconds</p>
                        <br>
                        <button class="my-2" onclick="resetPassword();">Submit</button>
                    </div>
                </div>
                

                <div class="row d-none" id="newPasswordInput">
                    <div class="col-12 text-center">
                        <p class="">
                            <label for="password" class="text-end">New Password:</label>
                            <input type="password" name="password" id="password1" />
                            <i class="fa fa-eye-slash" id="togglePassword1" style="cursor: pointer;" onclick="switchPwType1();"></i>
                        </p>
                        <p class="">
                            <label for="password" class="text-end">Confirm Password:</label>
                            <input type="password" name="password" id="password2" />
                            <i class="fa fa-eye-slash" id="togglePassword2" style="cursor: pointer;" onclick="switchPwType2();"></i>
                        </p>
                        <button class="resetBtn" onclick="resetPassword();">Reset Password</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    require "footer.php";

    ?>
    <script src="js/script.js"></script>

</body>

</html>