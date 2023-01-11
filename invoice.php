<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php

    // require "connection.php";
    require "navbar.php";

    if (isset($_SESSION["userEmail"])) {

    ?>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12  my-3 text-end">
                    <button onclick="printInvoice();" class="btn btn-danger"><i class='bx bxs-printer'></i>&nbsp;&nbsp;Print Invoice</button>
                </div>
                <hr>
                <div class="col-12" id="page">
                    <div class="row">
                        <div class="col-9">
                            <h2>Invoice</h2>
                        </div>
                        <div class="col-3" style="height: 100px; background-image: url(img/Asset\ 7.png);background-position: center; background-size: contain; background-repeat: no-repeat;"></div>
                        <div class="col-12">
                            <p>HASH Fabrics and Clothing (pvt) ltd.<br># 483,<br>Ja Ela,<br>Sri Lanka</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h2>Invoice To:</h2>
                            <p>Hashan Lakruwan</p>
                            <p>hashan.lakruwan22@gmail.com</p>
                        </div>
                        <div class="col-6 text-end">
                            <h2>#Invoice</h2>
                            <h5>Issued Date and Time</h5>
                            <p>2023.03.11</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col" class="bg-secondary text-white">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h1>Grand Total</h1>
                        </div>
                        <div class="col-6 text-end">
                            <h1>1000.00</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 text-center fst-italic">
                            <h4>Thank You!</h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    <?php
        require "footer.php";
    } else {
    ?>
        <script>
            alert("Please Sign in or sign up to access this page");
            window.location = "index.php";
        </script>

    <?php
    }

    ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>