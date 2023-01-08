<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | HASH</title>
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
                        <button>Overview</button>
                        <button>+ Add Product</button>
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
                <!-- products list -->
                <div class="row d-none">
                    <div class="col-12 products-list justify-content-center">
                        <div class="row no-gutters gy-0 justify-content-around">
                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                            <!-- card -->
                            <div class="col-11 col-md-5 col-lg-4 col-xl-3 card-body d-block">
                                <div class="product-img d-flex">
                                    <img src="../img/jacket.png" alt="product-img">
                                </div>
                                <div class="product-details d-flex justify-content-around">
                                    <div class="product-name align-items-center d-flex">
                                        Nike Sportswear Tech Fleece
                                    </div>
                                    <div class="edit align-items-center d-flex">
                                        <button><i class='bx bxs-edit'></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                        </div>
                        <div class="row mt-5">
                            <div class="pagination d-flex justify-content-center">
                                <a href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- products list -->
                <!-- overview -->

                <!-- Add product Form -->
                <div class="row mt-3">
                    <!-- product details box -->
                    <div class="col-12 col-lg-6 add-product">
                        <div class="row my-3">
                            <div class="col-12 d-block prod-details">
                                <label class=" text-black-50 fw-bold d-block" for="prodName">Product Name</label>
                                <input class="d-block w-100 prod-name" type="text" id="prodName">
                                <span>Do not Exceed 20 characters when entering the product name</span>
                            </div>
                        </div>
                        <div class="row my-3 justify-content-between">
                            <div class="col-8 category">
                                <label class=" text-black-50 fw-bold d-block" for="category">Category</label>
                                <select name="category" id="category" class="w-100">
                                    <option value="0">Trousers</option>
                                    <option>Sneakers</option>
                                    <option>Sweaters</option>
                                </select>
                            </div>
                            <div class="col-4 type">
                                <label class=" text-black-50 fw-bold d-block" for="type">Type</label>
                                <select name="type" id="type" class="w-100">
                                    <option value="0">Men</option>
                                    <option>Woman</option>
                                    <option>Kids</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 brand">
                                <label class="text-black-50 fw-bold d-block" for="brand">Brand</label>
                                <select name="type" id="brand" class="w-100">
                                    <option value="0">Nike</option>
                                    <option>Adidas</option>
                                    <option>Rebok</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 description">
                                <label class=" text-black-50 fw-bold d-block" for="prodDescription">Description</label>
                                <textarea name="description" id="prodDescription" rows="10"></textarea>
                                <span>Do not Exceed 100 words when entering the product Description</span>
                            </div>
                        </div>
                    </div>
                    <!-- product details box -->
                    <!-- product image box -->
                    <div class="col-12 col-lg-6">
                        <div class="row my-3 justify-content-between">
                            <div class="col-12 prod-image">
                                <label class="text-black-50 fw-bold d-block" for="type">Product Images</label>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6 my-2 prod-image-bx prod-img-1">
                                        <img src="../img/shoe.png" alt="prodImg">
                                    </div>
                                    <div class="col-12 col-lg-6 my-2 prod-image-bx prod-img-2 text-center">
                                        <div class="add-img-text">
                                            <i class='bx bx-image'></i>
                                            <p>Drop your image here, or</p>
                                            <p>Select <a href="#">Click here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row d-flex gx-1">
                                    <div class="col my-2 prod-img-3 text-center">
                                        <div class="add-img-text">
                                            <i class='bx bx-image'></i>
                                            <p>Drop your image here, or</p>
                                            <p>Select <a href="#">Click here</a></p>
                                        </div>
                                    </div>
                                    <div class="col my-2 prod-img-4 text-center">
                                        <div class="add-img-text">
                                            <i class='bx bx-image'></i>
                                            <p>Drop your image here, or</p>
                                            <p>Select <a href="#">Click here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-img-specs">
                            <div class="col-12 my-2">
                                <p>You need to add at least 4 images. Pay attention to the quality of the pictures you add. Comply the Background Color standards. Picture must be in certain dimensions. note that the product shows all the details.</p>
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="size">Size</label>
                                <select name="category" id="size" class="w-100">
                                    <option value="0">Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="col-12 my-2 col-md-6">
                                <label class=" text-black-50 fw-bold d-block" for="size">Size</label>
                                <input type="date" name="date" id="date">
                            </div>
                            <div class="col-12 my-2">
                                <button class="w-100">Add Product</button>
                            </div>
                        </div>
                    </div>
                    <!-- product image box -->

                </div>
                <!-- Add product Form -->

            </div>
        </div>
        <!-- ============= Page Content ============= -->


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