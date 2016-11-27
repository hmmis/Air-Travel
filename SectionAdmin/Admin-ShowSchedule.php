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
			<form action="Admin-ShowSchedule-DeleteByFlight.php" method="POST">
				Delete All Schedule of Flight:
				<select name="flightName">
				<?php
					$locationQuery=mysql_query("SELECT * FROM FlightInfo ORDER BY FlightName Asc");
					while($res=mysql_fetch_array($locationQuery)){
						$flight=$res['FlightName'];
						
						echo "<option value=\"$flight\"> $flight </option>";
					}
				
				?>
				</select>
				<input type="submit" name="DeleteSchedule" onClick="return confirm('Sure To Delete All Schedule By Flight')" value="Delete">
			
			</form>
			<!-------------------------Pagination-->
			<?php 
				$num_rec_per_page=15;
				
				if (isset($_GET["page"])) { 
					$page  = $_GET["page"]; 
				} else {
					$page=1;
				}; 
				
				$start_from = ($page-1) * $num_rec_per_page; 
				$sql = "SELECT * FROM flightrouteschedule ORDER BY StartDate Asc LIMIT $start_from, $num_rec_per_page"; 
				$rs_result = mysql_query ($sql);
			?> 
			
			<table border="1">
				<tr>
					<th>Id</th>
					<th>Flight Name</th>
					<th>To</th>
					<th>From</th>
					<th>Start Day</th>
					<th>Start Time</th>
					<th>Start Date</th>
					<th>Delete</th>
				
				</tr>
				
					<?php
					//$result = mysql_query("SELECT * FROM flightrouteschedule ORDER BY StartDate Asc");
					
					$sl=0;
					while($res = mysql_fetch_array($rs_result)) {
						$id=$res['Id'];
						$FlightRouteId=$res['FlightRouteId'];
						$t=strtotime($res['StartDate']);
						$startDate=date("d-M-Y",$t);
						
						echo "<tr>";
							$dataCollect = mysql_query("SELECT * FROM flightroute Where FlightRouteId='$FlightRouteId' ");
							while($res1 = mysql_fetch_array($dataCollect)){
								
								$startTime=$res1['StartTime'];
								$TimeOfStart=$startDate." ".$startTime;
								$TimeOfStartString=strtotime($TimeOfStart);
								$now=strtotime("now");
								$flight=$res1['FlightName'];
								$to=$res1['FlightTo'];
								$From=$res1['FlightFrom'];
								$startDay=$res1['StartDay'];
								
								if($now>$TimeOfStartString){
									//------------------------Flight Passed Out Start Time
									
								}else{
									$sl++;
									echo "<td>".$id."</td>";
									echo "<td>".$flight."</td>";
									echo "<td>".$to."</td>";
									echo "<td>".$From."</td>";
									echo "<td>".$startDay."</td>";
									echo "<td>".$startTime."</td>";
								}
							}
							if($now>$TimeOfStartString){
								
							}else{
									echo "<td>".$startDate."</td>";
									$delId=$res['Id'];
									echo "<td><a href=\"Admin-ShowSchedule-Delete.php?delId=$delId\" onClick=\"return confirm('Sure To Delete?')\">Delete</a></td>";
								echo "</tr>";
							}
							
					}
					
		 
					?>
				
				
			</table>
			<?php 
				$sql = "SELECT * FROM flightrouteschedule"; 
				$rs_result = mysql_query($sql); //run the query
				$total_records = mysql_num_rows($rs_result);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page); 

				
				echo "Data Is Order By Date: ";
				for ($i=1; $i<=$total_pages; $i++) { 
							echo "<a href='Admin-ShowSchedule.php?page=".$i."'>".$i."</a> "; 
				}; 
				
			?>
			
			
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
