<?php
	include("../SectionHome/config.php");
	
	$newNoticeTitle=$_POST["noticetitle"];
	$newNoticeDetails=$_POST["noticedetails"];

	$id=$_POST["hiddenId"];
	$update= mysql_query("UPDATE noticeboard SET NoticeTitle='$newNoticeTitle' , NoticeDetails='$newNoticeDetails' WHERE NoticeId= '$id'");
	header("Location:Admin-NoticeArchive.php");
	
	
	
?>