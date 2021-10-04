<?php
session_start();

require "connection.php";

$help = "";

if (!isset($_SESSION["isLoggedIn"])) {
    header("location: index.php");
}

if (isset($_POST["btn-submit"])) {
    $name = $_POST["name"];
    $rollno = $_POST["rollno"];
    $course = $_POST["course"];
    $semester = $_POST["semester"];
	
	if(!empty($name) && !empty($rollno)) {
		if(preg_match("/^[a-zA-Z ]{3,40}$/", $name) && preg_match("/^[1-9]+[0-9]{0,2}$/", $rollno)) {
			if (mysqli_query($con, "INSERT INTO student (name, rollno, course, semester, count, total) VALUES ('$name', '$rollno', '$course', '$semester', 0, 0)")) {
				$help = "Student Added to Database";
			} else {
				die("ERROR: Couldn't execute query");
			}
		} else {
			$help = "*Name: characters only<br> *Roll number: numbers only [starting from 1 upto 999]";
		}
	} else {
		$help = "Please fill out all the fields";
	}
}
?>