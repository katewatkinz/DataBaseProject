<?php
       
	$user = $_POST['username'];
    $pass = $_POST['password'];
        
    $link = mysqli_connect("localhost", "root", "", "inventory") or die(mysqli_error($link));

    $sql = "SELECT hashed_password, salt, permission, name_first FROM employee WHERE username = ?";
    $stmt = mysqli_prepare($link, $sql) or die(mysqli_error($link));
    mysqli_stmt_bind_param($stmt, "s", htmlspecialchars($user)) or die("bind param");
	mysqli_stmt_execute($stmt) or die("could not execute");    

    $stmt->bind_result($hashed_password, $salt, $permission, $name_first);
    $stmt->fetch();      
   
    //echo $salt.$pass;
    if(password_verify($salt.$pass, $hashed_password)){          //session start
        
        session_start();
        $_SESSION["username"] = $user;
        $_SESSION["permission"] = $permission;
        $_SESSION["name"] = $name_first;
        header("Location: /final/home.php");   
            
	}else{
        echo 'Invalid login.';
        echo '<a href = "/final/index.php/">Back to Login</a>';
    }

    $stmt->free_result();   
    $stmt->close();  
    mysqli_close($link);    
    	
?>	