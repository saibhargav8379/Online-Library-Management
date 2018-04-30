<?php
		/* created by Pothuguntla
			ID: 700638595 */
session_start(); //start session
if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check session variables are set.
{
	?>
	<html>
		<body>
			<center>
			<h1><span style="color: black;"> Library Management System
				<br>
				<br>
				<?php
				
				echo "Welcome to... Admin";
				
				?>
			</span>
			</h1>
			<img src="../Images/library2.jpg" width="550" height="290" alt="Natural" />
		</body>
	<?php 
	}
	else
	{
		header('Refresh: 0; url=newfile.php');	
	}
	?>
