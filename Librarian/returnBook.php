<?php 
	$id=$_GET['id']; //get variable from other file.
	include '../Db_Connection.php'; //db connection
	
	$sql="update books set status='True' where Id='".$id."'"; //sql query
	if ($conn->query($sql) === TRUE) { //if connection runs query.
    header('location: viewOnlineBookings.php'); //head to viewOnlineBookings page
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
	}
	
	$conn->close();	//close connection.
?>