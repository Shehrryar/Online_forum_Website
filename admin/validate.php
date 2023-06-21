<?php

include_once('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	
	$username = $_POST["username"];
	$password = $_POST["password"];
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($con,$sql);
    $numrow = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
	if(($row['admin_mail'] == $username) && ($row['admin_passward'] == $password)) {
			header("location: adminpage.php");
			session_start();
			$_SESSION['loggedin'] = True;
	}
	else 
    {
		header("location: index.php");
	}
	}