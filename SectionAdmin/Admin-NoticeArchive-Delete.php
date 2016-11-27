<?php
	include("../SectionHome/config.php");
	
	$newNoticeTitle=$_POST["noticetitle"];
	$newNoticeDetails=$_POST["noticedetails"];

	$deleteId=$_GET['id'];
	$update= mysql_query("DELETE From noticeboard WHERE NoticeId= '$deleteId'");
	
	header("Location:Admin-NoticeArchive.php");
	
	
	
?>