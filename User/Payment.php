<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid']))
{	
	$amount=$_SESSION['amount'];
	$bookingid=$_SESSION['bookingid'];
			
	?>
	
	<html>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		 <script language="javascript">
			$(document).ready(function(){ //readyfunction.
					
			 $('#payment2').submit(function() { //function on submit.
				//empty fields validations.
			 if($('#chname').val() == ''){
				 	alert("Please Enter Chardholder Name");				 	
				 	$('#chname').focus();
				 	return false;
				 }
			 if($('#bank').val() == ''){
				 	alert("Please Enter Bank Name");				 	
				 	$('#bank').focus();
				 	return false;
				 }
			 if($('#acc').val() == ''){
				 	alert("Please Enter Account Number");				 	
				 	$('#acc').focus();
				 	return false;
				 }
				 if($('#cardno').val() == ''){
					 	alert("Please Enter Card Number");				 	
					 	$('#cardno').focus();
					 	return false;
					 }cardno
				 if($('#cvv').val() == ''){
					 	alert("Please Enter CVV Number");				 	
					 	$('#cvv').focus();
					 	return false;
					 }		
			 if (!characters($('#chname').val())) { //characters validations
		            alert("Please Enter Only Characters");
		            $('#chname').val('');
		            $('#chname').focus();
		            return false;
		     }
			 if (!characters($('#bank').val())) {
		            alert("Please Enter Only Characters");
		            $('#bank').val('');
		            $('#bank').focus();
		            return false;
		     }
			 if (!numbers($('#acc').val())) { //number validations
		            alert("Please Enter Only Numbers");
		            $('#acc').val('');
		            $('#acc').focus();
		            return false;
		     }
			 if (!cardno($('#cardno').val())) { //16 digit card number validations.
		            alert("Please Enter Only 16 Digit Card Number");
		            $('#cardno').val('');
		            $('#cardno').focus();
		            return false;
		     }	 
			 if (!cvv($('#cvv').val())) { //3 digit cvv validations.
		            alert("Please Enter Only 3 Digit Cvv Number");
		            $('#cvv').val('');
		            $('#cvv').focus();
		            return false;
		     }	   	        			        			   		  
			 function numbers(input) {
			        var expr = /^[0-9]+$/;
			        return expr.test(input);
			    };
			    function cvv(input) {
			        var expr = /[0-9]{3}/;
			        return expr.test(input);
			    };
			    function cardno(input) {
			        var expr = /[0-9]{16}/;
			        return expr.test(input);
			    };	
			 function characters(input) {
			        var expr = /^[a-zA-Z ]+$/;
			        return expr.test(input);
			    };		
					//loads data from the server using post request and sending form data in serialize form after clicking submit button.
			    $.post("Payment_Action.php?"+$("#payment2").serialize(), { }, function(response){	//returns value from response page.		
			        if(response==1){			          
			           alert("Booking Successfully Completed");
			           window.location.href = "Summary.php";
			        }else{
			           alert("Please Try Again...");
			        }
				});	 
				return false;
			    });	
			 				
			});
			
		</script> 
		<body>	
			<center>
			<form method="POST" action="#null" name="payment2" id="payment2">
				<table>
					<tr><td>Booking Id</td><td> <input type="text" name="bid" id="bid" readonly="readonly" value="<?php echo  $bookingid; ?>"></td> </tr>
					<tr><td>Card Holder Name *</td><td> <input type="text" name="chname" id="chname"></td> </tr>
					<tr><td>Bank Name *</td><td> <input type="text" name="bank" id="bank"></td> </tr> 
					<tr><td>Type</td><td> <input type="radio" name="card" id="card" value="Debit" checked="checked">Debit
					<input type="radio" name="card" value="Credit">Credit</td> </tr>
					<tr><td>Acc No *</td><td> <input type="text" name="acc" id="acc"></td> </tr>
					<tr><td>Card No *</td><td> <input type="text" name="cardno" id="cardno"></td> </tr>	
					<tr><td>Cvv No *</td><td> <input type="text" name="cvv" id="cvv"></td> </tr>										
					<tr><td>Total Amount($)</td><td> <input type="text" name="amount" id="amount" required="required" value="<?php echo  $amount; ?>"></td></tr> 
					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2">
					<input id="button" type="submit" name="submit" value="Pay Now"></td> </tr> 
				
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