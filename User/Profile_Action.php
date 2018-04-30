<?php
	include '../Db_Connection.php';
	
	$stdid	=	mysql_real_escape_string($_REQUEST['stdid']); //escapes special characters in string to use in sql query.
	$fname	=	mysql_real_escape_string($_REQUEST['fname']);
	$lname	=	mysql_real_escape_string($_REQUEST['lname']);
	$email	=	mysql_real_escape_string($_REQUEST['email']);
	$mobile	=	mysql_real_escape_string($_REQUEST['mobile']);	
	$gender	=	mysql_real_escape_string($_REQUEST['gender']);			
	
	$sql="update student set firstname='".$fname."',lastname='".$lname."',mobile='".$mobile."',gender='".$gender."',emailid='".$email."' where studentid='".$stdid."'";
	if ($conn->query($sql) === TRUE) 
	{		
		echo 1;			
	}
		else
			echo 0;
			
		
	$conn->close();
			
?>