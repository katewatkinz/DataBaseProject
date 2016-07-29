<!DOCTYPE html>
<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission = $_SESSION['permission'];
    $name = $_SESSION['name'];

    if(isset($_POST['submit'])){
        $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
        $sql = "INSERT INTO location(name) VALUES (?)"; 

        if($stmt = mysqli_prepare($link, $sql)){
            $locname = $_POST['locname'];
            mysqli_stmt_bind_param($stmt, 's', htmlspecialchars($locname));
            if(mysqli_stmt_execute($stmt)) {
                echo "<h4>Success</h4>";
            }else{
                echo "<h4>Failed</h4>";
            }                       
        }else{
            die("prepare failed");
        }

    }    

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

        .pagelinks{
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #portalrow{
            margin-top: 25px;            
        }

        #adminportal{
            padding-bottom: 20px;
            border: 2px solid black;
            background-color: #F8F8F8; 
            text-align: center;
            border-radius: 5px;  

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
                        <h1>Locations</h1>                       
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>                        
                    </div>
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                        <div class="row form-group">
                                <input class='form-control' type="text" name="locname" placeholder="Location">
                                <input class=" btn btn-info" type="submit" name="submit" value="Add Location"/>
                        </div>
                    </form>                
                </div>
                <div class = "row">
                <?php                   
        
                    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
                    $sql = "SELECT * FROM location";                      
                
                    $results = mysqli_query($link, $sql) or die ("Query Error: " . mysqli_error($link));               
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <?php
                                    while ($fetchfields=mysqli_fetch_field($results)){
                                        echo "<th>".$fetchfields->name."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($rows = mysqli_fetch_assoc($results)){
                                echo '<tr>';
                                foreach($rows as $fields){
                                    echo '<td>'. $fields .'</td>';
                                }
                                echo '</tr>';
                            }                    
                        ?>   
                        </tbody>
                    </table>
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
