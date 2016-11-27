<?php
	$UN=$_POST["username"];
	$PW=$_POST["password"];
	$Name=$_POST["name"];
	$Email=$_POST["email"];
	$Mobile=$_POST["mobile"];
	$Address=$_POST["address"];
	
	include("../SectionHome/config.php");
	$insert=mysql_query("INSERT INTO admin(username,password,name,email,mobile,address)
			VALUES('$UN' , '$PW' , '$Name' , '$Email' , '$Mobile' , '$Address' )");
	header("Location:AdminHome.php");
?>