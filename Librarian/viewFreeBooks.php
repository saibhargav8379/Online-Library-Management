<html>
	<!-- created by Pothuguntla
		ID: 700638595 -->
<head>
	<body>
		<center><h2><span>E-Books</span></h2>
		<br>
		<?php

		include '../Db_Connection.php';
		session_start();
		if(isset($_SESSION['lname']) && !empty($_SESSION['lname']))
		{
			$sql="select * from freebooks";
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
				  <th>Document</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				  while($row = $res->fetch_assoc()){
						$id=$row["id"];
					  echo "<tr><td><a href='updateFreeBook.php?id=$id'>Edit</a></td><td><a href='deleteFreeBook.php?id=$id'>Delete</a></td><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td>{$row['Document']}</td></tr>\n";
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