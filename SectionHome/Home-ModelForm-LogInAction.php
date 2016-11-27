<?php
	include("config.php");
	
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$queryAdmin="SELECT * FROM admin WHERE Username = '$username' AND Password = '$password' ";
	$resultAdmin = mysql_query($queryAdmin); 
	
	$queryUser="SELECT * FROM userinfo WHERE Username = '$username' AND Password = '$password' ";
	$resultUser = mysql_query($queryUser); 
	if( mysql_num_rows($resultUser)==1){
		//Username Password match
		session_start();
		$_SESSION["username"] = "$username";
		
		header("Location:../SectionUser/UserHome.php");
		
	}else if( mysql_num_rows($resultAdmin)==1){
		//Username Password match
		session_start();
		$_SESSION["username"] = "$username";
		
		header("Location:../SectionAdmin/AdminHome.php");
		
	}
	else{
		//Username Password  not match
		header("Location:Home-LogInFailed.php");
	}
?>