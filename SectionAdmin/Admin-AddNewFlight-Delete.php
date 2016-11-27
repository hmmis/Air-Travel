<?php include("Session-Active.php");?> 
<?php
	include("../SectionHome/config.php");

	$id = $_GET['delId'];

	
	$result = mysql_query("DELETE FROM flightinfo WHERE FlightId='$id' ");

	
	header("Location:Admin-AddNewFlight.php");
?>

