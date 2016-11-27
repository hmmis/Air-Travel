<?php include("Session-Active.php");?> 
<?php

	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$account=$_POST["account"];
	$passport=$_POST["passport"];
	
	include("../SectionHome/config.php");
	$UserName=$_SESSION["username"];
	$update= mysql_query("UPDATE userinfo SET Email='$email' , 
						Mobile='$mobile',Account='$account',Passport='$passport' WHERE Username = '$UserName'");
	
	header("Location:UserHome.php");
?>