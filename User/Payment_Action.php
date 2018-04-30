<?php
include '../Db_Connection.php'; //db connection.
session_start(); //start session.
$chname	=	mysql_real_escape_string($_REQUEST['chname']);	//escapes special characters in string to use in sql query.
$bank	=	mysql_real_escape_string($_REQUEST['bank']);		
$card	=	mysql_real_escape_string($_REQUEST['card']);
$cardno	=	mysql_real_escape_string($_REQUEST['cardno']);
$cvv	=	mysql_real_escape_string($_REQUEST['cvv']);
$acc	=	mysql_real_escape_string($_REQUEST['acc']);
$bookingid	=	mysql_real_escape_string($_REQUEST['bid']);
$amount	=	mysql_real_escape_string($_REQUEST['amount']);
	
	
$sql="insert into payment(bookingid,Total_Amount,CardholderName,Bank,Type,Accno,CardNo,CvvNo) values('".$bookingid."','".$amount."','".$chname."','".$bank."','".$card."','".$acc."','".$cardno."','".$cvv."')";
if ($conn->query($sql) === TRUE) {
	
	$sql2="update books set status='False' where Id='".$_SESSION['bbbbbbid']."'"; //sql query for books.
	$conn->query($sql2);

	$sql3="update booking set status='1' where id='".$bookingid."'"; //sql query for booking.
	$conn->query($sql3);
	
	echo 1;	
}

$conn->close(); //connection close.
?>