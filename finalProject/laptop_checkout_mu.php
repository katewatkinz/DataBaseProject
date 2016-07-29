<!DOCTYPE html>

<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission = $_SESSION['permission'];
    $name = $_SESSION['name'];
?>

<html lang = "en">

<head>

    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <title>MU Division of IT</title>

    <!-- Bootstrap Core CSS -->
    <link href = "css/bootstrap.min.css" rel = "stylesheet">

    <!-- Custom CSS -->
    <link href = "css/simple-sidebar.css" rel = "stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id = "wrapper">

        <!-- Sidebar -->
        <div id = "sidebar-wrapper">
            <ul class = "sidebar-nav">
                <li class = "sidebar-brand">
                    <a href = "#">
                        Menu
                    </a>
                </li>
                <li>
                    <a href = "/final/home.php">Home</a>
                </li>
                <li>
                    <a href = "/final/bike_home.php">Bike Checkout</a>
                </li>
                <li>
                    <a href = "/final/laptop_home_mu.php">Laptop Checkout-Memorial Union</a>
                </li>
                <li>
                    <a href = "/final/laptop_home_sc.php">Laptop Checkout-Student Center</a>
                </li>
                <li>
                    <a href = "/final/about.php">About</a>
                </li>                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id = "page-content-wrapper">
            <div class = "container-fluid">
                <div class = "row">
                    <div class = "col-lg-12">
                        <h1>Mizzou Memorial Union Check Out</h1>                                            
                        <a href = "#menu-toggle" class = "btn btn-default" id = "menu-toggle">Toggle Menu</a>
						<a href = "/final/home.php" class = "btn btn-default">Home</a>
						<a href = "/final/laptop_checkout_mu.php" class = "btn btn-default">Check Out</a>
						<a href = "/final/laptop_checkin_mu.php" class = "btn btn-default">Check In</a>
						<a href = "/final/laptop_inventory_mu.php" class = "btn btn-default">Inventory</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src = "js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src = "js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
