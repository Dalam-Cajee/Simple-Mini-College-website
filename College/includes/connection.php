<?php

$con = mysqli_connect("localhost", "root", "", "college");

if (!$con)
    die("Couldn't connect to database: " . mysqli_connect_error($con));
?>

