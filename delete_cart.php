<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["tour_id"][$Line] = "";
	
	//$_SESSION['adult'][$Line] = "";
	//$_SESSION['child'][$Line] = "";
	//$_SESSION['bookingdate'][$Line] = "";
	//$_SESSION["strQty"][$Line] = "";

	header("location:cart.php");
?>
