<?php
	include("Session-Active.php");
	
	$noticeTitle=$_POST["noticetitle"];
	$noticeDetails=$_POST["noticedetails"];
	$postedby=$_SESSION["username"];
	
	date_default_timezone_set("Asia/Dhaka");
	$postTime = date("h:i:sa d/m/y");
	
	include("../SectionHome/config.php");
	$result = mysql_query("INSERT INTO noticeboard(NoticeTitle, NoticeDetails ,NoticePostedBy ,NoticePostedTime) VALUES('$noticeTitle','$noticeDetails' , '$postedby' , '$postTime')");
	
	header("Location:Admin-NoticeArchive.php");
?>