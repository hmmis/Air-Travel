<?php include("Session-Active.php");?> 
<?php
			//-----------------------------Edit
			$bookid=$_GET['EditId'];
			include("../SectionHome/config.php");
			
			//--------------------getting Old Saved ScheduleID,Total Seat ,Class
			$result=mysql_query("SELECT * FROM bookinfo WHERE id= '$bookid'");
			while($res=mysql_fetch_array($result)){
				$ScheduleID=$res['ScheduleID'];
				$TotalSeat=$res['TotalSeat'];
				$Class=$res['Class'];
			}
			//--------------------get remaing all seat & FlightRouteId by ScheduleID
			$result1=mysql_query("SELECT * FROM flightrouteschedule WHERE Id= '$ScheduleID'");
			while($res1=mysql_fetch_array($result1)){
				$FlightRouteId=$res1['FlightRouteId'];
				$RemEconomy=$res1['RemEconomy'];
				$RemBuisness=$res1['RemBuisness'];
				$RemNormal=$res1['RemNormal'];
			}
			//--------------------get fixed Price of all seat  by FlightRouteId
			$result2=mysql_query("SELECT * FROM flightroute WHERE FlightRouteId= '$FlightRouteId'");
			while($res2=mysql_fetch_array($result2)){
				$PriceEcomomy=$res2['PriceEcomomy'];
				$PriceBuisness=$res2['PriceBuisness'];
				$PriceNormal=$res2['PriceNormal'];
			}
			
			if(isset($_POST['submitChange'])){
				$newSeat=$_POST['newTotalSeat'];
				$newClass=$_POST['newClass'];
				
				//------------------------get  Actual Seat
				if($Class=="Economy"){
					$ActualEconomySeat=$RemEconomy+$TotalSeat;
					$ActualBusinessSeat=$RemBuisness;
					$ActualNormalSeat=$RemNormal;
				}else if($Class=="Business"){
					$ActualEconomySeat=$RemEconomy;
					$ActualBusinessSeat=$RemBuisness+$TotalSeat;
					$ActualNormalSeat=$RemNormal;
				}else if($Class=="Normal"){
					$ActualEconomySeat=$RemEconomy;
					$ActualBusinessSeat=$RemBuisness;
					$ActualNormalSeat=$RemNormal+$TotalSeat;
					
				}
				
				//------------------Update by New Class
				if($newClass=="Economy"){
					if($ActualEconomySeat>=$newSeat){
						$update= mysql_query("UPDATE bookinfo SET Class=\"Economy\", 
						TotalSeat='$newSeat', CostPerSeat='$PriceEcomomy' WHERE id= '$bookid'");
						
						$myRemEconomy=$ActualEconomySeat-$newSeat;
						$update2= mysql_query("UPDATE flightrouteschedule SET 
						RemEconomy='$myRemEconomy', RemBuisness='$ActualBusinessSeat',
						RemNormal='$ActualNormalSeat'  WHERE Id= '$ScheduleID'");
						
						header("Location:User-BookInfo.php");
					}else{
						echo "<p style=\"color:red\">Number of seat is not available in Economy Class</p>";
					}
				}else if($newClass=="Business"){
					if($ActualBusinessSeat>=$newSeat){
						$update= mysql_query("UPDATE bookinfo SET Class=\"Business\" , 
						TotalSeat='$newSeat', CostPerSeat='$PriceBuisness' WHERE id= '$bookid'");
						
						$myRemBusiness=$ActualBusinessSeat-$newSeat;
						$update2= mysql_query("UPDATE flightrouteschedule SET 
						RemEconomy='$ActualEconomySeat', RemBuisness='$myRemBusiness',
						RemNormal='$ActualNormalSeat'  WHERE Id= '$ScheduleID'");
						
						header("Location:User-BookInfo.php");
					}else{
						echo "<p style=\"color:red\">Number of seat is not available in Business Class</p>";
					}
				}else if($newClass=="Normal"){
					if($ActualNormalSeat>=$newSeat){
						$update= mysql_query("UPDATE bookinfo SET Class=\"Normal\" , 
						TotalSeat='$newSeat', CostPerSeat='$PriceNormal' WHERE id= '$bookid'");
						
						$myRemNormal=$ActualNormalSeat-$newSeat;
						$update2= mysql_query("UPDATE flightrouteschedule SET 
						RemEconomy='$ActualEconomySeat', RemBuisness='$ActualBusinessSeat',
						RemNormal='$myRemNormal'  WHERE Id= '$ScheduleID'");
						
						header("Location:User-BookInfo.php");
					}else{
						echo "<p style=\"color:red\">Number of seat is not available in Normal Class</p>";
					
					}
				}
			}
?>
<!doctype html>
<html>
	<head>
	   <title>User Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	   
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("User-SideBar.html");?>
		
		<div class="adminHead">
			<h1> User Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
			Previous Selected Total Seat:: <?php echo "$TotalSeat";?><br>
			Previous Selected Class:: <?php echo "$Class";?>
			
			<form action="" method="POST">
				<h3>Change Plan</h3>
				Total Seat
				<input type="number" name="newTotalSeat" max="5000" min="1" required><br>
				New Class::
				<select name="newClass">
					<option value="Economy">Economy</option>
					<option value="Business">Business</option>
					<option value="Normal">Normal</option>
				</select>
				<br>
				<input type="submit" name="submitChange" value="Change">
				
				
			</form>
			
			
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("User-Footer.html");?>
		
	</body>
<html>
