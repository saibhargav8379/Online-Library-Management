<html>
		<!-- Created by Pothuguntla
			ID: 700638595. -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
	<head>
		<script>
		function Print() {
			window.print(); //for printing page.
		}
		</script>
	</head>
	<body>	
		<?php 
		session_start();
		?>
		<center>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table style="font-size: 18px;font-weight: bold;">
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booking Summary</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>BookingID</td><td><label>:&nbsp;<?php echo  $_SESSION['bookingid']; ?></label></td></tr>
				<tr><td>Book Name</td><td><label>:&nbsp;<?php echo  $_SESSION['bookname']; ?></label></td></tr>
				<tr><td>Book Price</td><td><label>:&nbsp;$<?php echo  $_SESSION['price']; ?></label></td></tr>
				<tr><td>From Date</td><td><label>:&nbsp;<?php echo  $_SESSION['fdate']; ?></label></td></tr>
				<tr><td>To Date</td><td><label>:&nbsp;<?php echo  $_SESSION['tdate']; ?></label></td></tr>
				<tr><td>No of Days</td><td><label>:&nbsp;<?php echo  $_SESSION['days']; ?></label></td></tr>
				<tr><td>Charges</td><td><label>:&nbsp;$<?php echo  $_SESSION['daycharge']; ?></label></td></tr>
				<tr><td>Delivery Charge</td><td><label>:&nbsp;$<?php echo  $_SESSION['charges']; ?></label></td></tr>						
				<tr><td>Total Amount</td><td><label>:&nbsp;$<?php echo  $_SESSION['amount']; ?></label></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr align="center"><td><input id="button2" type="submit" onclick="Print()" value="Print"></td><td><input id="button" type="submit" name="submit" value="Exit"></td> </tr> 

			</table>
		</form>
	</body>
</html>

<?php 
	include '../Db_Connection.php';
	if(isset($_REQUEST["submit"])) //set request on submit.
	{
		?>		
		<script type="text/javascript">
			alert("Thank You For Booking");
			window.location.href = "Home.php"; //head location to home page.
		</script>
		<?php 
	}
	?>