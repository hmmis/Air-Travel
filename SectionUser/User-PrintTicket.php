<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>User Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   <link href="../css/tableCSS.css" rel="stylesheet">
	   
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("User-SideBar.html");?>
		
		<div class="adminHead">
			<h1> Print Ticket<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			<?php
			$bookID=$_GET['id'];
			//-----------------------------getting all info of admin
				include("../SectionHome/config.php");
				
				$result1=mysql_query("SELECT * FROM bookinfo WHERE id= '$bookID'");
				while($res=mysql_fetch_array($result1)){
					$Username=$res['Username'];
					$ScheduleID=$res['ScheduleID'];
					$Class=$res['Class'];
					$TotalSeat=$res['TotalSeat'];
					$CostPerSeat=$res['CostPerSeat'];
				}
				$result2=mysql_query("SELECT * FROM flightrouteschedule WHERE Id= '$ScheduleID'");
				while($res=mysql_fetch_array($result2)){
					$FlightRouteId=$res['FlightRouteId'];
					$t=strtotime($res['StartDate']);
					$StartDate=date("d-M-Y",$t);
				}
				$result3=mysql_query("SELECT * FROM flightroute WHERE FlightRouteId= '$FlightRouteId'");
				while($res=mysql_fetch_array($result3)){
					$FlightTo=$res['FlightTo'];
					$FlightFrom=$res['FlightFrom'];
					$FlightName=$res['FlightName'];
					$Stoppage=$res['Stoppage'];
					$StartDay=$res['StartDay'];
					$StartTime=$res['StartTime'];
				}
				$result4=mysql_query("SELECT * FROM userinfo WHERE UserName= '$Username'");
				while($res=mysql_fetch_array($result4)){
					$Email=$res['Email'];
					$Mobile=$res['Mobile'];
					$Account=$res['Account'];
					$Passport=$res['Passport'];	
					
				}
				$toalCost=$CostPerSeat*$TotalSeat;
				//-----------------------File Create
				echo "Successfully Print File is Created In Your PC";
				
				
				$myfile = fopen("../PrintedTicket/Ticket.txt", "w") or die("Unable to open file!");
				
				$txt = "Username : $Username ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Class : $Class ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "TotalSeat : $TotalSeat ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "CostPerSeat : $CostPerSeat ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Total Cost : $toalCost ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "StartDate : $StartDate ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Stoppage : $Stoppage ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "StartDay : $StartDay ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "StartTime : $StartTime ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Email : $Email ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Mobile : $Mobile ".PHP_EOL;fwrite($myfile, $txt);
				$txt = "Passport : $Passport ".PHP_EOL;fwrite($myfile, $txt);
				
				
				fclose($myfile);
				
				
			?>
			<br><br>
		 <a href="../PrintedTicket/Ticket.txt" download>Download Ticket</a>
	
		</div>
		
		
		<!------------------------------------------Footer-->
		<?php include("User-Footer.html");?>
		
	</body>
<html>
