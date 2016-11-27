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
			<h1> Post New Notice<h1>
		</div>
		
		<div class="adminPageActivity">
			<form class="AdminPostNewNotice" action="Admin-PostNewNoticeAction.php" method="Post">
				<b>Notice Title:</b><br>
				<input type="text" name="noticetitle" required><br><br>
				<b>Notice Description:</b><br>
				<textarea name="noticedetails" required placeholder="Write Description..............."></textarea ><br><br>
				
				<input type="Submit" value="Post Notice"><br><br>
				
			</form>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
