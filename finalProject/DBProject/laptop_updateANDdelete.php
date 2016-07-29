          
        <?php
                if(isset($_POST['delete'])) 
                {
                    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
                    $statement = mysqli_prepare($link, "DELETE FROM item WHERE item_id = ?")or die ("query Error " . mysqli_error($link));

                    mysqli_stmt_bind_param($statement, 'd', $_POST["item_id"])or die ("bind Error " . mysqli_error($link));
                    mysqli_stmt_execute($statement);
                    mysqli_close($link);
                    header("Location: success.php");
                }
                if(isset($_POST["submit"])) 
                {
                    //$IsOfficial = $_POST["IsOfficial"];
                    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));

                    $statement = mysqli_prepare($link, "UPDATE item SET name = ?, category = ?, item_condition = ?, location_id = ?, is_checked_out = ? WHERE item_id = ?") or die ("query Error " . mysqli_error($link));

                    mysqli_stmt_bind_param($statement, 'sssddd', htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["category"]), htmlspecialchars($_POST["item_condition"]), htmlspecialchars($_POST["location_id"]), htmlspecialchars($_POST["is_checked_out"]), $_POST["item_id"])or die ("bind Error " . mysqli_error($link));
                    mysqli_stmt_execute($statement);
                    mysqli_close(link);
                    header("Location: success.php");
                }
            ?>
           
        


            <?php

                   /* if($_POST['IsOfficial'] == 'T') 
                    {
                            $true= "checked";
                            $false = '';
                    } 
                    if($_POST['IsOfficial'] == 'F') 
                    {
                            $true = '';
                            $false = "checked";
                    }*/

                    echo '<form action = "laptop_updateANDdelete.php" method = POST>';
            
                   // echo '<h3>item_id:</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "item_id" value = "' . $_POST["item_id"] . '" readonly></br>';
            
                    echo '<h3>name:</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "name" value = "' . $_POST["name"] . '" ></br>';
            
                    //echo '<h3>IsOfficial:</h3>';
                    //echo "<input type = 'radio' name = 'IsOfficial' value = 'T' $true> True<br>" ;
                    //echo "<input type = 'radio' name = 'IsOfficial' value = 'F' $false> False<br>" ;
            
                    echo '<h3>category:</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "category" value = "' . $_POST["category"] . '"></br>';
                            
                    echo '<h3>condition:</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "item_condition" value = "' . $_POST["item_condition"] . '"></br>';
                            
                    echo '<h3>location:</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "location_id" value = "' . $_POST["location_id"] . '"></br>';
    
                    echo '<h3>checked out/in</h3>';
                    echo '<input type = "text" class="form-control" id="inputdefault" name = "is_checked_out" value = "' . $_POST["is_checked_out"] . '"></br>';
    
    
                    echo '<input class="btn btn-info" type="submit" name="submit" value="Save">';
                    echo '</form>';
    ?>