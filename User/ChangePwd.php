<?php
	include '../Db_Connection.php'; //db connection.
	session_start();
	$old	=	mysql_real_escape_string($_REQUEST['oldpwd']); //escapes special characters in string to use in sql query.
	$new	=	mysql_real_escape_string($_REQUEST['newpwd']);		
	$email	=	mysql_real_escape_string($_REQUEST['uname']);
	$sql="update student set password='".$new."' where emailid='".$email."' and password='".$old."'";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['userpwd']=$new;		//change session userpwd to new password.
		echo 1;			
	}
		else
			echo 0;
			
		
	$conn->close();
			
?>