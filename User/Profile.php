<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
include '../Db_Connection.php';
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid']))
{
	$id=$_SESSION['stdid'];
	
	$sql="select * from student where studentid='".$id."'";
	$res=$conn->query($sql);
	if($res->num_rows>0)
	{
		if($row=$res->fetch_assoc())
		{
			$fname=$row["firstname"];
			$lname=$row["lastname"];
			$ph=$row["mobile"];
			$email=$row["emailid"];
			$gender=$row["gender"];		
		}
	}
	
	?>
	
	<html>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	 <script language="javascript">
		$(document).ready(function(){ //on ready function.
				
		 $('#profile').submit(function() { //function on submit.

		//check for empty field validations.
		 if($('#fname').val() == ''){
			 	alert("Please Enter First Name");				 	
			 	$('#fname').focus();
			 	return false;
			 }
		 if($('#lname').val() == ''){
			 	alert("Please Enter Last Name");				 	
			 	$('#lname').focus();
			 	return false;
			 }
		 if($('#mobile').val() == ''){
			 	alert("Please Enter Mobile Number");				 	
			 	$('#mobile').focus();
			 	return false;
			 }
		 
		 
		 if (!Mobile_Validate($('#mobile').val())) { //check for mobile validation.
	            alert("Please Enter Valid Mobile Number");
	            $('#mobile').val('');
	            $('#mobile').focus();
	            return false;
	     }
		 if($('#mobile').val().length != 10){
			 	alert("InValid Mobile Number! Please try again later..");
			 	$('#mobile').val('');
			 	$('#mobile').focus();
			 	return false;
			 }
			 
		 if (!Email_Validate($('#email').val())) { //check for email validation.
	            alert("Please Enter Valid EmailId. Please try again later..");
	            $('#email').val('');
	            $('#email').focus();
	            return false;
	     }
		   	        			        			   		  
		 function Mobile_Validate(input) {
		        var expr = /[0-9]{10}/;
		        return expr.test(input);
		    };
		
		 function Email_Validate(input) {
		        var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@ucmo.edu/;
		        return expr.test(input);
		    };
			//loads data from the server using post request and sending form data in serialize form after clicking submit button.
		    $.post("Profile_Action.php?"+$("#profile").serialize(), { }, function(response){	//returns value from response page.			
		        if(response==1){		          
		           alert("Profile Updated Successfully");
		        }else{
		           alert("Please Try Again...");
		        }
			});
			return false;
		    });	
		 
		});
		
	</script> 
		</head>
		<body>
			<center><h2><span>Profile</span></h2>
			<br>
			<form method="POST" id="profile" name="profile" action="Profile.php">			
				<table>
					<tr><td>700#</td><td> <input type="text" name="stdid" id="stdid" readonly="readonly" value="<?php echo  $id; ?>"></td> </tr>
					<tr><td>First Name *</td><td> <input type="text" name="fname"  id="fname" value="<?php echo  $fname; ?>"></td> </tr> 
					<tr> <td>Last Name *</td><td> <input type="text" name="lname" id="lname" value="<?php echo  $lname; ?>"></td> </tr> 
					<tr> <td>Email Id *</td><td> <input type="text" name="email" id="email" readonly="readonly" value="<?php echo  $email; ?>"></td> </tr> 
					<tr> <td>Phone Number *</td><td> <input type="text" name="mobile" id="mobile" value="<?php echo  $ph; ?>"></td> </tr>
					<tr> <td>Gender</td><td> <input type="radio" name="gender" id="gender" value="Male" <?php if($gender=='Male') echo 'checked="checked"'?>>Male
					<input type="radio" name="gender" value="Female" <?php if($gender=='Female') echo 'checked="checked"'?>>Female </td> </tr>  
					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Update"></td> </tr> 
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