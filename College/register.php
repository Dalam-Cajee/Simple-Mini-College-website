<?php
require "includes/register-helper.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
    <title>Teacher Sign Up Page</title>
</head>
<body>
	<div class="container">
		<img src="images/avatar.png" class ="avatar">
		<h1>Sign Up</h1>
		<form action="register.php" method="POST">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username"> 
			
			<label>Password</label>
			<input type="password" name="password" placeholder="Password"> 
			
			<label>Confirm Password</label>
			<input type="password" name="cpassword" placeholder="Confirm Password"> 
			
			<input type="submit" name="btn-signup" value="Sign Up"> 
		</form>
		
		<p id="login">Already have an account?<a href="index.php">Log in</a> now
	</div>
	<?php
		echo $help;
	?>	
</body>
</html>