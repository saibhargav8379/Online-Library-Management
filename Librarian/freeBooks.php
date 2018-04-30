
<?php 
		/* created by Pothuguntla
			ID: 700638595 */
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //session variables
{
	?><html>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		
		</head>
		<body>
			<center><h2>Add E-Books</h2>
			<br>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<table>
					<tr> <td>Book Name *</td><td> <input type="text" name="bname" required="required"></td> </tr>
					<tr> <td>Author *</td><td> <input type="text" name="author" required="required" pattern="[a-z A-Z]*"></td> </tr> 
					<tr> <td>Publisher *</td><td> <input type="text" name="publisher" required="required" pattern="[a-z A-Z]*"></td> </tr>
					<tr> <td>Pages *</td><td> <input type="text" name="pages" required="required" pattern="[0-9]*"></td> </tr>  					 
					<tr> <td>Document *</td><td><input type="file" name="document" required="required"></td></tr>
					<tr> <td>&nbsp;</td></tr> 
				</table>
				<table style="margin-left: 130px">
				
				<tr> <td>&nbsp;</td></tr> 
				<tr><td colspan="2"><input style="background-color:orange;" id="button" type="submit" name="submit" value="Add Book"></td> </tr> 
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	
	
	include '../Db_Connection.php'; //database connection.
	
	if(isset($_REQUEST["submit"])) //set request on submit form.
	{
		//variables to hold document and its properties pairs.
		$docName = $_FILES['document']['name'];
		$docError = $_FILES['document']['error'];
		$docType = $_FILES['document']['type'];
		
		$error = array(); //array of errors.
		$allowedExts = array("doc", "docx","txt","pdf"); //extensions of files allowed.
		error_reporting(E_ERROR | E_PARSE); //run time error report.
		$extension = end(explode(".", $_FILES["document"]["name"])); //separate file name and hold string after . symbol
		
		if($docError > 0) //if errors occur.
		{
			$error['document'] = "Not Uploaded!!";
			echo "<h3 align=center>Not Uploaded!!</h3>";
		}
		else if(!(($docType == "image/doc") ||($docType == "image/txt") ||($docType == "image/docx") ||	($docType == "image/pdf")) &&!(in_array($extension, $allowedExts))) //check for file format.
		{
			echo $docType;
			
			$error['document'] = "Document type must doc,txt,docx,pdf!";
			echo "<h3 align=center>Document type must doc,txt,docx,pdf!</h3>";
		}		
		if(empty($error['document']))
		{
			$upload = move_uploaded_file($_FILES['document']['name'], '../Images/'.$docName); //move uploaded files to destination.
		
			$uploadDoc = '../Images/'.$docName;
		
			$status="True";
			$sql="insert into freebooks(BookName,Author,Publisher,Pages,Document,status) values('".$_POST["bname"]."','".$_POST["author"]."','".$_POST["publisher"]."','".$_POST["pages"]."','".$uploadDoc."','".$status."')"; //sql query.
			if ($conn->query($sql) === TRUE) { //check connection runs query successfully.
				echo "New E-Book successfully Added";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}		
			$conn->close(); //close connection
		}		
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	//head to home page if refresh.
}
?>