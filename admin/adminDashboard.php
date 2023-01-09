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
                                        <?php
                                        $usrCountRs = Database::search("SELECT COUNT(id) AS `count` FROM user WHERE user_type_id != 2");
                                        $count = $usrCountRs->fetch_assoc();
                                        ?>
                                        <div class="card-count">
                                            <?php echo $count["count"]; ?>
                                        </div>
                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- users -->
                                    <!-- Products -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Products
                                        </div>
                                        <?php
                                        $prodCountRs = Database::search("SELECT COUNT(id) AS `count` FROM product");
                                        $pCount = $prodCountRs->fetch_assoc();
                                        ?>
                                        <div class="card-count">
                                            <?php echo $pCount["count"]; ?>
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Products -->
                                    <!-- Available Products -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Available Products
                                        </div>
                                        <?php
                                        $prodAvlCountRs = Database::search("SELECT COUNT(id) AS `count` FROM product WHERE status_id =1");
                                        $pAvlCount = $prodAvlCountRs->fetch_assoc();
                                        ?>
                                        <div class="card-count">
                                            <?php echo $pAvlCount["count"]; ?>
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Available Products -->
                                    <!-- Out of Stock -->
                                    <div class="col-12 col-md-5 col-lg-12 statistics-card">
                                        <div class="card-title">
                                            Out of Stock
                                        </div>
                                        <?php
                                        $prodOutCountRs = Database::search("SELECT COUNT(id) AS `count` FROM product WHERE status_id !=1");
                                        $pOutCount = $prodOutCountRs->fetch_assoc();
                                        ?>
                                        <div class="card-count">
                                            <?php echo $pOutCount["count"]; ?>
                                        </div>

                                        <div class="show-more mb-2">
                                            <button>Show more</button>
                                        </div>
                                    </div>
                                    <!-- Out of Stock -->
                                    <!-- statistics card -->
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <!--=================-->
                                <!--recent users-->
                                <div class="col-12 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Recent Users</div>
                                        <!-- <div class="count d-inline">1025</div> -->
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
                                            <?php
                                            $recentUsers = Database::search("SELECT * FROM user WHERE user_type_id != 2 ORDER BY id DESC LIMIT 3");
                                            $ruNr = $recentUsers->num_rows;

                                            for ($i = 0; $i < $ruNr; $i++) {
                                                $ruRs = $recentUsers->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $ruRs["id"]; ?></th>
                                                    <td><?php echo $ruRs["first_name"]; ?></td>
                                                    <td><?php echo $ruRs["last_name"]; ?></td>
                                                    <td><?php echo $ruRs["email"]; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="show-more mb-2">
                                        <button>Show more</button>
                                    </div>
                                </div>
                                <!--recent users-->

                                <!--Brands-->
                                <div class="col-12 mt-3 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Latest Brands</div>
                                        <!-- <div class="count d-inline">1025</div> -->
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Brand Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $brands = Database::search("SELECT * FROM brand ORDER BY id DESC LIMIT 3");
                                            $brandNr = $brands->num_rows;

                                            for ($i = 0; $i < $brandNr; $i++) {
                                                $brandRs = $brands->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $brandRs["id"]; ?></th>
                                                    <td><?php echo $brandRs["name"]; ?></td>
                                                </tr>
                                            <?php
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="show-more mb-2">
                                        <button>Show more</button>
                                    </div>
                                </div>
                                <!--Brands-->
                                <!--Invoices-->
                                <div class="col-12 mt-3 table-wrapper">
                                    <div class="my-2">
                                        <div class="title d-inline">Invoices</div>
                                        <!-- <div class="count d-inline">1025</div> -->
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $order = Database::search("SELECT invoice.id,invoice.order_id,invoice.user_id,invoice.total,user.first_name,user.last_name FROM invoice INNER JOIN user ON invoice.user_id = user.id ORDER BY id LIMIT 3");
                                            $orderNr = $order->num_rows;
                                            for ($i = 0; $i < $orderNr; $i++) {
                                                $orderRs = $order->fetch_assoc();
                                            ?>

                                                <tr>
                                                    <th scope="row"><?php echo $orderRs["id"]; ?></th>
                                                    <td><?php echo $orderRs["order_id"]; ?></td>
                                                    <td><?php echo $orderRs["first_name"] . " " . $orderRs["last_name"]; ?></td>
                                                    <td><?php echo $orderRs["total"]; ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
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
                                        <button onclick="manageRecentlistingpg();">Manage</button>
                                    </div>
                                    <!-- listing card -->
                                    <!-- <div class="col-12 listing-card">
                                        <div class="image">
                                            <img src="../img/backpack.png" alt="">
                                        </div>
                                        <div></div>
                                    </div> -->
                                    <!-- listing card -->
                                    <?php
                                    $product = Database::search("SELECT product.id,product.productName,product.date_added,images.code, images.img_no FROM product INNER JOIN images ON product.id = images.product_id WHERE images.img_no = 1 ORDER BY id DESC LIMIT 5");
                                    $prodN = $product->num_rows;
                                    for ($i = 0; $i < $prodN; $i++) {
                                        $prodRs = $product->fetch_assoc();
                                    ?>
                                        <!-- listing card -->
                                        <div class="col-12 col-md-5 col-lg-12 my-3 listing-card">
                                            <div id="<?php echo $prodRs["id"]; ?>" class="image carousel slide" data-bs-ride="carousel">
                                                <?php
                                                $img1 = Database::search("SELECT images.id,images.code,images.img_no, product.id FROM product JOIN images ON product.id = images.product_id WHERE images.img_no = 1 AND  product.id = '" . $prodRs["id"] . "'");
                                                $img2 = Database::search("SELECT images.id,images.code,images.img_no, product.id FROM product JOIN images ON product.id = images.product_id WHERE images.img_no = 2 AND  product.id = '" . $prodRs["id"] . "'");
                                                $img3 = Database::search("SELECT images.id,images.code,images.img_no, product.id FROM product JOIN images ON product.id = images.product_id WHERE images.img_no = 3 AND  product.id = '" . $prodRs["id"] . "'");
                                                $img4 = Database::search("SELECT images.id,images.code,images.img_no, product.id FROM product JOIN images ON product.id = images.product_id WHERE images.img_no = 4 AND  product.id = '" . $prodRs["id"] . "'");

                                                $img1Rs = $img1->fetch_assoc();
                                                $img2Rs = $img2->fetch_assoc();
                                                $img3Rs = $img3->fetch_assoc();
                                                $img4Rs = $img4->fetch_assoc();
                                                ?>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" data-bs-interval="10000">
                                                        <img src="<?php echo $img1Rs["code"]; ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item" data-bs-interval="2000">
                                                        <img src="<?php echo $img2Rs["code"]; ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?php echo $img3Rs["code"]; ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?php echo $img4Rs["code"]; ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $prodRs["id"]; ?>" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $prodRs["id"]; ?>" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="listing-details">
                                                <p class="product-name"><?php echo $prodRs["productName"]; ?></p>
                                                <p class="sizes">Sizes</p>
                                                <p><span>S</span>
                                                    <span>M</span>
                                                    <span>L</span>
                                                    <span>XL</span>
                                                </p>
                                                <p class="date-listed">Date Listed</p>
                                                <p class="date"><?php echo $prodRs["date_added"]; ?></p>
                                            </div>
                                            <div class="button align-self-end mb-4">
                                                <button><i class='bx bxs-right-arrow-circle'></i></button>
                                            </div>
                                        </div>
                                        <!-- listing card -->
                                    <?php
                                    }
                                    ?>
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