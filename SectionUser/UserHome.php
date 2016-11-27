<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>User Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("User-SideBar.html");?>
		
		<div class="adminHead">
			<h1> User Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			<?php
			//-----------------------------getting all info of admin
				include("../SectionHome/config.php");
				$UserName=$_SESSION["username"];
				$result=mysql_query("SELECT * FROM userinfo WHERE UserName= '$UserName'");
				while($res=mysql_fetch_array($result)){
					$Email=$res['Email'];
					$Mobile=$res['Mobile'];
					$Account=$res['Account'];
					$Passport=$res['Passport'];	
					
				}
			?>
			<p>UserName ::<?php echo $UserName; ?><p>
			<p>Email ::<?php echo $Email; ?></p>
			<p>Mobile ::<?php echo $Mobile; ?></p>
			<p>Account ::<?php echo $Account; ?></p>
			<p>Passport ::<?php echo $Passport; ?></p>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("User-Footer.html");?>
		
	</body>
<html>
