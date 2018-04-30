<?php 
		/* created by Pothuguntla
			ID: 700638595 */
	$id=$_GET['id'];
	include '../Db_Connection.php'; //database connection.
	$sql = "Delete from freebooks where id='".$id."'"; //sql query.
	if ($conn->query($sql) === TRUE) { //check connection runs query
	    header('location: viewFreeBooks.php'); //head location to viewFreeBooks.
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
	}
	
	$conn->close();
?>