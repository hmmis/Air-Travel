<?php include("Session-Active.php");?> 
<?php
	include("../SectionHome/config.php");

	$flightName = $_POST['flightName'];
	$result0=mysql_query("SELECT * FROM flightrouteschedule WHERE FlightRouteId like '$flightName%'");
	while($res=mysql_fetch_array($result0)){
		$id=$res['Id'];
		$result = mysql_query("DELETE FROM flightrouteschedule WHERE Id = '$id' ");
		$result2 = mysql_query("DELETE FROM bookinfo WHERE ScheduleID = '$id' ");
	}
	
	
	
	
	header("Location:Admin-ShowSchedule.php");
?>

