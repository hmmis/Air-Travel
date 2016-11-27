<?php include("Session-Active.php");?> 
<?php
	include("../SectionHome/config.php");

	$id = $_GET['delId'];

	
	$result = mysql_query("DELETE FROM flightrouteschedule WHERE Id='$id' ");
	$result2 = mysql_query("DELETE FROM bookinfo WHERE ScheduleID='$id' ");
	
	header("Location:Admin-ShowSchedule.php");
?>

