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
				
				</tr>
				
					<?php
					$result = mysql_query("SELECT * FROM flightrouteschedule ORDER BY StartDate Asc");
					
					$sl=0;
					while($res = mysql_fetch_array($result)) {
						$FlightRouteId=$res['FlightRouteId'];
						$t=strtotime($res['StartDate']);
						$startDate=date("d-M-Y",$t);
						
						echo "<tr>";
							$dataCollect = mysql_query("SELECT * FROM flightroute Where FlightRouteId='$FlightRouteId'");
							while($res1 = mysql_fetch_array($dataCollect)){
								
								$startTime=$res1['StartTime'];
								$TimeOfStart=$startDate." ".$startTime;
								$TimeOfStartString=strtotime($TimeOfStart);
								$now=strtotime("now");
								$flight=$res1['FlightName'];
								$to=$res1['FlightTo'];
								$From=$res1['FlightFrom'];
								$startDay=$res1['StartDay'];
								
								if($now<$TimeOfStartString){
									//------------------------Flight Passed Out Start Time
									
								}else{
									$sl++;
									echo "<td>".$sl."</td>";
									echo "<td>".$flight."</td>";
									echo "<td>".$to."</td>";
									echo "<td>".$From."</td>";
									echo "<td>".$startDay."</td>";
									echo "<td>".$startTime."</td>";
								}
							}
							if($now<$TimeOfStartString){
								
							}else{
									echo "<td>".$startDate."</td>";
									
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
