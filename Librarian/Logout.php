<?php
		/*Created by Pothuguntla
			ID: 700638595 */
	session_start();
	session_unset(); //unset session
	session_destroy(); //destroy session
	header('Location:../Index.php'); //head locaion to main index.
?>