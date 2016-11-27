<html>
	<head>
		<!------------------------------------For Model Form-->
	   <script src="../js/jquery.js"></script>
	   <script src="../js/jquery-ui.js"></script>
	   <link rel="stylesheet" href="../css/jquery-ui-sunny.css">
	   <script src="../js/modelFormScript-UpdateAdminInfo.js"></script>
	   
	   <script>
		function validate(){
			var x=document.getElementById("PW").value;
			var y=document.getElementById("matchPW").value;
			document.getElementById("message").style.color = "red";
			document.getElementById("message").style.fontSize = "12px";
				
			if(x.length<4){
				document.getElementById("message").innerHTML="New Password::at least 4 character";
				return false;
			}else if(x!=y){
				
				document.getElementById("message").innerHTML="Password Not Natched";
				return false;
			}else{
				
				return true;
			}
		
		}
	   </script>
	</head>
	
	<body>
		
		<!-------------------------------------Model Form-->
		<div id="dialog-1formPW" title="Change Password">
		
			<form action="Admin-ModelForm-UpdateAdminPWAction.php" method="post" onsubmit="return(validate())">
			Current Password<br>
			<input type="password" name="currentPW" value="" required><br>
			New Password<br>
			<input type="password" name="newPW" id="PW" value="" required><br>
			Re Enter New Password<br>
			<input type="password" name="reNewPW" id="matchPW" value="" required><br>
			
			<p id="message"><p>
			<!-- Allow form submission with keyboard without duplicating the dialog button -->
			<input type="submit" value="Change Password">
			
			
			</form>
		</div>
	</body>
</html>		