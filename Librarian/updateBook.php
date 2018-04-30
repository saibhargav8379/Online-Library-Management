<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
	$id=$_GET['id']; //get book id from viewBooks page.
	include '../Db_Connection.php'; //db connection.
	session_start();
	if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for session.
	{
		$sql="Select * from books where Id='".$id."'"; //sql query.
		$result=$conn->query($sql); //set connection into variable.
		if($result->num_rows>0) 
		{
			while ($row=$result->fetch_assoc()) //fetch data sequentially.
			{
				$name=$row["BookName"];
				$author=$row["Author"];
				$pub=$row["Publisher"];
				$pages=$row["Pages"];
				$cost=$row["Cost"];			
			}
		}			
	?>
	
	<html>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<body>
		
			<center>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table>
					<tr>  <td>Book Id</td><td> <input type="text" name="id" readonly="readonly" value="<?php echo  $id; ?>"></td> </tr>
					<tr>  <td>Book Name *</td><td> <input type="text" name="bname"  pattern="[a-z A-Z]*" required="required" value="<?php echo  $name; ?>"></td> </tr>
					<tr>  <td>Author *</td><td> <input type="text" name="author" pattern="[a-z A-Z]*" required="required" value="<?php echo  $author; ?>"></td> </tr> 
					<tr> <td>Publisher *</td><td> <input type="text" name="publisher" pattern="[a-z A-Z]*" required="required" value="<?php echo  $pub; ?>"></td> </tr> 
					<tr> <td>Pages *</td><td> <input type="text" name="pages" pattern="[0-9]*" required="required" value="<?php echo  $pages; ?>"></td> </tr>							
					<tr> <td>Cost($) *</td><td> <input type="text" name="cost" pattern="[0-9]*" required="required" value="<?php echo  $cost; ?>"></td> </tr> 
					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2">
					<input style="background-color:orange;" id="button" type="submit" name="submit" value="Update Book"></td> </tr> 
				
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	
	if(isset($_REQUEST["submit"])) //set request on submit.
	{	
		$sql="update books set BookName='".$_REQUEST["bname"]."',Author='".$_REQUEST["author"]."',Publisher='".$_REQUEST["publisher"]."',Pages='".$_REQUEST["pages"]."',Cost='".$_REQUEST["cost"]."' where Id='".$_REQUEST["id"]."'"; //sql query.
		
		if ($conn->query($sql) === TRUE) {
			header('location: viewBooks.php'); //head location to viewBooks.
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	}
	}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>