<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | HASH</title>
    <!-- css links -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ==================================== -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adminSideNav.css">
</head>

<body>
    <?php

    session_start();
    require "connection.php";

    if (isset($_SESSION["admin"])) {
    ?>
        <!-- ============= Page Content ============= -->
        <div class="wrapper d-flex align-items-stretch">
            <?php
            require "adminNav.php";
            ?>
            <div id="content" class="p-4 p-md-5 add-product">

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

                <div class="row">
                    <div class="col-12">
                        <h2 class="pg-title">Edit Products</h2>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8">
                        <p class="pg-description">The Most Important Feature Of The Product Editing Section Is The Product Adding Part. When Adding Product Here, Do Not Ignore
                            To Fill In All The Required Fields Completely And Follow All The Product Adding Rules.</p>
                    </div>
                </div>

                <!-- overview addproduct bar -->
                <div class="row">
                    <div class="col-12 overview-addproduct-bar">
                        <button><a href="addProduct.php" class="text-dark">Overview</a></button>
                        <button><a href="addProduct.php" class="text-dark">+ Add Product</a></button>
                        <button onclick="mngProductPg();">Manage Products</button>
                    </div>
                </div>
                <!-- overview addproduct bar -->

                <!-- overview -->
                <div class="row">
                    <!-- search bar -->
                    <div class="col-12 d-flex">
                        <div class="input-group search-bar">
                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bx-search-alt'></i></div>
                            <input type="text" class="search" placeholder="Search for ID, Brand, Category or Somthing..." aria-label="Search for ID, Brand, Category or Somthing..." aria-describedby="btnGroupAddon">
                        </div>
                    </div>
                </div>
                <!-- search bar -->

                <!-- manage Products -->

                <div class="row" id="mngproductPg">
                    <div class="col-12 products-list justify-content-center">
                        <div class="row no-gutters gy-0 justify-content-around">
                            <?php

                            $mngCount = Database::search("SELECT COUNT(id) AS count FROM product");
                            $mngProdCountRs = $mngCount->fetch_assoc();
                            $totalMngRows = $mngProdCountRs["count"];

                            $rowsPerPage = 6;

                            if (isset($_GET['mng'])) {
                                $mngPageNo = $_GET['mng'];
                            } else {
                                $mngPageNo = 1;
                            }

                            $start = ($mngPageNo - 1) * $rowsPerPage;

                            $mngProd =  Database::search("SELECT product.id, product.productName ,images.code,`status`.id AS statId FROM product INNER JOIN images ON product.id = images.product_id INNER JOIN `status` ON product.status_id = `status`.id WHERE images.img_no = 1 LIMIT {$start}, {$rowsPerPage}");
                            $mngProdNr = $mngProd->num_rows;

                            // for ($i = 0; $i < $mngProdNr; $i++) {
                            // $mngProdRs = $mngProd->fetch_assoc();
                            while ($mngProdRs = $mngProd->fetch_assoc()) {
                            ?>
                                <!-- card -->
                                <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                    <div class="product-img d-flex">
                                        <img src="<?php echo $mngProdRs['code']; ?>" alt="product-img">
                                    </div>
                                    <div class="product-details d-flex justify-content-between">
                                        <div class="product-name align-items-center d-flex">
                                            <?php echo $mngProdRs['productName']; ?>
                                        </div>
                                        <div class="edit pe-2">
                                            <div class="form-check form-switch justify-content-end d-flex" style="transform: scale(1.2);">
                                                <input class="form-check-input mb-3" type="checkbox" id="<flexSwitchCheckDefault<?php echo $mngProdRs["id"]; ?>" <?php if ($mngProdRs['statId'] == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?> onclick="changeStatus(<?php echo $mngProdRs['id']; ?>);">
                                                <br>
                                                <label class="form-check-label mt-4 text-end text-black-50" for="<?php echo $mngProdRs["id"]; ?>" id="switchlbl<?php echo $mngProdRs["id"]; ?>">
                                                <?php
                                                
                                                if($mngProdRs['statId'] == 1){
                                                    echo "Active";
                                                }else{
                                                    echo "Deactive";
                                                }

                                                ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row mt-5">
                            <div class="pagination d-flex justify-content-center">

                                <!-- previous page -->
                                <?php

                                if ($mngPageNo <= 1) {

                                ?>
                                    <a>&laquo;</a>
                                <?php
                                } else {
                                    $prevpg = $mngPageNo - 1;
                                ?>
                                    <a href="manageProduct.php?mng=<?php echo $prevpg; ?>">&laquo;</a>
                                <?php
                                }
                                ?>
                                <!-- first Page -->
                                <a href="manageProduct.php?mng=1">1st Page</a>

                                <!-- last page -->
                                <?php
                                $lastPage = ceil($totalMngRows / $rowsPerPage);
                                ?>
                                <a href="manageProduct.php?mng=<?php echo $lastPage; ?>">Last Page</a>

                                <!-- next page -->
                                <?php
                                if ($mngPageNo >= $lastPage) {

                                ?>
                                    <a>&raquo;</a>
                                <?php
                                } else {
                                    $nextpg = $mngPageNo + 1;
                                ?>
                                    <a href="manageProduct.php?mng=<?php echo $nextpg; ?>">&raquo;</a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- manage Products -->

            </div>
        </div>
        <!-- ============= Page Content ============= -->


        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/admin.js"></script>
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