<?php
	$link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
        if(isset($_POST['submit'])) 
		{
                $stmt = mysqli_prepare($link, "DELETE FROM item(item_id, name, category, item_condition, location_id, is_checked_out) VALUES (?, ?, ?, ?, ?, ?)")or die ("query Error " . mysqli_error($link));
                        
                mysqli_stmt_bind_param($stmt, 'sddddd', htmlspecialchars($_POST['item_id']), htmlspecialchars($_POST['name']), htmlspecialchars($_POST['category']), htmlspecialchars($_POST['item_condition']), htmlspecialchars($_POST['location_id']), htmlspecialchars($_POST['is_checked_out'])) or die ("bind Error " . mysqli_error($connection));
                mysqli_stmt_execute($stmt);
                mysqli_close($link);
                header("Location: success.php");
        }
?>