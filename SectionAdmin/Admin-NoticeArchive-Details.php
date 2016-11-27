<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>Admin Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("Admin-SideBar.html");?>
		
		<div class="adminHead">
			<h1> Notice Archive<h1>
		</div>
		
		<div class="adminPageActivity" >
			<div class="noticeDetails">
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
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
