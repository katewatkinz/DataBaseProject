<!DOCTYPE html>
<?php    

    if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
       $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
       header('Location: ' . $url);     
    }
    
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
                        <h1>Mizzou Checkout</h1>                       
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>                                               
                        <form action = "<?=$_SERVER['PHP_SELF']?>" method = "POST">
                            <input class="btn btn-default" type = "submit" name = "display" value = "Show Transactions">
                        </form>                        
                    </div>                  
                </div>
                
                    <?php     

                    if(isset($_POST['display'])){              
        
                    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
                    $sql = "SELECT * FROM student_item_transaction";                      
                
                    $results = mysqli_query($link, $sql) or die ("Query Error: " . mysqli_error($link));               
                    
                    echo'<a href="/final/home.php" class="btn btn-default">Hide Transactions</a> ';

                    echo'<div class = "row">
                        <table class="table">
                        <thead>
                            <tr>';
                             
                                    while ($fetchfields=mysqli_fetch_field($results)){
                                        echo "<th>".$fetchfields->name."</th>";
                                    }
                                
                    echo'   </tr>
                        </thead>
                        <tbody>';
                        
                            while($rows = mysqli_fetch_assoc($results)){
                                echo '<tr>';
                                foreach($rows as $fields){
                                    echo '<td>'. $fields .'</td>';
                                }
                                echo '</tr>';
                            }                    
                          
                    echo'   </tbody>
                    </table>
                    </div>';

                    }
                    ?>

                               
                
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
