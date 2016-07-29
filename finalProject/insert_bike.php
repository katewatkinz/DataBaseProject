<?php 
    $link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
        if(isset($_POST['submit'])) 
        {
                        
                        $stmt = mysqli_prepare($link, "INSERT INTO student_item_transaction(transaction_type, student_id, location_id, emp_id, item_id) VALUES (?, ?, ?, ?, ?)")or die ("query Error " . mysqli_error($link));
                        
                        mysqli_stmt_bind_param($stmt, 'sdddd', htmlspecialchars($_POST['transaction_type']), htmlspecialchars($_POST['student_id']), htmlspecialchars($_POST['location_id']), htmlspecialchars($_POST['emp_id']), htmlspecialchars($_POST['item_id'])) or die ("bind Error " . mysqli_error($link));
                        
                    
                        mysqli_stmt_execute($stmt);
                        mysqli_close($link); 
                        header("Location: success.php");
                }
?>