<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
        // echo $_SESSION["admin"]["first_name"];
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
                <hr>
                <div class="row">
                    <div class="col-12 analytics-bx">

                        <div class="row">
                            <div class="col-12">
                                <span class="pg-title fs-2 fw-bold text-black-50">Statistics</span>
                                <div class="row statistics-card-wrapper">
                                    <!-- statistics card -->
                                    <div class="col statistics-card">
                                        <div class="card-title">
                                            Visitors
                                        </div>
                                        <div class="card-circ-prog">
                                            Visitors
                                        </div>
                                    </div>
                                    <!-- statistics card -->
                                </div>
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