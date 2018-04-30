<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //checking whether session values are set or not for login.
{
	?>
	<html>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
			 <script language="javascript">
				$(document).ready(function(){ //ready function.
						
				 $('#addpaidbooks').submit(function() { //on submit.
					//check for empty validations.
				 if($('#bname').val() == ''){
					 	alert("Please Enter Book Name");				 	
					 	$('#bname').focus();
					 	return false;
					 }
				 
				 if($('#author').val() == ''){
					 	alert("Please Enter Author Name");				 	
					 	$('#author').focus();
					 	return false;
					 }
				 if($('#publisher').val() == ''){
					 	alert("Please Enter Publisher");				 	
					 	$('#publisher').focus();
					 	return false;
					 }
				 if($('#pages').val() == ''){
					 	alert("Please Enter Pages");				 	
					 	$('#pages').focus();
					 	return false;
					 }
				 if($('#cost').val() == ''){
					 	alert("Please Enter Cost");				 	
					 	$('#cost').focus();
					 	return false;
					 }
				 if($('#photo').val() == ''){
					 	alert("Please Upload Photo");				 	
					 	$('#photo').focus();
					 	return false;
					 }
				 if (!characters($('#author').val())) { //check for characters validations.
			            alert("Please Enter Only Characters");
			            $('#author').val('');
			            $('#author').focus();
			            return false;
			     }
				 if (!characters($('#publisher').val())) {
			            alert("Please Enter Only Characters");
			            $('#publisher').val('');
			            $('#publisher').focus();
			            return false;
			     }
				 if (!numbers($('#pages').val())) { //check for number validations.
			            alert("Please Enter Only Numbers");
			            $('#pages').val('');
			            $('#pages').focus();
			            return false;
			     }
				 if (!numbers($('#cost').val())) {
			            alert("Please Enter Only Numbers");
			            $('#cost').val('');
			            $('#cost').focus();
			            return false;
			     }	 
					   	        			        			   		  
				 function numbers(input) { //numbers validations function
				        var expr = /^[0-9]+$/;
				        return expr.test(input); //test for match in the string.
				    };
				 function characters(input) { //character validation function.
				        var expr = /^[a-zA-Z ]+$/;
				        return expr.test(input); //test for match in the string.
				    };				
				 
					return false;
				    });	
		
				 
				});
				
			</script>
		</head>
		<body>
			<center><h2>Add Library Books</h2>
			<br>
			<form method="POST" action="addBooks.php" enctype="multipart/form-data">
				<table>
					<tr> <td>Book Name *</td><td> <input type="text" name="bname" id="bname" required="required" pattern="[a-z A-Z]*"></td> </tr>
					<tr> <td>Author *</td><td> <input type="text" name="author" id="author" required="required" pattern="[a-z A-Z]*"></td> </tr> 
					<tr> <td>Publisher *</td><td> <input type="text" name="publisher" id="publisher" required="required" pattern="[a-z A-Z]*"></td> </tr>
					<tr> <td>Pages *</td><td> <input type="text" name="pages"  id="pages" required="required" pattern="[0-9]*"></td> </tr>  						 
					<tr> <td>Cost($) *</td><td> <input type="text" name="cost" id="cost" required="required" pattern="[0-9]*"></td> </tr>
					<tr> <td>Image *</td><td><input type="file" name="photo" id="photo" required="required"></td></tr>
					<tr> <td>&nbsp;</td></tr>
				</table>
				<table style="margin-left: 130px">
				
					<tr> <td>&nbsp;</td></tr> 
					<tr align="center"><td colspan="2"><input style="background-color:orange;" id="button" type="submit" name="submit" value="Add Book"></td> </tr> 
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	
	include '../Db_Connection.php';
	if(isset($_REQUEST["submit"])) //check to set value to request method to post the form data into server.
	{
		//creating variables to hold the file name and its properties.
		$imgName = $_FILES['photo']['name']; 
		$imgError = $_FILES['photo']['error'];
		$imgType = $_FILES['photo']['type'];
		$error = array();
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		error_reporting(E_ERROR | E_PARSE); // Report simple running errors.
		$extension = end(explode(".", $_FILES["photo"]["name"])); //exploding file name with . symbol.
		
		if($imgError > 0) //checking imgError is not empty.
		{
			$error['photo'] = "Not Uploaded!!"; //sending the error to error array.
			echo "<h3 align=center>Not Uploaded!!</h3>";
		}
		else if(!(($imgType == "image/gif") ||($imgType == "image/jpeg") ||	($imgType == "image/jpg") ||($imgType == "image/x-png") ||($imgType == "image/png") ||($imgType == "image/pjpeg")) &&!(in_array($extension, $allowedExts))) //checking whether extensions are not present in array.
		{
			$error['photo'] = "Image type must jpg, jpeg, gif, or png!";
			echo "<h3 align=center>Image type must jpg, jpeg, gif, or png!</h3>";
		}
		
		if(empty($error['photo']))
		{
			$upload = move_uploaded_file($_FILES['photo']['name'], '../Images/'.$imgName); //Move uploaded file into destination.
		
			$uploadImage = '../Images/'.$imgName;
		
			$status="True";
			$sql="insert into books(BookName,Author,Publisher,Pages,Cost,Image,status) values('".$_POST["bname"]."','".$_POST["author"]."','".$_POST["publisher"]."','".$_POST["pages"]."','".$_POST["cost"]."','".$uploadImage."','".$status."')";
			if ($conn->query($sql) === TRUE) {
				echo "New Book successfully Added";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}		
			$conn->close(); //closing the connection.
		}		
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>