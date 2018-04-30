<html>
	<!-- Created by Pothuguntla
		ID: 700638595 -->
<body>
<center><h2><span>Feedback</span></h2>
<br>
<?php 

include '../Db_Connection.php'; //sql connection
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for connection.
{
	$sql="select * from Feedback";
	$res=$conn->query($sql);
	
	if($res->num_rows>0)
	{
	?>
	<center>
	<table border="2">
	  <thead  style="color: green;">
	    <tr>
	      <th>User ID</th>      
	      <th>Feedback</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    	while($row = $res->fetch_assoc()){ //display result in tbody.
	          echo "<tr><td>{$row['User']}</td><td>{$row['Feedback']}</td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "No rows found";
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>