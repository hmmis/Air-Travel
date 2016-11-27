<?php include("Session-Active.php");?> 
<?php

	$name=$_POST["name"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];
	
	include("../SectionHome/config.php");
	$adminUN=$_SESSION["username"];
	$update= mysql_query("UPDATE admin SET Name='$name' , Email='$email' , 
						Mobile='$mobile',Address='$address' WHERE Username= '$adminUN'");
	
	header("Location:AdminHome.php");
?>