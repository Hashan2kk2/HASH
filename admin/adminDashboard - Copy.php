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
                                <span class="pg-title fs-2 fw-bold text-black-50">Analytics</span>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <!-- analytic card -->
                            <div class="col-10 col-md-3 mx-md-2 mx-lg-4 my-3 p-4 analytic-card">
                                <div class="row">
                                    <div class="col-12 num">
                                        <span>300</span>
                                    </div>
                                    <div class="col-12 about">
                                        <span>Transactions</span>
                                    </div>
                                    <div class="col-6 time-period">
                                        <span>Last Month</span>
                                    </div>
                                    <div class="col-6 text-end percentage">
                                        <span>Upto 25%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- analytic card -->
                            <!-- new accounts card -->
                            <div class="col-10 col-md-3 mx-md-2 mx-lg-4 my-3 p-4 analytic-card">
                                <div class="row">
                                    <div class="col-12 num">
                                        <span>45</span>
                                    </div>
                                    <div class="col-12 about">
                                        <span>Accounts</span>
                                    </div>
                                    <div class="col-6 time-period">
                                        <span>Last Month</span>
                                    </div>
                                    <div class="col-6 text-end percentage">
                                        <span>Upto 25%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- new accounts card -->
                            <!-- Product Returns Card -->
                            <div class="col-10 col-md-3 mx-md-2 mx-lg-4 my-3 p-4 analytic-card">
                                <div class="row">
                                    <div class="col-12 num">
                                        <span>10</span>
                                    </div>
                                    <div class="col-12 about">
                                        <span>Product Returns</span>
                                    </div>
                                    <div class="col-6 time-period">
                                        <span>Last Month</span>
                                    </div>
                                    <div class="col-6 text-end percentage">
                                        <span>Upto 25%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Returns card -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8 col-md-10">
                        <span class="pg-title fs-2 fw-bold text-black-50">Customers</span>
                    </div>
                    <div class="col-4 col-md-2">
                        <select class="form-control" id="sortCustomers">
                            <option value="0">Sort By</option>
                            <option value="0">Name A-Z</option>
                            <option value="0">Date Reg.</option>
                        </select>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-12 col-md-10 col-lg-10">
                        <table class="table table-bordered rounded-3">
                            <thead>
                                <tr>
                                    <th class="col-1" scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th class="col-4" scope="col">Registered On</th>
                                    <th class="col-1" scope="col">More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td><button class="btn btn-primary btn-sm">View More</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td><button class="btn btn-primary btn-sm">View More</button></td>
                                </tr>
                            </tbody>
                        </table>
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