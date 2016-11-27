<?php include("Session-Active.php");?> 
<?php
	include("../SectionHome/config.php");
	
	$newNoticeTitle=$_POST["noticetitle"];
	$newNoticeDetails=$_POST["noticedetails"];

	$adminUN=$_SESSION["username"];
	$update= mysql_query("DELETE From Admin WHERE Username= '$adminUN'");
	
	header("Location:../index.php");
	
	
	
?>