<html>
	<!-- Created by Pothuguntla
		ID: 700638595 -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
<head>
<body>
	<center><h2><span>Library Books</span></h2>
	<br>
	<?php

	include '../Db_Connection.php'; //db connection.
	session_start();
	if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for session variables.
	{
		$sql="select * from books"; //sql query
		$res=$conn->query($sql); 
		
		if($res->num_rows>0)
		{
		?>
		<center>
		<table border="2">
		  <thead>
			<tr style="color: green;">
			  <th></th> 
			  <th></th> 
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
			  while($row = $res->fetch_assoc()){ //result display in tbody.
					$id=$row["Id"];
				  echo "<tr><td><a href='updateBook.php?id=$id'>Edit</a></td><td><a href='deleteBook.php?id=$id'>Delete</a></td><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td>{$row['Cost']}</td><td>{$row['status']}</td><td><img height='80px' width='120px' src={$row['Image']}></td></tr>\n";
				}            
			?>
		  </tbody>
		</table>
	<?php 
	}
	else 
		echo "No Books found";
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>