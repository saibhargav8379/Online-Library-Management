<?php 
	/* Created by Pothuguntla
		ID : 700638595 */
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	?>
	<html>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		</head>
		<body>
			<center><h2><span>Search Library Books</span></h2>
			<br>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table>
					<tr>  
					<tr> <td>Book Name *</td><td style="margin-left: 100px"><input type="text" name="book" required="required" placeholder="Book Name"> </td> </tr> 
					
					<tr><td>&nbsp;</td></tr> 
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Search"></td> </tr> 
					
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	
	include '../Db_Connection.php'; //db connection
	
	if(isset($_REQUEST["submit"]))  //set request on submit.
	{
	
		$sql="select * from books where BookName='".$_POST["book"]."' and status='True'"; //sql query.
		$res=$conn->query($sql);
	
		if($res->num_rows>0)
		{
		?>
		<center>
		<br>
		<table style="background-color: #FFE4C4">
		  <thead>
		    <tr style="color: green;">
		      <th>Book Name</th>      
		      <th>Author</th>
		      <th>Publisher</th> 
		      <th>Pages</th>
		      <th>Cost ($)</th>
		      <th>Status</th>           
		      <th>Image</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    while($row = $res->fetch_assoc()){
					$id=$row["Id"];
		          echo "<tr><td>{$row['BookName']}</td><td>{$row['Author']}</td><td>{$row['Publisher']}</td><td>{$row['Pages']}</td><td>{$row['Cost']}</td><td>{$row['status']}</td><td><img height='80px' width='120px' src={$row['Image']}></td><td><a href='onlineBooking.php?id=$id'>Rent</a></td></tr>\n"; //sql query.
		        }      
		    ?>
		  </tbody>
		</table>
		</center>
		<?php 
		}
		else
			echo "No Books Found for this Book Name";
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	 
}
?>