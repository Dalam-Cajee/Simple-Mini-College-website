<?php
require "includes/attendance-helper.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
    <title>Manage Attendance</title>
</head>
<body>
	<div class="container-input">
		<h1>Manage Attendance</h1>
		<form action="attendance.php" method="POST">
			<label>Course</label>
				<select name="course">
					<option value="BA">BA</option>
					<option value="BCA">BCA</option>
					<option value="BBA">BBA</option>
					<option value="BSc">BSc</option>
				</select>
			
			<label>Semester</label>
				<select name="semester">
					<option value="1st Semester">1st Semester</option>
					<option value="2nd Semester">2nd Semester</option>
					<option value="3rd Semester">3rd Semester</option>
					<option value="4th Semester">4th Semester</option>
					<option value="5th Semester">5th Semester</option>
					<option value="6th Semester">6th Semester</option>
				</select> 
				
			<input type="submit" name="btn-manage" value="Manage">
			<input type="submit" name="btn-view" value="View Attendance">
		</form>
		<p>Go to <a href="dashboard.php">Dashboard</a></p>	
	</div>
	<div class="container-attendance">
		<form action="attendance.php" method="POST">
			<?php
				if (isset($_POST["btn-manage"])) {
					$course = $_POST["course"];
					$semester = $_POST["semester"];
					echo "<h1>Student Attendance<br>" . $course . " " . $semester . "</h1>";
					$_SESSION["course"] = $course;
					$_SESSION["semester"] = $semester;

					if ($res = mysqli_query($con, "SELECT * FROM student WHERE course='$course' and semester='$semester' ORDER BY rollno ASC")) {
						echo "<table>";
							echo "<tr>"; 
								echo "<th>Roll Number</th>";
								echo "<th>Name</th>";
								echo "<th>Present</th>";
								echo "<th>Absent</th>";
							echo "</tr>";
							
						while ($row = mysqli_fetch_array($res)) {
							echo "<tr>";
								echo "<td>" . $row["rollno"] . "</td>";
								echo "<td>" . $row["name"] . "</td>";
								echo "<td>" . "<input type='radio' name='attendance-" . $row["id"] . "' value='present' checked>" . "</td>";
								echo "<td>" . "<input type='radio' name='attendance-" . $row["id"] . "' value='absent'>" . "</td>";
							echo "</tr>";
						}
							
							echo "<tr>";
								echo "<td>" . "<input id='submit' type='submit' name='btn-submit' value='Submit'>";
							echo "</tr>";	
						echo "</table>";
					} 
				}
				
				if(isset($_POST["btn-view"])) {
					$course = $_POST["course"];
					$semester = $_POST["semester"];
					echo "<h1>Student Attendance<br>" . $course . " " . $semester . "</h1>";
					
					if ($res = mysqli_query($con, "SELECT * FROM student WHERE course='$course' and semester='$semester' ORDER BY rollno ASC")) {
						echo "<table>";
							echo "<tr>"; 
								echo "<th>Roll Number</th>";
								echo "<th>Name</th>";
								echo "<th>Class Attended</th>";
							echo "</tr>";
							
						while ($row = mysqli_fetch_array($res)) {
							echo "<tr>";
								echo "<td>" . $row["rollno"] . "</td>";
								echo "<td>" . $row["name"] . "</td>";
								echo "<td>" . $row["count"] . "/" . $row["total"] . "</td>";
							echo "</tr>";
						}
					}
				}
				?>
		</form>
	</div>
</body>
</html>