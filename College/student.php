<?php
require "includes/student-helper.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
    <title>Document</title>
</head>
<body>
	<div class="container">
		<form action="student.php" method="POST">
			<h1>Register Student</h1>
			<label>Enter Name</label>
			<input type="text" name="name" placeholder="Student Name"> 
			
			<label>Enter Roll number</label>
			<input type="text" name="rollno" placeholder="Roll Number">
			
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
			
			<input type="submit" name="btn-submit" value="Insert"> <p/>
		</form>
		
		<p>Go to <a href="dashboard.php">Dashboard</a></p>
	</div>
	<?php
		echo $help;
	?>
</body>
</html>