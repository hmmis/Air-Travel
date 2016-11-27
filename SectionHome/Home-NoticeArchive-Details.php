<!doctype html>
<html>
	<head>
	   <title>Air Travels Manamement</title>
	   
	   <?php include("Home-Link.html");?> 
	  
	</head>
	<body>
		<!-----------------------------------------Menu Bar-->
		<?php include("Home-MenuBar.html");?>
		
		<!------------------------------------------About Us-->
		<div class="noticeArchiveDetails">
			<?php
					$detailsId=$_GET['id'];
					include("../SectionHome/config.php");
					$result=mysql_query("SELECT * FROM noticeboard WHERE NoticeId= '$detailsId'");
					while($res=mysql_fetch_array($result)){
						$noticeTitle=$res['NoticeTitle'];
						$noticeDetais=$res['NoticeDetails'];	
						
					}
				?>
				
				<h1><?php echo $noticeTitle; ?></h1><br><br>
				<p><?php echo $noticeDetais; ?></p>
		</div>
		
		
		<!------------------------------------------Footer-->
		<?php include("Home-Footer.html");?>
	</body>
<html>
