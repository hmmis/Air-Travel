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
			<form action="UserHome -UpdateInfoAction.php" method="POST">
				<p>UserName ::<?php echo $UserName; ?><p>
				Email:
				<input type="email" name="email" value="<?php echo $Email; ?>"><br><br>
				Mobile:
				<input type="number" name="mobile" value="<?php echo $Mobile; ?>"><br><br>
				Account:
				<input type="Account" name="account" value="<?php echo $Account; ?>"><br><br>
				Passport:
				<input type="Account" name="passport" value="<?php echo $Passport; ?>"><br><br>
				
				<input type="submit" value="Update" name="submit">
			</form>
			
			
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("User-Footer.html");?>
		
	</body>
<html>
