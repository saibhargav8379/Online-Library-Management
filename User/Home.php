<center>

	<span style="font-size: 25px;font-weight: bold;">Latest Books</span> 
	<br>
	<br>
	<?php 
		/* Created by Pothuguntla
			ID: 700638595 */
	session_start();
	if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
	{
		include '../Db_Connection.php'; //db connection.
		
			$sql="select * from books where status='True' ORDER BY Id DESC limit 5"; //sql query.
			$res=$conn->query($sql); 
		
		if($res->num_rows>0)
		{
		?>
		
		<table style="background-color: #FFE4C4;border-radius:8px;color: red;" border = "8">
		  <thead style="background-color: black">
			<tr style="color: #FFE4C4; font-weight:900;">
			  <th>Book Name</th>      
			  <th>Author</th>
			  <th>Publisher</th> 
			  <th>Pages</th>
			  <th>Cost($)</th>
			  <th>Status</th>           
			  <th>Image</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			while($row = $res->fetch_assoc()){
					$id=$row["Id"]; //taking book id into variable to pass it for onlineBooking page.
				  echo "<tr><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td>{$row['Cost']}</td><td>{$row['status']}</td><td><img height='80px' width='120px' src={$row['Image']}></td><td><a href='onlineBooking.php?id=$id'>Rent</a></td></tr>\n";
				}      
			?>
		  </tbody>
		</table>
		
		<?php 
		}
		else
		{
			echo "\nThere are currently no books found";
		}
		?>
		<br>
		<span style="font-size: 25px;font-weight: bold;">Latest E-Books</span>
		<br>
		<br>
		<?php
		$sql="select * from freebooks ORDER BY id DESC limit 5"; //sql query.
			$res=$conn->query($sql);
		
		if($res->num_rows>0)
		{
		?>
		
		<table style="background-color: #FFE4C4; font-size: 14px;line-height: 2; padding: 5px 15px 15px 15px; ;" border="1">
		  <thead>
			<tr style="color: green;">
			  <th>Book Name</th>
			  <th>Author</th>
			  <th>Publisher</th> 
			  <th>Pages</th>              
			  <th>Download</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			while($row = $res->fetch_assoc()){
					$file=$row["Document"]; //taking document into variable to pass it to downloadFile page.
					$id=$row["id"];
				  echo "<tr><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td><a href='downloadFile.php?file=$file'> Click Here </a></td></tr>\n";
				}      
			?>
		  </tbody>
		</table>
</center>
	<?php 
	}
	else
		echo "There are currently no Books found";
}
else
{
	header('Refresh: 0; url=newfile.php');	 
}