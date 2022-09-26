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

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-0" style="min-height: 550px;">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 verification-logo"></div>
                </div>
                <div class="row">
                    <div class="col-12 verification-img"></div>
                </div>
                <div class="row">
                    <div class="col-12 text-center verification-input">
                        <label>Please Enter Your Verification Code</label>
                        <br>
                        <input type="text">
                        <br>
                        <button class="my-2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    
    require "footer.php";

    ?>
</body>

</html>