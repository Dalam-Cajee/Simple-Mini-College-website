<?php
session_start();

if (!isset($_SESSION["isLoggedIn"])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
    <title>Dashboard</title>
</head>
<body>
	<div class="container">
		<h1>Welcome</h1>
		<nav>
			<a href="student.php">Register Student</a> <br>
			<a href="attendance.php">Manage Attendance</a> <br>
			<a href="logout.php">Log Out</a> <br>
		</nav>
	</div>
</body>
</html>