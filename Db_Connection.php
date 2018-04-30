<?php 
	/* Created by Pothuguntla
		ID: 700638595. */
	$servername = "localhost"; //server name.
	$username = "root"; //user name
	$password = ""; //password.
	$mysql_database = "ucmlibrary"; //database name.

	$conn = new mysqli($servername, $username, $password, $mysql_database); //create object for connection

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error); //gives error message.
	}

?>