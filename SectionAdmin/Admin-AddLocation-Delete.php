<?php include("Session-Active.php");?> 
<?php
	include("../SectionHome/config.php");

	$id = $_GET['delId'];

	
	$result = mysql_query("DELETE FROM location WHERE LocID='$id' ");

	
	header("Location:Admin-AddLocation.php");
?>

