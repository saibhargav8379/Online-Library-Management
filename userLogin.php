<html>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<!-- Created by Pothuguntla
			ID: 700638595. -->
	<body>
		<div>
			<img src="Images/library3.jpg" width="650" height="420"/>
		</div>

		<div style="margin-left: 750px; margin-top: -310px">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_parent">
				<table style="display: table;border-collapse: separate;border-spacing: 5px; ">

					<tr align="center"> <td colspan="2"><span style="font-weight: 900;font-size: 20px; color: orange;">User Login</span> </td> </tr>
					<tr><td>&nbsp;</td></tr>
					<tr> <td>Email ID *</td><td> <input type="text" name="stdid" placeholder="example@ucmo.edu" required="required"></td> </tr> 
					<tr> <td>Password *</td><td> <input type="password" name="password" required="required"></td> </tr>

					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Login"></td> </tr> 

				</table> 
			</form>
			<a href="ForgotPassword.php" target="library">Forgot Password?</a>
			<br><br>
			<a href="userRegistration.php" target="library"> New User Register Here...</a>
		</div>

	</body>
</html>

<?php 

include 'Db_Connection.php'; //db connection.
if(isset($_REQUEST["submit"])) //set request on submit form.
{
	$email=$_REQUEST["stdid"]; //request value from email id text field.
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@ucmo.edu/';
	if(preg_match($regex, $email)) //check for email that matches to regular expression.
	{
		$sql="select * from student where emailid='".$_REQUEST["stdid"]."' and password='".$_REQUEST["password"]."'"; //sql query.
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		
			if($row=$result->fetch_assoc()) //fetching rows from the query result.
			{
				session_start();
				
				$_SESSION['useremail']=$_REQUEST["stdid"]; //session variable for email id.
				$_SESSION['userpwd']=$_REQUEST["password"]; //session variable for password.
				$_SESSION['stdid']=$row["studentid"]; //session variable for studentid from student table.
				header("location: User/userIndex.php"); //heading location to userIndex.
			}
		
		}
		else {
				?>
				<script type="text/javascript">
				alert("Sorry, your credentials are not valid, Please try again.");
				window.location.href = "Index.php"; //heading to index page window.
				</script>
				<?php				
			}
			$conn->close(); //closing connection
	}
	else 
	{
		?>
		<script type="text/javascript">
		alert("Please Enter Valid UCMO Email");
		window.location.href = "Index.php";
		</script>
		<?php
	}
}
?>