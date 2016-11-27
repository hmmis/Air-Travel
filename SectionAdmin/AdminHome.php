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
			<h1> Admin Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			<?php
			//-----------------------------getting all info of admin
				include("../SectionHome/config.php");
				$adminUN=$_SESSION["username"];
				$result=mysql_query("SELECT * FROM admin WHERE username= '$adminUN'");
				while($res=mysql_fetch_array($result)){
					$Name=$res['Name'];
					$Email=$res['Email'];
					$Mobile=$res['Mobile'];
					$Address=$res['Address'];	
					
				}
			?>
			<p>UserName ::<?php echo $adminUN; ?><p>
			<p>Name ::<?php echo $Name; ?></p>
			<p>Email ::<?php echo $Email; ?></p>
			<p>Mobile ::<?php echo $Mobile; ?></p>
			<p>Address ::<?php echo $Address; ?></p>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
