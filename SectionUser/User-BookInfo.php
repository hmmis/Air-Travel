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
		<?php include("User-SideBar.html");?>
		
		<div class="adminHead">
			<h1> User Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			
			<p>Order By Time of Your Booked::</p>
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
					<th>Action</th>
				
				</tr>
				
					<?php
					
					$username=$_SESSION["username"];
					$sl=0;
					include("../SectionHome/config.php");
					$bookList = mysql_query("SELECT * FROM bookinfo WHERE Username='$username'");
					while($res1=mysql_fetch_array($bookList)){
						$bookID=$res1['id'];
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
							
								$TimeOfStart=$startDate." ".$startTime;
								$TimeOfStartString=strtotime($TimeOfStart);
								$now=strtotime("now");
							
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
								
								
								if($now<$TimeOfStartString){
									echo "<td>
											<a href=\"User-BookInfoEdit.php?EditId=$bookID\">Edit</a>
											
											<a href=\"User-BookInfoDelete.php?DelId=$bookID&class=$Class\" onClick=\"return confirm('Are you sure to Cancel Book?')\">Cancel</a>
											
											<a href=\"User-PrintTicket.php?id=$bookID\">Print</a>
											
										</td>";
								}else if($now>$TimeOfStartString){
									echo "<td>Action Disabled</td>";
								}
							echo "</tr>";
						}
					}
					
					?>
				
				
			</table>
			
			
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("User-Footer.html");?>
		
	</body>
<html>
