<center>
<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
include '../Db_Connection.php'; //db connection.
session_start(); //start session.
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	$sql="select * from books where status='True'"; //sql query.
	$res=$conn->query($sql);

	if($res->num_rows>0)
	{
	?>
	<br>
	<br>
	<span style="font-size: 25px;font-weight: bold;">Library Books</span> 
	<br>
	<br>
	<table border="2">
	  <thead>
	    <tr style="color: green;">
	      <th>Book Name</th>      
	      <th>Author</th>
	      <th>Publisher</th> 
	      <th>Pages</th>
	      <th>Cost ($)</th>
	      <th>Available</th>           
	      <th>Image</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    while($row = $res->fetch_assoc()){ //display result in tbody.
				$id=$row["Id"];
	          echo "<tr><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td>{$row['Cost']}</td><td>{$row['status']}</td><td><img height='80px' width='120px' src={$row['Image']}></td><td><a href='onlineBooking.php?id=$id'>Rent</a></td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "\nNo books found at this time.";
}
else
{
	header('Refresh: 0; url=newfile.php');	
}

?>