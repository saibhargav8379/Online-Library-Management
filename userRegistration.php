<html>
	<head>
		<!-- Created by Pothuguntla
			ID: 700638595. -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	 <script language="javascript">
		$(document).ready(function(){ //on ready function.
				
		 $('#registration').submit(function() { //function on submit.
			//check for empty field validations.
		 if($('#stdid').val() == ''){
			 	alert("Please Enter User ID");				 	
			 	$('#stdid').focus();
			 	return false;
			 }
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
		 if($('#pwd').val() == ''){
			 	alert("Please Enter Password");				 	
			 	$('#pwd').focus();
			 	return false;
			 }
		 if($('#cnpwd').val() == ''){
			 	alert("Please Enter Confirm Password");				 	
			 	$('#cnpwd').focus();
			 	return false;
			 }
		 if (!UserID_Validate($('#stdid').val())) { //check for user id validation.
	            alert("Please Enter Valid User ID");
	            $('#stdid').val('');
	            $('#stdid').focus();
	            return false;
	     }
		 if (!Mobile_Validate($('#mobile').val())) { //check for mobile validations
	            alert("Please Enter Valid Mobile Number");
	            $('#mobile').val('');
	            $('#mobile').focus();
	            return false;
	     }
		 
			 
		 if (!Email_Validate($('#email').val())) { //check for email validation
	            alert("Please Enter Valid EmailId. Please try again later..");
	            $('#email').val('');
	            $('#email').focus();
	            return false;
	     }
		 if($('#pwd').val() != $('#cnpwd').val()){ //check for cnpwd validation.
			 	alert("Password and Confirm Password Doesn't Match.");			 	
				$('#pwd').val('');
			 	$('#cnpwd').val('');
			 	$('#pwd').focus();
			 	return false;
		 }	 
			   	        			        			   		  
		 function Mobile_Validate(input) {
		        var expr = /[0-9]{10}/;
		        return expr.test(input);
		    };
		 function UserID_Validate(input) {
		        var expr = /700[0-9]{6}/;
		        return expr.test(input);
		    };
		 function Email_Validate(input) {
		        var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@ucmo.edu/;
		        return expr.test(input);
		    };
			//loads data from the server using post request and sending form data in serialize form after clicking submit button.
		    $.post("registration.php?"+$("#registration").serialize(), { }, function(response){	//process response from response page.		
		        if(response==1){
		          clear();
		           alert("Student Registration Successfully Completed");
		        }else{
		           alert("Registration Failed. Please Try Again...");
		        }
			});
			return false;
		    });	
		 function clear()
	     {	//This function clears all the fields.
			 $("#stdid").val('');
	        $("#fname").val('');
	        $("#lname").val('');
	        $("#email").val('');
	        $("#mobile").val('');	        
	        $("#pwd").val('');
	        $("#cnpwd").val('');	        	       
	     }	
		 
		});
		
	</script> 
	<body>
		<center><h2><span>User Registration</span></h2>
		<form id="registration" name="registration" action="#null" method="post"> 
			<table>
				<tr> <td>700# *</td><td> <input type="text" name="stdid" id="stdid"></td> </tr>
				<tr> <td>First Name *</td><td> <input type="text" name="fname" id="fname"></td> </tr> 
				<tr> <td>Last Name *</td><td> <input type="text" name="lname" id="lname"></td> </tr> 
				<tr> <td>Mobile Number *</td><td> <input type="text" name="mobile" id="mobile"></td> </tr>
				<tr> <td>Email Id *</td><td> <input type="text" name="email" id="email" placeholder="example@ucmo.edu"></td> </tr> 
				<tr> <td>Password *</td><td> <input type="password" name="pwd" id="pwd"></td> </tr> 
				<tr> <td>Confirm Password *</td><td> <input type="password" name="cnpwd" id="cnpwd"></td> </tr>
				<tr> <td>Gender *</td><td> <input type="radio" name="gender" id="gender" value="Male" checked="checked">Male
				<input type="radio" name="gender" value="Female">Female</td> </tr>
				<tr><td>&nbsp;</td></tr>
				<tr align="center"> <td colspan="2"><input style="background-color:orange;" id="button" type="submit" name="submit" value="Register"></td> </tr> 
			</table>
		</form>
	</body>
</html>