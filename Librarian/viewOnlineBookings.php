<?php 
		/* Created by Pothuguntla
			ID: 700638595. */
include '../Db_Connection.php';
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname']))
{
	?>
	<html>
	<body>
		<center><h2><span>Booking History</span></h2>
		<br>
		<?php
		
		$sql="select books.Id,booking.fdate,booking.tdate,booking.days,booking.Delivery_Type,booking.Delivery_Charge,booking.Total_Amount,books.BookName,books.Cost,books.Image from booking inner join books on booking.bookid=books.Id where books.Status='False'";
		$res=$conn->query($sql);
		
		if($res->num_rows>0)
		{
		?>
		<center>
		<table border="2">
		  <thead>
			<tr style="color: green;">    
			  <th>Book Name</th>      	      
			  <th>Cost ($)</th>
			  <th>From Date</th>
			  <th>To Date</th>
			  <th>Days</th>
			  <th>Delivery Type</th>
			  <th>Delivery Charge($)</th>
			  <th>Total Amount ($)</th>	                
			  <th>Image</th>            	      
			  <th></th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			while($row = $res->fetch_assoc()){
					$id=$row["Id"];
				  echo "<tr><td>{$row['BookName']}</td><td>{$row['Cost']}</td><td>{$row['fdate']}</td><td>{$row['tdate']}</td><td>{$row['days']}</td><td>{$row['Delivery_Type']}</td><td>{$row['Delivery_Charge']}</td><td>{$row['Total_Amount']}</td><td><img height='80px' width='120px' src={$row['Image']}></td><td><a href='returnBook.php?id=$id'>Return</a></td></tr>\n";
				}
			  
			?>
		  </tbody>
		</table>
	
	<?php 
	}
	else
		echo "No bookings found";
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>