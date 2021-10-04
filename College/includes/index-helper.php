<?php
session_start();

require "connection.php";

$help = "";

if (isset($_POST["btn-login"])) {
    $uname = $_POST["username"];
    $pword = $_POST["password"];
	
	if(!empty($uname) && !empty($pword)) {
		if(preg_match("/^[a-zA-Z0-9._-]{6,30}$/", $uname) && preg_match("/^[a-zA-Z0-9_#@*]{6,30}$/", $pword)) {
			if ($res = mysqli_query($con, "SELECT * FROM users WHERE username='$uname'")) {
				if (mysqli_num_rows($res) > 0) {
					$row = mysqli_fetch_array($res);
					if ($uname == $row["username"] && $pword == $row["password"]) {
						$_SESSION["isLoggedIn"] = true;
						$_SESSION["user_id"] = $row["id"];
						header("location: dashboard.php");
					} else {
						die("Invalid Username or Password");
					}
				} else {
					die("You don't have an account. Please register");
						
				}
			} else {
				die("ERROR: Couldn't execute query");
			}
		} else {
			$help = "Username and Password should contain 6 characters or more.<br> *Username: characters allowed [a-z, A-Z, . _ -]<br> *Password: characters allowed [a-z, A-Z, _ # @ *]";
		}
	} else {
		$help = "Please fill out all the fields<br>";	
	}
}
?>
