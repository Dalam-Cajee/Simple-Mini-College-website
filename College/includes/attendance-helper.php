<?php
session_start();

if (!isset($_SESSION["isLoggedIn"])) {
    header("location: index.php");
}

require "connection.php";

if (isset($_POST["btn-submit"])) {
	
		$course = $_SESSION["course"];
		$semester = $_SESSION["semester"];
		
		if ($res = mysqli_query($con, "SELECT * FROM student WHERE course='$course' and semester='$semester' ORDER BY rollno ASC")) {
			while ($row = mysqli_fetch_array($res)) {
				$temp = "attendance-" . $row["id"];
				$attendance = $_POST[$temp];
				$sid = $row["id"];

				if ($attendance == "present") {
					$count = $row["count"] + 1;
					if (!mysqli_query($con, "UPDATE student SET count='$count' WHERE id='$sid'")) {
						die("ERROR: Couldn't execute query");
					}
				}
			}
		}

		if (!mysqli_query($con, "UPDATE student SET total=total+1 Where course='$course' and semester='$semester'")) {
			die("ERROR: Couldn't execute query");
		}
	
}
?>