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
		<div class="classAboutUs">
			<?php
				if(isset($_POST['BookAsNew'])){
					$username=$_POST['username'];
					$totalSeat=$_POST['totalSeat'];
					$scheduleId=$_POST['scheduleId'];
					$class=$_POST['class'];
					
					
					include("config.php");
					$result = mysql_query("SELECT * FROM userinfo WHERE Username = '$username' ");
					
					
					if(mysql_num_rows($result)>0){
						//--------------------if given username exist then show error
						echo "<font color='red'> This username is already a Old User <br>";
						echo "<font color='red'> Book Ticket As Old User or Set New Username<br>";
					}
					else{
						//----------------------if username is New
						$seat = mysql_query("SELECT * FROM  flightrouteschedule WHERE Id = '$scheduleId' ");
						while($res= mysql_fetch_array($seat)){
							//-----------------------------find the remaining Seat
							$RemEconomy=$res['RemEconomy']; 
							$RemBuisness=$res['RemBuisness'];
							$RemNormal=$res['RemNormal'];
							
						}
						//---------------check for valied Seat
						if($class=="Economy" && $RemEconomy>=$totalSeat ){
							$allOk=true;
							$colmnName="RemEconomy";
							$remSeat=$RemEconomy-$totalSeat;
						}else if($class=="Business" && $RemBuisness>=$totalSeat){
							$allOk=true;
							$colmnName="RemBuisness";
							$remSeat=$RemBuisness-$totalSeat;
						}else if($class=="Normal" && $RemNormal>=$totalSeat){
							$allOk=true;
							$colmnName="RemNormal";
							$remSeat=$RemNormal-$totalSeat;
						}else{
							$allOk=false;
						}
						//--------------------------------------------insert Book
						if($allOk==true){
							$password=$_POST['password'];
							$email=$_POST['email'];
							$mobileNo=$_POST['mobileNo'];
							$AccountNo=$_POST['AccountNo'];
							$passportNo=$_POST['passportNo'];
							
							
							
							$pricePerSeat=$_POST['pricePerSeat'];
							
							
							$insertUser = mysql_query("INSERT INTO userinfo(Username, Password,Email, Mobile, Account, Passport)
							VALUES('$username','$password','$email','$mobileNo', '$AccountNo','$passportNo' )");
							
							$book = mysql_query("INSERT INTO bookinfo(Username, ScheduleID,Class, TotalSeat, CostPerSeat)
							VALUES('$username','$scheduleId','$class','$totalSeat', '$pricePerSeat' )");
							
							
							$updateSchedule = mysql_query("UPDATE flightrouteschedule SET $colmnName ='$remSeat' WHERE Id= '$scheduleId' ");
		
							
							echo "<font color='green'>You Book The Ticket Successfully <br>";
							echo "<font color='green'>Now Log In Your Account to manipulate Your Data <br>";
						}else{
							echo "<font color='red'> Your No. of selected Seat  is not abaliable <br>";
						
						}
						
					}
					
				}
			
			?>
		</div>
		
		
		<!------------------------------------------Footer-->
		<?php include("Home-Footer.html");?>
	</body>
<html>
