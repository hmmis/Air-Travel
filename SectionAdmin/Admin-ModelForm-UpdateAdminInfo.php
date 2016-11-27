<html>
	<head>
		<!------------------------------------For Model Form-->
	   <script src="../js/jquery.js"></script>
	   <script src="../js/jquery-ui.js"></script>
	   <link rel="stylesheet" href="../css/jquery-ui-sunny.css">
	   <script src="../js/modelFormScript-UpdateAdminInfo.js"></script>
	</head>
	
	<body>
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
		<!-------------------------------------Model Form-->
		<div id="dialog-1form" title="Update Admin Info">
			<form action="Admin-ModelForm-UpdateAdminInfoAction.php" method="post">
			Name<br>
			<input type="text" name="name"  required value="<?php echo $Name; ?>"><br>
			Email<br>
			<input type="email" name="email" required value="<?php echo $Email; ?>"><br>
			Mobile<br>
			<input type="text" name="mobile"  required value="<?php echo $Mobile; ?>"><br>
			Address<br>
			<input type="text" name="address" value="<?php echo $Address; ?>"><br><br>
				 
			<!-- Allow form submission with keyboard without duplicating the dialog button -->
			<input type="submit" value="Update">
			
			</form>
		</div>
	</body>
</html>		