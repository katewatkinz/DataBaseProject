 <?php
         $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));  

        if(isset($_POST['delete'])) {
                $stmt = mysqli_prepare($link, "DELETE FROM item WHERE item_id = ? LIMIT 1")or die ("query Error " . mysqli_error($link));
                mysqli_stmt_bind_param($stmt, 'd', $_POST["item_id"])or die ("bind Error " . mysqli_error($link));
                mysqli_stmt_execute($stmt);
                mysqli_close(link);
                //echo '<script type="text/javascript">alert("Item Successfully Deleted!");</script>';
                header("Location: bike_inventory.php");
        } 
?>

<html>
        <head>
                <title>Edit Bike</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        </head>
        <body>
                <div class = "container">
                <div align = "center">
                <a href="bike_inventory.php" class="btn btn-danger">Back to Inventory</a>
                </div>
            </div>
        </body>
</html>

<?php

        echo '<form action = "bike_edit.php" method = POST>';

        echo '<h5><em><strong>Item ID:</h5></em></strong>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "item_id" value = "' . $_POST["item_id"] . '" readonly></br>';

        echo '<h5><em><strong>Name:</h5></strong></em>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "name" value = "' . $_POST["name"] . '" readonly></br>';

        echo '<h5><em><strong>Category:</h5></strong></em>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "category" value = "' . $_POST["category"] . '" readonly></br>';

        echo '<h5><em><strong>Item Condition:</h5></strong></em>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "item_condition" value = "' . $_POST["item_condition"] . '"></br>';

        echo '<h5><em><strong>Location:</h5></strong></em>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "location_id" value = "' . $_POST["location_id"] . '"readonly></br>';

        echo '<h5><em><strong>Checked Out:</h5></strong></em>';
        echo '<input type = "text" class="form-control" id="inputdefault" name = "is_checked_out" value = "' . $_POST["is_checked_out"] . '" readonly></br>';
        
        echo '<input type = "submit" name = "submit" value = "Submit">';
        echo '</form>';

        /*if(isset($_POST["submit"])){
        
        $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
                $stmt = mysqli_prepare($link, "UPDATE item SET item_condition = ? WHERE item_id = ?")or die ("query Error " . mysqli_error($link));
                
                mysqli_stmt_bind_param($stmt, 'si', 
                htmlspecialchars($_POST["item_condition"]), 
                htmlspecialchars($_POST["item_id"]))or die ("bind Error " . mysqli_error($link));
                mysqli_stmt_execute($stmt);
                mysqli_close(link);
                echo '<script type="text/javascript">alert("Item Condition Successfully Updated!");</script>';

        }*/

         if(isset($_POST["submit"])) 
                {
                    //$IsOfficial = $_POST["IsOfficial"];
                    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));

                    $statement = mysqli_prepare($link, "UPDATE item SET name = ?, category = ?, item_condition = ?, location_id = ?, is_checked_out = ? WHERE item_id = ?") or die ("query Error " . mysqli_error($link));

                    mysqli_stmt_bind_param($statement, 'sssddd', htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["category"]), htmlspecialchars($_POST["item_condition"]), htmlspecialchars($_POST["location_id"]), htmlspecialchars($_POST["is_checked_out"]), $_POST["item_id"])or die ("bind Error " . mysqli_error($link));
                    mysqli_stmt_execute($statement);
                    mysqli_close(link);
                    //header("Location: success.php");
                    echo '<script type="text/javascript">alert("Item Condition Successfully Updated!");</script>';
                }
            
?>