<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>New Employee Registration</h2>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class='form-control' type="text" name="email" placeholder="email@address.com">
						</div>
						<div class="row form-group">
								<input class='form-control' type="text" name="name_first" placeholder="first name">
						</div>
						<div class="row form-group">
								<input class='form-control' type="text" name="name_last" placeholder="last name">
						</div>						
						<div class="row form-group">
								<select name = "drop">
									<option value = "0">Default</option>
									<option value = "1">Admin</option>
								</select>
						</div>
						<div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Register"/>
						</div>

					</form>
					<div class = "row form-group">
						<a href = "/final/home.php">Return</a>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['submit'])) { // Was the form submitted?
					
					$link = mysqli_connect("localhost", "root", "", "inventory") or die ("Connection Error " . mysqli_error($link));
					$sql = "INSERT INTO employee(username,hashed_password,salt,email,name_first,name_last,permission) VALUES (?,?,?,?,?,?,?)";
					if ($stmt = mysqli_prepare($link, $sql)) {
						$user = $_POST['username'];						
						$salt = mt_rand();						
						$hpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT) or die("bind param");
						$email = $_POST['email'];
						$name_first = $_POST['name_first'];
						$name_last = $_POST['name_last'];
						$permission = $_POST['drop'];
						mysqli_stmt_bind_param($stmt, "ssssssi", $user, $hpass, $salt, $email, $name_first, $name_last, $permission) or die("bind param");
						if(mysqli_stmt_execute($stmt)) {
							echo "<h4>Success</h4>";
						} else {
							echo "<h4>Failed</h4>";
						}						
					} else {
						die("prepare failed");
					}
				}
			?>
		</div>
	</body>
</html>
