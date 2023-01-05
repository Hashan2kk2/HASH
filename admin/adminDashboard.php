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

                        <div class="row justify-content-around">
                            <span class="pg-title fs-2 fw-bold text-black-50">Statistics</span>
                            <div class="col-12 col-lg-4">
                                <div class="row statistics-card-wrapper">
                                    <!-- statistics card -->
                                    <!-- users -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Users
                                        </div>
                                        <div class="card-count">
                                            1025
                                        </div>
                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- users -->
                                    <!-- Sales -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Sales
                                        </div>
                                        <div class="card-count">
                                            1025
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Sales -->
                                    <!-- Pending Deliveries -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Pending Deliveries
                                        </div>
                                        <div class="card-count">
                                            1025
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Pending Deliveries -->
                                    <!-- Returns -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Returns
                                        </div>
                                        <div class="card-count">
                                            1025
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Returns -->
                                    <!-- statistics card -->
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <!--=================-->
                                <!--recent users-->
                                <div class="col-12 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Recent Users</div>
                                        <div class="count d-inline">1025</div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="show-more mb-2">
                                        <button>Show more</button>
                                    </div>
                                </div>
                                <!--recent users-->

                                <!--Orders-->
                                <div class="col-12 mt-3 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Orders</div>
                                        <div class="count d-inline">1025</div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="show-more mb-2">
                                        <button>Show more</button>
                                    </div>
                                </div>
                                <!--Orders-->
                                <!--Invoices-->
                                <div class="col-12 mt-3 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Invoices</div>
                                        <div class="count d-inline">1025</div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="show-more mb-2">
                                        <button>Show more</button>
                                    </div>
                                </div>
                                <!--Invocies-->
                            </div>

                            <div class="col-12 mt-4 mt-lg-0 col-lg-4 dashboard-listing">
                                <div class="row mt-4 mt-lg-0 justify-content-around">
                                    <div class="col-8 mt-lg-2 title">
                                        Recent listings
                                    </div>
                                    <div class="col-4 text-center manage mt-auto mb-auto">
                                        <button>Manage</button>
                                    </div>
                                    <!-- listing card -->
                                    <!-- <div class="col-12 listing-card">
                                        <div class="image">
                                            <img src="../img/backpack.png" alt="">
                                        </div>
                                        <div></div>
                                    </div> -->
                                    <!-- listing card -->
                                    <!-- listing card -->
                                    <div class="col-12 col-md-5 col-lg-12 my-1 listing-card">
                                        <div id="card2" class="image carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <img src="../img/backpack.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <img src="../img/shoe.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/watch.png" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#card2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#card2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="listing-details">
                                            <p class="product-name">Nike Air Force</p>
                                            <p class="sizes">Sizes</p>
                                            <p><span>S</span>
                                                <span>M</span>
                                                <span>L</span>
                                                <span>XL</span>
                                            </p>
                                            <p class="date-listed">Date Listed</p>
                                            <p class="date">2020.02.03</p>
                                        </div>
                                        <div class="button align-self-end mb-4">
                                            <button><i class='bx bxs-right-arrow-circle'></i></button>
                                        </div>
                                    </div>
                                    <!-- listing card -->
                                    <!-- listing card -->
                                    <div class="col-12 col-md-5 m-3 col-lg-12 my-2 listing-card">
                                        <div id="card2" class="image carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <img src="../img/backpack.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <img src="../img/shoe.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/watch.png" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#card2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#card2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="listing-details">
                                            <p class="product-name">Nike Air Force</p>
                                            <p class="sizes">Sizes</p>
                                            <p><span>S</span>
                                                <span>M</span>
                                                <span>L</span>
                                                <span>XL</span>
                                            </p>
                                            <p class="date-listed">Date Listed</p>
                                            <p class="date">2020.02.03</p>
                                        </div>
                                        <div class="button align-self-end mb-4">
                                            <button><i class='bx bxs-right-arrow-circle'></i></button>
                                        </div>
                                    </div>
                                    <!-- listing card -->
                                    <!-- listing card -->
                                    <div class="col-12 col-md-5 m-3 col-lg-12 my-2 listing-card">
                                        <div id="card2" class="image carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <img src="../img/backpack.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <img src="../img/shoe.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/watch.png" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#card2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#card2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="listing-details">
                                            <p class="product-name">Nike Air Force</p>
                                            <p class="sizes">Sizes</p>
                                            <p><span>S</span>
                                                <span>M</span>
                                                <span>L</span>
                                                <span>XL</span>
                                            </p>
                                            <p class="date-listed">Date Listed</p>
                                            <p class="date">2020.02.03</p>
                                        </div>
                                        <div class="button align-self-end mb-4">
                                            <button><i class='bx bxs-right-arrow-circle'></i></button>
                                        </div>
                                    </div>
                                    <!-- listing card -->
                                    <!-- listing card -->
                                    <div class="col-12 col-md-5 m-3 col-lg-12 my-2 listing-card">
                                        <div id="card2" class="image carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <img src="../img/backpack.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <img src="../img/shoe.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/watch.png" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#card2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#card2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="listing-details">
                                            <p class="product-name">Nike Air Force</p>
                                            <p class="sizes">Sizes</p>
                                            <p><span>S</span>
                                                <span>M</span>
                                                <span>L</span>
                                                <span>XL</span>
                                            </p>
                                            <p class="date-listed">Date Listed</p>
                                            <p class="date">2020.02.03</p>
                                        </div>
                                        <div class="button align-self-end mb-4">
                                            <button><i class='bx bxs-right-arrow-circle'></i></button>
                                        </div>
                                    </div>
                                    <!-- listing card -->
                                    <!-- listing card -->
                                    <div class="col-12 col-md-5 mt-1 col-lg-12 listing-card">
                                        <div id="card2" class="image carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <img src="../img/backpack.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <img src="../img/shoe.png" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/watch.png" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#card2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#card2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="listing-details">
                                            <p class="product-name">Nike Air Force</p>
                                            <p class="sizes">Sizes</p>
                                            <p><span>S</span>
                                                <span>M</span>
                                                <span>L</span>
                                                <span>XL</span>
                                            </p>
                                            <p class="date-listed">Date Listed</p>
                                            <p class="date">2020.02.03</p>
                                        </div>
                                        <div class="button align-self-end mb-4">
                                            <button><i class='bx bxs-right-arrow-circle'></i></button>
                                        </div>
                                    </div>
                                    <!-- listing card -->
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