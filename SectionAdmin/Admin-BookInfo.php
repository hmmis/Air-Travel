<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>Admin Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   <link href="../css/tableCSS.css" rel="stylesheet">
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("Admin-SideBar.html");?>
		
		<div class="adminHead">
			<h1> Admin Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			<table border="1">
				<tr>
					<th>SL</th>
					<th>Flight Name</th>
					<th>To</th>
					<th>From</th>
					<th>Start Day</th>
					<th>Start Time</th>
					<th>Start Date</th>
					<th>Seat Booked</th>
					<th>Class</th>
					<th>Price Per Seat</th>
					<th>Total Price</th>
					<th>Book By</th>
				
				</tr>
				
					<?php
					
					$sl=0;
					include("../SectionHome/config.php");
					$bookList = mysql_query("SELECT * FROM bookinfo");
					while($res1=mysql_fetch_array($bookList)){
						$Username=$res1['Username'];
						$ScheduleID=$res1['ScheduleID'];
						$Class=$res1['Class'];
						$TotalSeat=$res1['TotalSeat'];
						$CostPerSeat=$res1['CostPerSeat'];
						
						$totalCost=$TotalSeat*$CostPerSeat;
						
						$scheduleInfo= mysql_query("SELECT * FROM flightrouteschedule WHERE Id='$ScheduleID' ");
						
						while($res2 = mysql_fetch_array($scheduleInfo)) {
							
							$FlightRouteId=$res2['FlightRouteId'];
							$t=strtotime($res2['StartDate']);
							$startDate=date("d-M-Y",$t);
						}
						$scheduleInfo= mysql_query("SELECT * FROM flightroute WHERE FlightRouteId='$FlightRouteId' ");
						
						while($res = mysql_fetch_array($scheduleInfo)) {
							$flight=$res['FlightName'];
							$to=$res['FlightTo'];
							$From=$res['FlightFrom'];
							$startDay=$res['StartDay'];
							
							$startTime=$res['StartTime'];
							$sl++;
							echo "<tr>";
								echo "<td>".$sl."</td>";
								echo "<td>".$flight."</td>";
								echo "<td>".$to."</td>";
								echo "<td>".$From."</td>";
								echo "<td>".$startDay."</td>";
								echo "<td>".$startTime."</td>";
								echo "<td>".$startDate."</td>";
								echo "<td>".$TotalSeat."</td>";
								echo "<td>".$Class."</td>";
								echo "<td>".$CostPerSeat."</td>";
								echo "<td>".$totalCost."</td>";
								echo "<td>".$Username."</td>";
								
							echo "</tr>";
						}
					}
					
					?>
				
				
			</table>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
