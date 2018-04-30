<html>
	<head>
			<!-- Created by Pothuguntla
				ID: 700638595. -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	</head>
	<body>
		<div>
			<img src="Images/library.jpg" width="650" height="420"/>
		</div>

		<div style="margin-left: 750px; margin-top: -310px">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_parent">
				<table style="display: table;border-collapse: separate;border-spacing: 5px; ">

					<tr align="center"> <td colspan="2"><span style="font-weight: 900; font-size: 20px; color: orange;">Librarian Login</span> </td> </tr>
					<tr><td>&nbsp;</td></tr>
					<tr> <td>User Name *</td><td> <input type="text" name="username" required="required"></td> </tr> 
					<tr> <td>Password *</td><td> <input type="password" name="password" required="required"></td> </tr>

					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Login"></td> </tr> 

				</table> 
			</form>
		</div>

	</body>
</html>

<?php 

include 'Db_Connection.php';
if(isset($_REQUEST["submit"])) //set request on submit form.
{
$sql="select * from librarian where UserName='".$_REQUEST["username"]."' and Password='".$_REQUEST["password"]."'"; //sql query.
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	session_start(); //start session.
	$_SESSION['lname']=$_POST["username"]; //session variable for username librarian.
	header("location: Librarian/librarianIndex.php"); //heading location to librarianIndex.

} else {
	?>
	<script type="text/javascript">
	alert("Sorry, your credentials are not valid, Please try again.");
	window.location.href = "Index.php";
	</script>
	<?php
}
$conn->close();
}
?>