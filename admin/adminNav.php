<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

    <nav id="sidebar" class="active">
        <h1><a href="index.html" class="adminlogo">#</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="adminDashboard.php"><span class='bx bxs-dashboard'></span> Home</a>
            </li>
            <li>
                <a href="adminUserProfile.php"><span class="fa fa-user"></span> Profile</a>
            </li>
            <li>
                <a href="addProduct.php"><span class='bx bxs-t-shirt' ></span> Products</a>
            </li>
            <li>
                <a href="#"><span class='bx bxs-message-dots' ></span> Messages</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
            </li>
        </ul>

        <div class="footer">
            <p>
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> <br> Hashan Lakruwan <br>All rights reserved.
            </p>
        </div>
    </nav>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin.js"></script>

</body>

</html>