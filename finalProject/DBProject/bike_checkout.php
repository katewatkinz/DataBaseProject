<!DOCTYPE html>
<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission = $_SESSION['permission'];
    $name = $_SESSION['name'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MU Division of IT</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

     <style>

     .barheaders{
            color: white;
        }

    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>                    
                    <h3 class = "barheaders">Menu</h3>                    
                </li>
                <li>
                    <a href="/final/home.php">Home</a>
                </li>
                <li>
                    <a href="/final/bike_home.php">Bike Checkout</a>
                </li>
                <li>
                    <a href="/final/laptop_home_mu.php">Laptop Checkout-Memorial Union</a>
                </li>
                <li>
                    <a href="/final/laptop_home_sc.php">Laptop Checkout-Student Center</a>
                </li>
                <li>
                    <a href="/final/about.php">About</a>
                </li>
            <?php if($permission == 1){
                echo'
                <li>
                    <h3 class = "barheaders">Admin Portal</h3>
                </li>
                <li>
                    <a href = "/final/register_employee.php">Employee Registration</a>
                </li>
                <li>
                    <a href = "/final/locations.php">Locations</a>
                </li>
                ';
            }?>                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php echo 'Welcome, ' . $name . '! <a href = "/final/logout.php/">Logout</a>' ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Mizzou Bike Check Out</h1>                       
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                    
                    <div class="col-lg-12" align = "center">                       
                        <a href="bike_home.php" class="btn btn-default" id="home">Home</a>
                        <a href="bike_checkout.php" class="btn btn-default" id="bike-checkout">Check Out</a>
                        <a href="bike_checkin.php" class="btn btn-default" id="bike-checkin">Check In</a>
                        <a href="bike_inventory.php" class="btn btn-default" id="inventory">Inventory</a>
                    </div>
                </div>
                
                <div align = "center">
                    <form action = "insert_bike.php" method = "POST">
                        <h5><em><strong>Barcode:</strong></h5></em>
                        <input type = "text" name = "item_id" value = ""><br>
                        
                        <h5><em><strong>Student ID:</strong></h5></em>
                        <input type = "text" name = "student_id" value = ""><br>
                        
                        <h5><em><strong>Employee ID:</strong></h5></em>
                        <input type = "text" name = "emp_id" value = ""><br>
                        
                        <h5><em><strong>Transaction Type:</strong></h5></em>
                        <select name = "transaction_type">
                            <option value="check_out">Check Out</option>
                        </select><br>
                        
                        <h5><em><strong>Location:</strong></h5></em>
                        <select name = "location_id">
                            <option value="1">Student Center</option>
                        </select><br><br>
                        
                        <input type = 'submit' class='btn btn-info' name = 'submit' value ='Submit'><br>
                
                    </form>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
