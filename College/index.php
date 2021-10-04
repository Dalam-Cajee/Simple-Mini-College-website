<?php
require "includes/index-helper.php";
?>

<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Teacher Login Page</title>
</head>
<body>
	<div class="container">
		<img src="images/avatar.png" class ="avatar">
		<h1>Login</h1>
		<form action="index.php" method="POST">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username">
			
			<label>Password</label>
			<input type="password" name="password" placeholder="Password">
			
			<input type="submit" name="btn-login" value="Log In"> <p/>
		</form>
		
		<p>Don't have an account? <a href="register.php"> Sign Up</a> now</p>
	</div>
	<?php
		echo $help ;
	?>
</body>
</html>