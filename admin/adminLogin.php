<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- css links -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 login-bg">
                <!-- form -->
                <div class="row d-flex justify-content-center align-items-center vh-100">
                    <div class="col-11 col-md-8 col-lg-4 p-3 px-5 form-bx">
                        <div class="row">
                            <!-- title -->
                            <div class="col-12 logo my-3"></div>
                            <div class="col-12 text-center">
                                <span class="text-black-50 fw-normal">(Admin)</span>
                            </div>
                            <div class="col-12 py-4">
                                <span class="fs-3 text-black-50 fw-bold">Sign-in to continue</span>
                            </div>
                            <!-- title -->
                            <div class="col-12 mt-2">
                                <div class="input-wrap">
                                    <input type="text" minlength="4" class="input-field" autocomplete="off" required id="adminEmail">
                                    <label class="inlabel">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="input-wrap">
                                    <input type="password" minlength="4" class="input-field" autocomplete="off" required id="adminPassword">
                                    <label class="inlabel">Password</label>
                                </div>
                            </div>
                            <div class="col-12 mt-1 mb-3">
                                <span>Forgot Password?</span>
                            </div>
                            <div class="col-12 mt-1 mb-3">
                                <button class="w-100 reigister-btn" onclick="adminLogIn();">Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form -->
            </div>
        </div>
    </div>
    <script src="../js/admin.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>