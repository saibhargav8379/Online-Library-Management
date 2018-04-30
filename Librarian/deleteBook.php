<?php 
		/* created by Pothuguntla
			ID: 700638595 */
	$id=$_GET['id'];
	include '../Db_Connection.php'; //database connection
	$sql = "Delete from books where Id='".$id."'"; //sql query
	if ($conn->query($sql) === TRUE) { //if connection runs query
	    header('location: viewBooks.php'); //head to viewBooks page
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
	}
	
	$conn->close();
?>