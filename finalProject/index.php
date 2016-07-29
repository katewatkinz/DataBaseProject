<?php
	
	$link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));	

	//check if adminUser already exists in the database. If not, register admin with a new salt for security. This way, an admin account never needs to be manually registered
	$result = mysqli_query($link, "SELECT * FROM employee WHERE username = 'admin'");
	$rows = mysqli_num_rows($result);	
	mysqli_free_result($result);
	if($rows === 0){
		$sql = "INSERT INTO employee(username, hashed_password, salt, permission) VALUES ('admin', ?, ?, 1)";
		if($stmt = mysqli_prepare($link, $sql)){
			$salt = mt_rand();
			$hpass = password_hash($salt.'adminpass', PASSWORD_BCRYPT);
			mysqli_stmt_bind_param($stmt, "ss", $hpass, $salt) or die("bind param");
			mysqli_stmt_execute($stmt) or die("execution failed");
		}else{
			die("prepare failed");
		}
	}

?>
<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
		<style>
		#logincontainer{				
			margin-top: 50px;
			padding-left: 50px;
			padding-right: 50px;
			border: 8px solid gold;
			border-radius: 30px;
			background-color: black;
			text-align: center;
			color: white;


		}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">				
				<div id = "logincontainer" class="col-md-7 col-sm-7 col-xs-8 col-lg-offset-2">
					<h2>UMSystems IT Help Desk</h2>					
					<form action="/final/login.php" method="POST">
						<div class="row form-group">
							<input class='form-control' type="text" name="username" placeholder="Username">
						</div>
						<div class="row form-group">
							<input class='form-control' type="password" name="password" placeholder="Password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-default btn-lg" type="submit" name="login" value="Login"/>
						</div>						
					</form>
				</div>
			</div>			
		</div>
	</body>
</html>