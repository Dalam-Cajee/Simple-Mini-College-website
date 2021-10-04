<?php
require "connection.php";

$help = "";

if (isset($_POST["btn-signup"])) {
    $uname = $_POST["username"];
    $pword = $_POST["password"];
    $cpword = $_POST["cpassword"];
	
	if(!empty($uname) && !empty($pword) && !empty($cpword)) {
		if(preg_match("/^[a-zA-Z0-9._-]{6,30}$/", $uname) && preg_match("/^[a-zA-Z0-9_#@*]{6,30}$/", $pword)) {
			if ($pword === $cpword) {
				if (mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$uname', '$pword');")) {
					header("location: index.php");
				} else {
					die("ERROR: Couldn't execute query");
				}
			} else {
				$help = "Password and Confirmation Password should be the same";
			}
		} else {
			$help = "Username and Password should contain 6 characters or more.<br> *Username: characters allowed [a-z, A-Z, . _ -]<br> *Password: characters allowed [a-z, A-Z, _ # @ *]";
		}
	} else {
		$help = "Please fill out all the fields";	
	}
}
?>