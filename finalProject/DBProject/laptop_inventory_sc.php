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
    <meta name = "author" content="">

    <title>MU Division of IT</title>

    <!-- Bootstrap Core CSS -->
    <link href = "css/bootstrap.min.css" rel = "stylesheet">

    <!-- Custom CSS -->
    <link href = "css/simple-sidebar.css" rel = "stylesheet">
	
	<style>
		.barheaders
		{
			color: white;
		}
	</style>

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
        <div id = "page-content-wrapper">
            <?php echo 'Welcome, ' . $name . '! <a href = "/final/logout.php/">Logout</a>' ?>
            <div class = "container-fluid">
                <div class = "row">
                    <div class = "col-lg-12">
                        <h1>Mizzou Student Center Inventory</h1>                                             
                        <a href = "#menu-toggle" class = "btn btn-default" id = "menu-toggle">Toggle Menu</a>
						<a href = "/final/laptop_home_sc.php" class = "btn btn-default">Home</a>
						<a href = "/final/laptop_checkout_sc.php" class = "btn btn-default">Check Out</a>
						<a href = "/final/laptop_sc_checkin.php" class = "btn btn-default">Check In</a>
                        <a href = "/final/laptop_inventory_sc.php" class = "btn btn-default">Inventory</a>
                        <a href = "/final/insert.php" class = "btn btn-default">Insert</a>
                        <br>
                        <br>
                        
        <br>
        <br>
        <!--<div class="row2">
        <div>
            
            
        </div>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="">
            <select name="dropDown">
                    <option value = '1'>Student Center Inventory</option>
					
                    
            </select>
             
            
            
           
            
                
           
           
        <input type="submit" name="submit" value="Go"/>
        </form>-->
      
                        <form action="/final/laptop_inventory_sc.php" method="POST" class="col-md-4 col-md-offset-4">
                            <div class="row">
                                <input class='col-md-4' type="text" name="userinput">
                                <input class=""  type="submit" name="submit" value="Go"/>
                                <br>
                                <input checked="check" type="radio" name="radios" value=1>Student Center
                                <input checked="check" type="radio" name="radios" value=2>item ID
                                <input checked="check" type="radio" name="radios" value=3>Item Condition
                                <input checked="check" type="radio" name="radios" value=4>Name
                                <input checked="check" type="radio" name="radios" value=5>Check Out/In
                            </div>
                        </form>
                    </div>
                    
                    
            </div>
            
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src = "js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src = "js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) 
    {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    
   
        
    
    <?php
    
    
       /* if(isset($_POST['submit'])) 
        {
            $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
            $sql = '';

            switch($_POST['dropDown']) 
            {
                case 1: 
                    $sql = "SELECT * FROM item WHERE location_id = 1";
                    if($stmt = mysqli_prepare($link, "Select * FROM item WHERE location_id = 1"))
                    {
                        mysqli_stmt_bind_param($stmt, 'd', htmlspecialchars($location_id));
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $rfield);

                        call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                
                        $meta = $stmt->result_metadata(); 
                        while ($field = $meta->fetch_field()){ 
                            $params[] = &$row[$field->name]; 
                        } 

                            call_user_func_array(array($stmt, 'bind_result'), $params); 
                            while($rows = mysqli_fetch_assoc($results)) 
                            {
                                echo '<tr>';
                                foreach($rows as $fields) 
                                {
                                    echo '<td>'. $fields .'</td>';
                                }
                                echo '</tr>';
                            }
            
                        while ($stmt->fetch()){ 
                            foreach($row as $key => $val) 
                            { 
                                $c[$key] = $val; 
                            } 
           
                            $result[] = $c; 
                    } 
             
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';

                     echo '<table class="table table-hover">';
                            echo '<tr>';
                            echo '<th></th>';
                            echo '<th></th>';
                    
                                foreach($array AS $col)
                                {
                                    echo '<th>'.$col.'</th>'; 
                                }
                            echo '</tr>';  
                    $i = 0;
                    $rowcount = 0;    

                      
                    foreach($result AS $row)
                    {
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        
                        
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

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
                    }
                    break;
                         
            
                $results = mysqli_query($link, $sql) or die ("Query Error: " . mysqli_error($link));
        
                ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <?php
                                    
                                    while ($fetchfields=mysqli_fetch_field($results)) 
                                    {
                                        echo "<th>".$fetchfields->name."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($rows = mysqli_fetch_assoc($results)) 
                            {
                                echo '<tr>';
                                foreach($rows as $fields) 
                                {
                                    echo '<td>'. $fields .'</td>';
                                }
                                echo '</tr>';
                            }
            
            
                    }
             break;
        }*/
        ?>
                            
        
         <?php                   
                            
            $conn = mysqli_connect("localhost", "root", "", "inventory") or die(mysqli_error($conn));

            if(isset($_POST['userinput']))
            {
                $choice = $_POST['radios'];
                $searchq = $_POST['userinput'].'%';

                switch($choice)
                {
                case 1:
                if($stmt = mysqli_prepare($conn, "SELECT * FROM item WHERE location_id = 1"))
                {

                    mysqli_stmt_bind_param($stmt, 'd', htmlspecialchars($searchq));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);
                    call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                    $meta = $stmt->result_metadata();
                    while ($field = $meta->fetch_field()){                        
                        $params[] = &$row[$field->name];
                    }
                    
                    call_user_func_array(array($stmt, 'bind_result'), $params);

                    while ($stmt->fetch()){
                        foreach($row as $key => $val){                            
                            $c[$key] = $val;
                        }
                        $result[] = $c;
                    }

     
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th></th>';
                    echo '<th></th>';

                    foreach($array AS $col){
                        echo '<th>' . $col . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                    $i = 0;
                   
                    foreach($result AS $row){
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell){
                            echo '<td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }
                        echo '</tr>';                        
                        $i=0;
                        echo '</form>';
                    }
                    echo '</table>';
                }
            break;

            case 2:

                if($stmt = mysqli_prepare($conn, "SELECT * FROM item WHERE item_id LIKE ? AND location_id = 1 ORDER BY name ASC")){
                
                    mysqli_stmt_bind_param($stmt, 'd', htmlspecialchars($searchq));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);
                    call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                    $meta = $stmt->result_metadata();
                    while ($field = $meta->fetch_field()){
                        $params[] = &$row[$field->name];
                    }

                    call_user_func_array(array($stmt, 'bind_result'), $params);

                    while ($stmt->fetch()){
                        foreach($row as $key => $val){
                            $c[$key] = $val;
                        }
                        $result[] = $c;
                    }

                    
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th></th>';
                    echo '<th></th>';

                    foreach($array AS $col){
                        echo '<th>' . $col . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                    $i=0;

                    foreach($result AS $row){
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell){
                            echo '<td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }

                        echo '</tr>';                        
                        $i=0;
                        echo '</form>';
                    }
                    echo '</table>';
                }
            break;

            case 3:

                if($stmt = mysqli_prepare($conn, "SELECT * FROM item WHERE item_condition LIKE ? AND location_id = 1 ORDER BY name ASC")){

                    mysqli_stmt_bind_param($stmt, 's', htmlspecialchars($searchq));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);

                    call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                    $meta = $stmt->result_metadata();
                    while ($field = $meta->fetch_field()){
                        $params[] = &$row[$field->name];
                    }

                    call_user_func_array(array($stmt, 'bind_result'), $params);

                    while ($stmt->fetch()){
                        foreach($row as $key => $val){
                            $c[$key] = $val;
                        }
                        $result[] = $c;
                    }

                    
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th></th>';
                    echo '<th></th>';

                    foreach($array AS $col){
                        echo '<th>' . $col . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';

                    $i = 0;
                    foreach($result AS $row){
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell){
                            echo '  <td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }

                        echo '</tr>';                        
                        $i=0;
                        echo '</form>';
                    }
                    echo '</table>';
                }
            break;
            case 4:

                if($stmt = mysqli_prepare($conn, "SELECT * FROM item WHERE name LIKE ? AND location_id = 1 ORDER BY name ASC")){

                    mysqli_stmt_bind_param($stmt, 's', htmlspecialchars($searchq));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);

                    call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                    $meta = $stmt->result_metadata();
                    while ($field = $meta->fetch_field()){
                        $params[] = &$row[$field->name];
                    }

                    call_user_func_array(array($stmt, 'bind_result'), $params);

                    while ($stmt->fetch()){
                        foreach($row as $key => $val){
                            $c[$key] = $val;
                        }
                        $result[] = $c;
                    }

                    
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th></th>';
                    echo '<th></th>';

                    foreach($array AS $col){
                        echo '<th>' . $col . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';

                    $i = 0;
                    foreach($result AS $row){
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell){
                            echo '  <td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }

                        echo '</tr>';                        
                        $i=0;
                        echo '</form>';
                    }
                    echo '</table>';
                }
            break;  
                        
            case 5:

                if($stmt = mysqli_prepare($conn, "SELECT * FROM item WHERE is_checked_out LIKE ? AND location_id = 1 ORDER BY name ASC")){

                    mysqli_stmt_bind_param($stmt, 's', htmlspecialchars($searchq));
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $rfield);

                    call_user_func_array(array($mysqli_stmt_object, "bind_result"), $byref_array_for_fields);

                    $meta = $stmt->result_metadata();
                    while ($field = $meta->fetch_field()){
                        $params[] = &$row[$field->name];
                    }

                    call_user_func_array(array($stmt, 'bind_result'), $params);

                    while ($stmt->fetch()){
                        foreach($row as $key => $val){
                            $c[$key] = $val;
                        }
                        $result[] = $c;
                    }

                    
                    $array= array("item_id", "name", "category", "item_condition", "locaiton_id", "is_checked_out");

                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th></th>';
                    echo '<th></th>';

                    foreach($array AS $col){
                        echo '<th>' . $col . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';

                    $i = 0;
                    foreach($result AS $row){
                        echo '<form action = "laptop_updateANDdelete.php" method = "POST">';
                        echo '<tr>';
                        echo '<td><button type="submit" class="btn btn-info" name = "edit">Update</button></td>';
                        echo '<td><button type="submit" class="btn btn-danger" name = "delete">Delete</button></td>';

                        foreach($row AS $cell){
                            echo '  <td>' . $cell . '</td>';
                            echo "<input type = 'hidden' name = $array[$i] value = $cell>";
                            $i++;
                        }

                        echo '</tr>';                        
                        $i=0;
                        echo '</form>';
                    }
                    echo '</table>';
                }
            break;            
                        
        }
    }
    mysqli_close($conn);
?>		                    
                            
                            
                            
                            
                            
    
    
            
                        
            </tbody>
            </table>
            
            </div>
            
            </div>
        <!-- /#page-content-wrapper -->
            
    </div>
     
        
        
        
    </div>
    
    
    
    
    
    
    
</body>

</html>
