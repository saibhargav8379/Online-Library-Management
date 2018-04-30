<?php
	include 'Db_Connection.php';
	//holding values from form with variables.
	$stdid	=	mysql_real_escape_string($_REQUEST['stdid']); //escapes special characters in string to use in sql query.
	$fname	=	mysql_real_escape_string($_REQUEST['fname']);
	$lname	=	mysql_real_escape_string($_REQUEST['lname']);
	$email	=	mysql_real_escape_string($_REQUEST['email']);
	$mobile	=	mysql_real_escape_string($_REQUEST['mobile']);
	$pwd	=	mysql_real_escape_string($_REQUEST['pwd']);		
	$gender	=	mysql_real_escape_string($_REQUEST['gender']);			
	
	$sql="insert into student(studentid,firstname,lastname,mobile,emailid,password,gender) values('".$stdid."','".$fname."','".$lname."','".$mobile."','".$email."','".$pwd."','".$gender."')";
	if ($conn->query($sql) === TRUE) 
	{
		$sub="UCM Library Registration Details";
		$msg= "Congrats ".$fname." ".$lname.",\nYou Are Registered with UCM Library\nYour Registration Details\nUser ID: ".$stdid."\nEmailId: ".$email."\nMobile Number: ".$mobile."\nand Password: ".$pwd."\nThank You.";
		$headers="From: sxp85950@ucmo.edu";
		
		mail($email, $sub, $msg, $headers); //passing parameters to mail function.
		
		echo 1;			
	}
		else
			echo 0;
			
		
	$conn->close();
			
?>