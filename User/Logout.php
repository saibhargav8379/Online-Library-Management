<?php
	/* created by Pothuguntla
		ID: 700638595. */
	session_start(); //start session.
	session_unset(); //unset values in session.
	session_destroy(); //destroy session.
	header('Location:../Index.php'); //head location to index page.
?>