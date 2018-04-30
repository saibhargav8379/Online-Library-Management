<html>
		<!-- Created by Pothuguntla
			ID: 700638595. -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<body>
		<div>
			<img src="Images/library3.jpg" width="650" height="420"/>
		</div>

		<div style="margin-left: 750px; margin-top: -310px">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table style="display: table;border-collapse: separate;border-spacing: 5px; ">

					<tr align="center"> <td colspan="2"><span style="font-size: 20px; color: blue;">Forgot Password</span> </td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr> <td>Email ID *</td><td> <input type="text" name="stdid" placeholder="example@ucmo.edu" required="required"></td></tr> 
					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Send"></td> </tr> 

				</table> 
			</form>
		</div>

	</body>
</html>

<?php 

include 'Db_Connection.php';
if(isset($_REQUEST["submit"])) //set request on submit
{
	$email=$_REQUEST["stdid"]; //request for email id.
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@ucmo.edu/';
	if(preg_match($regex, $email))
	{
		$sql="select * from student where emailid='".$_REQUEST["stdid"]."'"; //sql query.
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		
			if($row=$result->fetch_assoc())
			{				
				$pwd=$row["password"]; //get password row from result.
				
				$to=$_REQUEST["stdid"]; //set to address
				$sub="Login Details"; //subject for mail
				$msg="Hi Your Login Details.\nLogin Name: ".$to." \nPassword: ".$pwd."\nThank You."; //message
				$headers="From: sxp85950@ucmo.edu"; //from mail which through mail functionality works
				
				mail($to, $sub, $msg, $headers); //passing arguments to mail function.
				
				?>
				<script type="text/javascript">
				alert("Password Details Sent Your Email. Please Check Your Email.");
				window.location.href = "ForgotPassword.php";
				</script>
				<?php								  								
			}
		}
	else {
			?>
			<script type="text/javascript">
			alert("This Emailid Not Registered");
			</script>
			<?php
				
		}
		$conn->close();
 	}
 	else 
 	{
 		?>
 		<script type="text/javascript"> --> -->
		alert("Please Enter Valid UCMO Email");
		</script>
		<?php
 	}
}
?>