<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				text-align: center;
				padding: 8px;
			}

			tr:nth-child(even){background-color: #f2f2f2}
			tr:nth-child(odd){background-color: #f2f2f2}

			th {
				background-color: #4CAF50;
				color: white;
			}
		</style>
	</head>
	<body>
		<h2>Search Result:</h2>

		<?php
		session_start();
		$response=$_GET['id'];
		
	
		if(substr( $response, 0, 2 ) == "To"){
			$_SESSION["to"] = substr( $response,2);
			
		}else if(substr( $response, 0, 4 ) == "From"){
			$_SESSION["from"] = substr( $response,4);
			
		}else if(substr( $response, 0, 4 ) == "Date"){
			
			$_SESSION["date"] =substr( $response,4);
			
		}
		$to=$_SESSION["to"];
		$from=$_SESSION["from"];
		$date=$_SESSION["date"];
		
		$t=strtotime($date);
		$startDate=date("d-M-Y",$t);
		
		
		echo "<h3>From::".$from."</h3>";
		echo "<h3>To:: ".$to."</h3>";
		echo "<h3>Date::".$startDate."</h3>";
		
		
		if($to!="None" && $from!="None" && $date!="None"){
			if($to!=$from){
				
					echo "<p style=\"color:green\">Successfull Search</p>";
					
					$s=strtotime($startDate);
					$matchDateFormate=date("Y/m/d",$s);
					
					include("SectionHome/config.php");
					
					//--------------------Search By Date First
					$result = mysql_query("SELECT * FROM flightrouteschedule 
					WHERE StartDate = '$matchDateFormate' ");
					
					
					$sl=0;
					$test=false;
					$found=false;
					
					if(mysql_num_rows($result)>0){
						while($res= mysql_fetch_array($result)){
							$id=$res['FlightRouteId'];
							
							//--------------------Search By To and From in given Date
							$result1 = mysql_query("SELECT * FROM flightroute 
							WHERE FlightRouteId = '$id' and  FlightTo= '$to' and FlightFrom= '$from' ");
							
							if(mysql_num_rows($result1)==1){
								
								$sl++;
								
								while($res1= mysql_fetch_array($result1)){
									
									//-----------------Store al data from database on array
									$myArray[$sl][0]=$res['Id'];
									$myArray[$sl][1]=$sl;
									$myArray[$sl][2]=$res1['FlightName'];
									$myArray[$sl][4]=$to;
									$myArray[$sl][3]=$from;
									
									$a=$res['StartDate'];
									$b=strtotime($a);
									$startDate=date("d-M-Y",$b);
									
									$myArray[$sl][5]=$startDate;
									$myArray[$sl][6]=$res1['StartDay'];
									$myArray[$sl][7]=$res1['StartTime'];
									$myArray[$sl][8]=$res['RemEconomy'];
									$myArray[$sl][9]=$res1['PriceEcomomy'];
									$myArray[$sl][10]=$res['RemBuisness'];
									$myArray[$sl][11]=$res1['PriceBuisness'];
									$myArray[$sl][12]=$res['RemNormal'];
									$myArray[$sl][13]=$res1['PriceNormal'];
									
								}
								
								$test=true;
							}else{
								
							}
							
						}
							
					}else{
						$found=true;
						echo "No Flight On This Day";
					}
					
					if($test==true){
						//----------------------------------Show Result
						echo "<table border=\"1\">
							<tr>
								<th>SL</th>
								<th>Flight</th>
								<th>FROM</th>
								<th>To</th>
								<th>Date</th>
								<th>Day</th>
								<th>Start Time</th>
								<th>Economy</th>
								<th>Business</th>
								<th>Normal</th>
							</tr>";
						
						
						for($i=1;$i<=$sl;$i++){
							echo "</tr>";
							for($j=1;$j<=13;$j++){
								if($j>=8){
									//----------------To continue with j=j+1
									if($myArray[$i][$j]==0){
										//--------------check that all seat are booked or not
										echo "<td>
												All Seat is Booked
											</td>";
									}else{
										//--------------Provide Button To Book
										$seat=$myArray[$i][$j];
										$price=$myArray[$i][$j+1];
										if($j==8){
											$class="Economy";
										}else if($j==10){
											$class="Business";
										}else if($j==12){
											$class="Normal";
										}
										echo "<td>
											<form action=\"SectionHome/Home-Book.php\" method=\"POST\">
											
												<p>Seat Remain: $seat ,Price: $price</p>
												<input type=\"hidden\" name=\"ScheduleId\" value=\"$ScheduleId\">
												<input type=\"hidden\" name=\"class\" value=\"$class\">
												<input type=\"hidden\" name=\"Price\" value=\"$price\">
												<input type=\"submit\" name=\"processBookSubmit\" value=\"Book Now\">
											</form>	
											
										</td>";
									}
									
									$j++;
								}else{
									//-------------------------Show data in table
									
									$ScheduleId=$myArray[$i][0];
									
									echo "<td>".$myArray[$i][$j]."</td>";
								}
								
							
							}
							echo "</tr>";
						}
						echo "</table>";
					}else {
						if($found==false){
							echo "No Match Found with this To,Form Search but We Have Other route Flight On This Day";
						}else{
							
						}
							
					}
					
				}
				else{
					echo "<p style=\"color:red\">To & From Will Not Be Same</p>";
					
				}
			}
			else{
				echo "<p style=\"color:red\">Please Fill To ,From & Departing Date</p>";
		}
		?>
	</body>
</html>