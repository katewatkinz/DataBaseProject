<?php 
    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
        if(isset($_POST['submit'])) 
        {				
        				if($_POST['transaction_type'] == 'check_out')
                        {
        					$val = 'yes';
        				}
        				else
        					$val = 'no';
                        
                        $stmt = mysqli_prepare($link, "INSERT INTO student_item_transaction(transaction_type, student_id, location_id, emp_id, item_id) VALUES (?, ?, ?, ?, ?)")or die ("query Error " . mysqli_error($link));
                        
                        mysqli_stmt_bind_param($stmt, 'sdddd', htmlspecialchars($_POST['transaction_type']), htmlspecialchars($_POST['student_id']), htmlspecialchars($_POST['location_id']), htmlspecialchars($_POST['emp_id']), htmlspecialchars($_POST['item_id'])) or die ("bind Error " . mysqli_error($link));
                        
                    
                        mysqli_stmt_execute($stmt);

                        $stmt = mysqli_prepare($link, "UPDATE item SET is_checked_out = ? WHERE item_id = ?") or die("query error: " . mysqli_error($link));
                        mysqli_stmt_bind_param($stmt, 'sd',  $val, htmlspecialchars($_POST['item_id']));
                        mysqli_stmt_execute($stmt);
            
                        
                        $stmt = mysqli_prepare($link, "INSERT INTO student_has_waiver(student_id, waiver_id REFERENCES waiver) VALUES (?, NULL)") or die("query error: " . mysqli_error($link));
                        mysqli_stmt_bind_param($stmt, 'd',  htmlspecialchars($_POST['student_id']))  or die ("bind Error " . mysqli_error($link));
                        mysqli_stmt_execute($stmt);
                        

                        mysqli_close($link); 
                        header("Location: success.php");
                }
?>