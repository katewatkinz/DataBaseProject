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

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Menu
                    </a>
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
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Mizzou Catalog</h1>                       
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                  
                    <div class="col-lg-12" align ="center">                       
                        <a href="bike_home.php" class="btn btn-default" id="bike-checkout">Home</a>
                        <a href="bike_checkout.php" class="btn btn-default" id="bike-checkout">Check Out</a>
                        <a href="bike_checkin.php" class="btn btn-default" id="bike-checkin">Check In</a>
                        <a href="inventory.php" class="btn btn-default" id="bike-checkin">Inventory</a>
                    </div>
                    
                    <div align = "center" class = "col-lg-12"> <!-- container -->
                    <h5><em><strong>TEST</strong></h5></em>    <!-- <div align = "center"> -->
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-md-4 col-md-offset-5">
                        
                        <select align = "center" name="dropDown">
                            <option value='1'>Inventory</option>
                            <option value='2'>Bikes</option>
                            <option value='3'>SC Laptops</option>
                            <option value='4'>MU Laptops</option>
                    
                        </select>
                        <input type="submit" name="submit" value="Go"/>
                    </form><br>

                        <a href="insert.php" class="btn btn-primary">Insert into Inventory</a> <!-- btn-info-->
                    </div>
                
                    <?php

    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
       
    if(isset($_POST['submit']))
    {
           
        $choice = $_POST['dropDown'];
        switch($choice) 
        { 
            case 1:

                if($stmt = mysqli_prepare($link, "Select * FROM item")) 
                {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);

                        call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                
                        $meta = $stmt->result_metadata(); 
                        while ($field = $meta->fetch_field()) 
                        { 
                            $params[] = &$row[$field->name]; 
                        } 

                  
                        call_user_func_array(array($stmt, 'bind_result'), $params); 


                    while ($stmt->fetch()) { 
                            foreach($row as $key => $val) 
                            { 
                                $c[$key] = $val; 
                            } 
           
                            $result[] = $c; 
                    } 
             
                    $array= array("item_id", "name", "category", "item_condition", "location_id", "is_checked_out");

                    echo '<table class="table table-hover" align="center">';

                     echo '<table class="table table-hover" align="center">';
                            //echo '<tr>';
                            //echo '<th></th>';
                            //echo '<th></th>';
                                foreach($array AS $col)
                                {
                                    echo '<th>'.$col.'</th>'; 
                                }
                            echo '</tr>';  
                    $i = 0;
                    $rowcount = 0;    


                    foreach($result AS $row)
                    {
                        //echo '<form action = "editcity.php" method = "POST">';
                        echo '<tr>';
                        //echo '<td><button type="submit" class="btn btn-info" name = "edit">Edit</button></td>';
                        //echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell)
                        {
                            echo '<td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }
                        echo '</tr>';
                        $rowcount++;
                        $i=0;
                       echo '</form>';
                    }
                    
                    echo '<h4>Total number of rows: ' . $rowcount . '</h4>';
                    echo '</table>';
                }
            break;

            
        }
    }
    mysqli_close(link);
?>
                    
                    
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




