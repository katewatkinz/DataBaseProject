<!DOCTYPE html>

<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission = $_SESSION['permission'];
?>
<html lang = "en">
    
        <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <title>insertion</title>

        </head>
<body>
    <?php echo 'Welcome, ' . $username . '! <a href = "/final/logout.php/">Logout</a>' ?>
            <form action = "insert.php" method = "POST" class="col-md-4 col-md-offset-4">
                    <div class= "row">
                         <div class = "input-group">
                        <div class = "form-group">
                            <label class="inputdefault">Item ID</label>
                            <input class="form-control" type="text" name="item_id" value=""><br>
                        </div>
                        <div class = "form-group">
                            <label class="inputdefault">Name</label>
                            <input class="form-control" type="text" name="name" value=""><br>
                        </div>
                             
                        <div class = "form-group">
                            <label class="inputdefault">Category</label>
                            <select name = "category">
                                <option value="none"></option>
                                <option value="bike">bike</option>
                                <option value="laptop">laptop</option>
                                <option value="macbook">macbook</option>
                            </select><br>
                        </div>
                             
                        <div class = "form-group">
                            <label class="inputdefault">Item Condition</label>
                            <select name = "item_condition">
                                <option value="none"></option>
                                <option value="good">good</option>
                                <option value="fair">fair</option>
                                <option value="bad">bad</option>
                            </select><br>
                        </div>
                             
                        <div class = "form-group">
                            <label class="inputdefault">Location</label>
                            <select name = "location_id">
                                <option value="none"></option>
                                <option value="0">Student Center</option>
                                <option value="1">Memorial Union</option>
                            </select><br>
                        </div>
                             
                        <div class = "form-group">
                            <label class="inputdefault">Checked Out</label>
                            <select name = "location_id">
                                <option value="none"></option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select><br>
                        </div>
                            
                        </div>
                        <br>
                        </div>
                        <br> 
                        
                        
    <?php                  


    if(isset($_POST['submit'])) 
                {      
                    
                    $connection = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($connection));
                    //query statement  
        
                    $statement = mysqli_prepare($connection, "INSERT INTO item(item_id, name, category, item_condition, location_id, is_checked_out) VALUES (NULL,?,?,?,?,?)")or die ("query Error " . mysqli_error($connection));
        
                    //prepared statements and binding, and SQL injection attack prevention 
        
                    mysqli_stmt_bind_param($statement, 'sssdd',
                    
                    htmlspecialchars($_POST['name']), htmlspecialchars($_POST['category']), htmlspecialchars($_POST['item_condition']), htmlspecialchars($_POST['location_id']), htmlspecialchars($_POST['is_checked_out']))or die ("bind Error " . mysqli_error($connection));
        
                    mysqli_stmt_execute($statement);
                    mysqli_close($connection);
                    header("Location: success.php");
                }

         
        

                    echo "<br><input type= 'submit' class='btn btn-info' name = 'submit' value = 'Submit'>";
                 
              
           
        ?>
     
    <a href="laptop_inventory_sc.php" class="btn btn-danger">Back to Inventory</a>
    </form>
</body>