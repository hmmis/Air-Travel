<?php
	//-----------------------------getting all info of admin
	include("../SectionHome/config.php");
	//$UserName=$_SESSION["username"];
	$bookid=$_GET['DelId'];
	$class=$_GET['class'];
	
	//--------------------getting Saved ScheduleID
	$result=mysql_query("SELECT * FROM bookinfo WHERE id= '$bookid'");
	while($res=mysql_fetch_array($result)){
		$ScheduleID=$res['ScheduleID']; 	
		$TotalSeat=$res['TotalSeat'];
	}
	
	
	$result=mysql_query("SELECT * FROM flightrouteschedule WHERE Id= '$ScheduleID'");
	while($res=mysql_fetch_array($result)){
		$RemEconomy=$res['RemEconomy'];
		$RemBuisness=$res['RemBuisness'];
		$RemNormal=$res['RemNormal'];
	}
	
	//---------------------cancel
	$delete=mysql_query("DELETE FROM bookinfo WHERE id= '$bookid'");
	
	//---------------------------Update Seat
	if($class=="Economy"){
		$seat=$RemEconomy+$TotalSeat;
		$update2= mysql_query("UPDATE flightrouteschedule SET 
		RemEconomy='$seat'  WHERE Id= '$ScheduleID'");
		header("Location:User-BookInfo.php");
	}else if($class=="Business"){
		$seat=$RemBuisness+$TotalSeat;
		$update2= mysql_query("UPDATE flightrouteschedule SET 
		 RemBuisness='$seat'  WHERE Id= '$ScheduleID'");
		 header("Location:User-BookInfo.php");
	}else if($class=="Normal"){
		$seat=$RemNormal+$TotalSeat;
		$update2= mysql_query("UPDATE flightrouteschedule SET 
		RemNormal='$seat'  WHERE Id= '$ScheduleID'");
		header("Location:User-BookInfo.php");
	}
	
?>
