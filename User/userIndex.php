<!DOCTYPE  html>
<html>
		<!-- Created by Pothuguntla
			ID: 700638595. -->
	<head>
		<title>UCM Library Management</title>			
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />	
		<link rel="stylesheet" media="screen" href="../css/libraryStyles.css" /> 
	</head>
	<body>	
		<?php 
		session_start();
		if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid']))
		{
		?>
				<div id="wrapper">			
					<div id="header">
						<div id="logo">
							<img src="../Images/logo.png" width="130px" height="85px"/>
						</div>
						
						<div style="margin-left: 250px;">
						<img style = "top:7.5px; position: absolute;" src="../Images/name.png" width="830px" height="95px"/>
						</div>
													
						<ul id="nav" class="sf-menu">		
						<li style="margin-left: 100px"><a href="Home.php" target="library"><span>Home</span></a></li>								
							<li><a href="Profile.php" target="library"><span>Profile</span></a></li>
							<li><a href="#" target="library"><span>Search Books</span></a>
							<ul>
								<li><a href="searchFreeBooks.php" target="library"><span>E-Books</span></a></li>
								<li><a href="searchBooks.php" target="library"><span>Library Books</span></a></li>							
							</ul>
							</li>	
							<li><a href="viewAllBooks.php" target="library"><span>Rent Book</span></a></li>									
							<li><a href="viewMyBookings.php" target="library"><span>View Bookings</span></a></li>
							<li><a href="Feedback.php" target="library"><span>Feedback</span></a></li>
							<li><a href="Games.php" target="library"><span>Games</span></a></li>
							<li><a href="ChangePassword.php" target="library"><span>Change Password</span></a></li>
							<li><a href="Logout.php" target="_parent"><span>Logout</span></a></li>
						</ul>
					</div>
					<iframe id="library" name="library" src="Home.php" style="margin-top: -45px; border-color: black" height="457px" width="99.5%"></iframe>
					<div id="footer">				
						<div id="bottom" style="margin-top: 1px">
						   <span style="font-size: 15px;font-weight: bold;color: #FFE4C4">UCM Library Management System</span>
						</div>
					</div>
				</div>
				<?php 
				}
				else
				{
					echo "Your Session is Closed... Please Login Again...";
					header('Refresh: 2; url=../Index.php');
				}
				?>
	</body>		
</html>