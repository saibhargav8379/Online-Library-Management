<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
$bid=$_GET['id'];
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	$stdid=$_SESSION['stdid']; //create variable for student id session.
		include '../Db_Connection.php'; //db connection.
		$sql="Select * from books where Id='".$bid."'"; //sql query.
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc())
			{	//create variables for cost and book name.		
				$cost=$row["Cost"]; 
				$bname=$row["BookName"];
			}
		}	
	?>
	
	<html>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
	<body>
	<center>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table>
	<tr><td>Book Id</td><td> <input type="text" name="bid" readonly="readonly" value="<?php echo  $bid; ?>"></td> </tr>
	<tr><td>700#</td><td> <input type="text" name="stdid" readonly="readonly" value="<?php echo  $stdid; ?>"></td> </tr>
	<tr><td>From Date *</td><td> <input type="date" name="fdate" min="<?php echo date("Y-m-d"); ?>" required="required"></td> </tr> 
	<tr><td>To Date *</td><td> <input type="date" name="tdate" min="<?php echo date("Y-m-d"); ?>" required="required"></td> </tr>
	<tr><td>Delivery Type *</td><td>  <input type="radio" name="dtype" value="Store" checked="checked">Store
	<input type="radio" name="dtype" value="Home Delivery">Home Delivery</td> </tr>								
	<tr><td>Amount($)</td><td> <input type="text" name="cost" readonly="readonly" value="<?php echo  $cost; ?>"></td> </tr> 
	<tr><td>&nbsp;<input type="hidden" name="bname" readonly="readonly" value="<?php echo  $bname; ?>"></td></tr>
	<tr align="center"> <td colspan="2">
	<input id="button" type="submit" name="submit" value="Booking"></td> </tr> 
	
	</table>
	</form>
	</body>
	</html>
	
	<?php 
	
	
	if(isset($_REQUEST["submit"]))
	{	//creating variables.
		$pre=$_POST["cost"];
		$_SESSION['price']=$pre;
		
		$fdate=$_POST["fdate"];
		$tdate=$_POST["tdate"];
		$datetime1 = new DateTime($fdate); //create date objects.
		$datetime2 = new DateTime($tdate);
		$days = $datetime1->diff($datetime2);
		echo $days->format('%a'); //formatting days difference into number of days returns value.
		$_SESSION['days']=$days->format('%a');
		$_SESSION['daycharge']=$days->format('%a');
		$charge=$pre+$_SESSION['daycharge']; //adding cost with daycharge.
		
		$_SESSION['fdate']=$fdate;
		$_SESSION['tdate']=$tdate;
		$_SESSION['bookname']=$_POST["bname"];
		$type=$_POST["dtype"];
		if($type=="Home Delivery")
			$status=0;
		else 
			$status=1;
		
		$sql="insert into booking(studentid,bookid,fdate,tdate,days,Delivery_type,Delivery_Charge,Total_Amount,Status) values('".$_POST["stdid"]."','".$_POST["bid"]."','".$_POST["fdate"]."','".$_POST["tdate"]."','".$_SESSION['days']."','".$_POST["dtype"]."','0','".$charge."','".$status."')"; //sql query.
		if ($conn->query($sql) === TRUE) {
			$bookingid=$conn->insert_id; //inserting auto generated id from the previous query.
			$amount=$charge + 10;						
			$_SESSION['bookingid']=$bookingid;				  		
			
			if ($_POST["dtype"]=="Home Delivery")
			{			
				$sql3="update booking set Delivery_Charge='10', Total_Amount='".$amount."' where id='".$bookingid."'";
				$conn->query($sql3);
				//session variables to use them in payment page.
				$_SESSION['bbbbbbid']=$_POST["bid"];
				$_SESSION['charges']=10;				
				$_SESSION['amount']=$amount;				
 				header('location: Payment.php'); //head location to payment page.
			}
			else
			{	
				$sql2="update books set status='False' where Id='".$_POST["bid"]."'"; //sql query.
				$conn->query($sql2);
				
				$_SESSION['charges']=0;
				$_SESSION['amount']=$charge;
				header('location: Summary.php'); //head to summary page.
			}
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	$conn->close(); //close connection.
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>
