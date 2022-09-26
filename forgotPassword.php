<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/FavIcon.png" type="image/x-icon">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row forgotPassword d-flex align-items-center justify-content-center">
            <div class="col-12 title text-center mt-5 fs-4">Forgot Password</div>
            <div class="col-12 bg-img"></div>
            <div class="col-12 col-sm-6 col-md-4 mt-1 inputGroup text-center">
                <label for="email">Please Enter your Registerd Email Address</label>
                <input class="w-100" type="email" name="email" id="forgotPasswordEmail">
                <button class="w-100" onclick="passwordReset();">Send Verification Code</button>
            </div>
        </div>
    </div>
    <?php
    require "footer.php";
    ?>


    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Sweet Alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS File -->
    <script src="js/script.js"></script>
</body>

</html>