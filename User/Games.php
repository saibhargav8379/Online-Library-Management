<?php 
	/* created by Pothuguntla
		ID: 700638595 */
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //session variables set.
{
	?>
	<center>
	<br><br><br><br>
	<span style="font-size: 25px; font-weight: bold;">
	<a style= "color: black;"href="memoryGame.html">Memory Game</a>
	<br><br><br><br>
	
	<a style= "color: black;"href="spaceInvader.html">Space Invader</a>
	<br><br><br><br>
	
	<a style= "color: black;"href="TicTacToe.html">Tic Tac Toe</a>
	</span>
	</center>
	<?php
}

else
{		
	header('Refresh: 0; url=newfile.php');	
}
?>