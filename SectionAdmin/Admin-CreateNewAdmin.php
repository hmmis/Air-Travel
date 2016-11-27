<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>Admin Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   
	   <script >
	   function Validation(){
		  var unl=document.getElementById("UN").value.length;
		  var pw=document.getElementById("PW").value;
		  var pwl=document.getElementById("PW").value.length;
		  var cpw=document.getElementById("cPW").value;
		  
			if(unl!=5){
				document.getElementById("message1").innerHTML="Username:5 character";
				return false;
			}else if(pwl<4){
				document.getElementById("message2").innerHTML="New Password::at least 4 character";
				return false;
			}else if(pw!=cpw){
				document.getElementById("message3").innerHTML="Password Not Natched";
				return false;
			}else{
				return true;
			}
	   }
	   </script>
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("Admin-SideBar.html");?>
		
		<div class="adminHead">
			<h1> Admin Home<h1>
		</div>
		
		<div class="adminPageActivity formNewAdmin">
			<form action="Admin-CreateNewAdminAction.php" method="post" onsubmit="return(Validation())">
				Username:
				<input type="text" name="username" id="UN" required>
				<p id="message1"></p><br><br>
				Password:
				<input type="password" name="" id="PW" required>
				<p id="message2"></p><br><br>
				
				Confirm Password:
				<input type="password" name="password" id="cPW"required>
				<p id="message3"></p><br><br>
				
				Name:
				<input type="text" name="name" required><br><br>
				Email:
				<input type="email" name="email" required><br><br>
				Mobile:
				<input type="number" name="mobile" required><br><br>
				Addess:
				<input type="text" name="address"><br><br>
				
				<input type="Submit" name="" value="Create New Admin"><br><br>
			</form>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
