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
				if(isset($_POST['BookAsOld'])){
					$username=$_POST['usernameOld'];
					$password=$_POST['passwordOld'];
					
					include("config.php");
					$result = mysql_query("SELECT * FROM userinfo WHERE Username = '$username' and Password = '$password'");
					if(mysql_num_rows($result)==1){
						//-------------------------------------Username Password matched
						$totalSeat=$_POST['totalSeat'];
						$scheduleId=$_POST['scheduleId'];
						$class=$_POST['class'];
						$pricePerSeat=$_POST['pricePerSeat'];
						
						
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
							
							
							$book = mysql_query("INSERT INTO bookinfo(Username, ScheduleID,Class, TotalSeat, CostPerSeat)
							VALUES('$username','$scheduleId','$class','$totalSeat', '$pricePerSeat' )");
							
							
							$updateSchedule = mysql_query("UPDATE flightrouteschedule SET $colmnName ='$remSeat' WHERE Id= '$scheduleId' ");
		
							
							echo "<font color='green'>You Book The Ticket Successfully <br>";
							echo "<font color='green'>Now Log In Your Account to manipulate Your Data <br>";
						}else{
							echo "<font color='red'> Your No. of selected Seat  is not abaliable <br>";
						}
					}
					else{
						echo "<font color='red'> Wrong Username Password <br>";
						
					}
					
					
				}
			
			?>
		</div>
		
		
		<!------------------------------------------Footer-->
		<?php include("Home-Footer.html");?>
	</body>
<html>
