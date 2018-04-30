<?php 
	/*created by Pothuguntla
		ID: 700638595 */
include '../Db_Connection.php'; //db connection.
session_start(); //start session.
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variable stdid.
{
	$email=$_SESSION['useremail']; //holding session variable useremail.
	$userpwd=$_SESSION['userpwd']; //holding session variable password.
	?>
	
	<html>
		<head>	
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		 <script language="javascript">
			$(document).ready(function(){ //ready function.
					
			 $('#changepassword').submit(function() { //function on submit.
				//check for empty fields.
			 if($('#oldpwd').val() == ''){
				 	alert("Please Enter Old Password");				 	
				 	$('#oldpwd').focus();
				 	return false;
				 }
			 if($('#newpwd').val() == ''){
				 	alert("Please Enter New Password");				 	
				 	$('#newpwd').focus();
				 	return false;
				 }
			 if($('#cnpwd').val() == ''){
				 	alert("Please Enter Confirm Password");				 	
				 	$('#cnpwd').focus();
				 	return false;
				 }	
			 	 
			 if($('#newpwd').val() != $('#cnpwd').val()){ //new password and confirm password do not match.
				 	alert("Password and Confirm Password Doesn't Match.");			 	
				 	$('#cnpwd').val(''); //make cnpwd empty.
				 	$('#cnpwd').focus(); //cursor to cnpwd.
				 	return false;
			 }
			 if($('#oldpwd').val() != $('#pwd').val()){
				 	alert("Old Password is Wrong. Please Try Again");			 	
				 	$('#oldpwd').val('');
				 	$('#oldpwd').focus();
				 	return false;
			 }
			 //loads data from the server using post request and sending form data in serialize form after clicking submit button.
			 $.post("ChangePwd.php?"+$("#changepassword").serialize(), { }, function(response){	//process response from the response page.		
			        if(response==1){	
			        	clear();		          
			           alert("Password Updated Successfully");
			        }else{
			           alert("Please Try Again...");
			        }
				});	 
				return false;
			    });	
			 function clear()
		     {		//clears all fields.
				 $("#oldpwd").val('');
		        $("#newpwd").val('');
		        $("#cnpwd").val('');		                	      
		     }	
			 
			});
			
		</script> 
		</head>
		<body>
			<center><h2><span>Change Password</span></h2>
			<br>
			<form method="POST" action="#null" name="changepassword" id="changepassword"> 
				<table>
				  
					<tr> <td>Email ID</td><td> <input type="text" name="uname" id="uname" readonly="readonly" value="<?php echo  $email; ?>"></td> </tr> 
					<tr> <td>Old Password</td><td> <input type="password" name="oldpwd" id="oldpwd"></td> </tr> 
					<tr> <td>New Password</td><td> <input type="password" name="newpwd" id="newpwd"></td> </tr>
					<tr> <td>Confirm Password</td><td> <input type="password" name="cnpwd" id="cnpwd"></td> </tr> 
					 <tr> <td></td><td> <input type="hidden" name="pwd" id="pwd" value="<?php echo  $userpwd; ?>"></td> </tr>
					<tr><td>&nbsp;</td></tr> 
					<tr align="center"> <td colspan="2"><input style="background-color:orange;" id="button" type="submit" name="submit" value="Change"></td> </tr> 
					
				</table>
			</form>
		</body>
	</html>
	
	<?php 	
}

else
{		
	header('Refresh: 0; url=newfile.php');	
}
?>