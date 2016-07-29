<?php 
				$link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
				
                if(isset($_POST['submit'])) 
				{
                        $statement = mysqli_prepare($link, "DELETE FROM student_item_transaction (transaction_id, transaction_type, student_id, location_id, emp_id, item_id, condition_id, tstamp) VALUES (NULL, ?, ?, ?, ?, ?, ?, NULL)")or die ("query Error " . mysqli_error($link));
                        
                        mysqli_stmt_bind_param($statement, 'iiiiii'), 
                        
                        htmlspecialchars($_POST['transaction_type']), htmlspecialchars($_POST['student_id']), htmlspecialchars($_POST['location_id']), htmlspecialchars($_POST['emp_id']), htmlspecialchars($_POST['item_id']), htmlspecialchars($_POST['condition_id']))or die ("bind Error " . mysqli_error($connection));
                        
						if ($link->query($statement) === TRUE) 
						{
							echo "Record deleted successfully";
						} 
						
						else 
						{
							echo "Error deleting record: " . $link->error;
						}
						
                        mysqli_stmt_execute($statement);
                        mysqli_close($link); 
                        header("Location: laptop_checkout_sc.php");
                }
?>