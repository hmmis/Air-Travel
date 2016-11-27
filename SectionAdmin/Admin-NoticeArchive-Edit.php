<?phpinclude("Session-Active.php");?>
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
		
		<div class="adminPageActivity" style="overflow-x:auto;">
			
			
			<?php
				//----------------------------Get Stroed value to put in textbox
				include("../SectionHome/config.php");
				$detailsId=$_GET['id'];
				$result=mysql_query("SELECT * FROM noticeboard WHERE NoticeId= '$detailsId'");
				while($res=mysql_fetch_array($result)){
					$noticeTitle=$res['NoticeTitle'];
					$noticeDetais=$res['NoticeDetails'];	
										
				}	
						
			?>
				
			<form class="AdminPostNewNotice" action="Admin-NoticeArchive-EditAction.php" method="Post">
				<b>Notice Title:</b><br>
				<input type="text" name="noticetitle" required value="<?php echo $noticeTitle; ?>"><br><br>
				<b>Notice Description:</b><br>
				<textarea name="noticedetails" required ><?php echo $noticeDetais; ?></textarea ><br><br>
				
				<input type="Submit" value="Edit Notice" name="update"><br><br>
				<input type="hidden" name="hiddenId" value="<?php echo $detailsId;?>">
			</form>
			
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
