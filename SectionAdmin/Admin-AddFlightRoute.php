<?php include("Session-Active.php");?> 

<!doctype html>
<html>
	<head>
	   <title>Admin Home:: Air Travels Manamement</title>
	   <link href="../css/adminHomeCSS.css" rel="stylesheet">
	    <script src="jquery.js"></script>
		<script src="jquery-ui.js"></script>
		<link rel="stylesheet" href="jquery-ui.css">
	   
	   <style>
	   .box{
		   display:none;
	   }
	   .red{
		   display:block;
	   }
	   </style>
	   
	</head>
	<body>
		<!-----------------------------------------Side Bar-->
		<?php include("Admin-SideBar.html");?>
		
		<div class="adminHead">
			<h1> Admin Home<h1>
		</div>
		
		<div class="adminPageActivity adminInfo">
		<form action="" method="post" id="flightRouteForm">
		
			<!----------------------Flight name in Dropdown list-->
			Flight::
			<select name="flightName">
			<?php
				$locationQuery=mysql_query("SELECT * FROM FlightInfo ORDER BY FlightName Asc");
				while($res=mysql_fetch_array($locationQuery)){
					$flight=$res['FlightName'];
					
					echo "<option value=\"$flight\"> $flight </option>";
				}
			
			?>
			</select><br><br>
			
			<!----------------------Location name in Dropdown list  for To-->
			To::
			<select name="toLocation">
			<?php
				$locationQuery=mysql_query("SELECT * FROM Location ORDER BY Location Asc");
				while($res=mysql_fetch_array($locationQuery)){
					$location=$res['Location'];
					
					echo "<option value=\"$location\"> $location </option>";
				}
			
			?>
			</select><br><br>
			
			<!----------------------Location name in Dropdown list  for From-->
			From::
			<select name="fromLocation">
			<?php
				$locationQuery=mysql_query("SELECT * FROM Location ORDER BY Location Asc");
				while($res=mysql_fetch_array($locationQuery)){
					$location=$res['Location'];
					
					echo "<option value=\"$location\"> $location </option>";
				}
			
			?>
			</select>
			
			
			<br><br>
			Add Route For Next :: <input type="number" name="nextTotalWeek" value="50" min="0"> week
			
			<br><br>
			<!----------------------------Radio button fo select stoppage--------------->
			Total stoppage::
			
			<input type="radio" name="totalStoppage" value="0" checked> 0
			<input type="radio" name="totalStoppage" value="1"> 1
			
			
			<div class="red box" >
				<!-----------------------This is for if Radio 0 selected-->
				
				<h4><font color="red">Alocated seat and price for Direct Service</font></h4>
				
				<font color="blue">Startday of each week::</font>
				<select name="dayFor0Stoppage">
					<option value="Sunday" >Sunday</option>
					<option value="Monday" >Monday</option>
					<option value="Tuesday" >Tuesday</option>
					<option value="Wednesday" >Wednesday</option>
					<option value="Thursday" >Thursday</option>
					<option value="Friday" >Friday</option>
					<option value="Saturday" >Saturday</option>
				</select>
				<font color="blue">Time ::</font>
				<input type="time" name="time0stoppage" placeholder="Exp: 20:30"><br><br>
				
				<font color="blue">Economy Seat::</font>
					<input type="number" min="0" name="Economy0" value="0" >
					<font color="blue">Price::</font><input type="number" min="0" name="EconomyPrice0" value="0"  ><br><br>
				<font color="blue">Business Seat::</font>
					<input type="number" min="0" name="Business0" value="0" >
					<font color="blue">Price::</font><input type="number" min="0" name="businessPrice0" value="0" ><br><br>
				<font color="blue">Normal Seat::</font>
					<input type="number" min="0" name="Normal0" value="0">
					<font color="blue">Price::</font><input type="number" min="0" name="normalPrice0" value="0" ><br><br>
			</div>
			
			
			<div class="green box">
				<!-----------------------This is for if Radio 1 selected-->
				<!----------------------Alocate Total Seat and price of ticket for direct Passenger-->
				<h4>Alocated seat and price for Direct Service</h4>
				Startday of each week::
				<select name="dayFor1StoppageDirect">
					<option value="Sunday" >Sunday</option>
					<option value="Monday" >Monday</option>
					<option value="Tuesday" >Tuesday</option>
					<option value="Wednesday" >Wednesday</option>
					<option value="Thursday" >Thursday</option>
					<option value="Friday" >Friday</option>
					<option value="Saturday" >Saturday</option>
				</select>
				Time ::
				<input type="time" name="time1stoppageDirect" placeholder="Exp: 20:30"><br><br>
			
				Economy Seat::
					<input type="number" min="0" name="Economy1D" value="0" >
					Price::<input type="number" min="0" name="EconomyPrice1D" value="0"  ><br><br>
				Business Seat::
					<input type="number" min="0" name="Business1D" value="0" >
					Price::<input type="number" min="0" name="businessPrice1D" value="0" ><br><br>
				Normal Seat::
					<input type="number" min="0" name="Normal1D" value="0">
					Price::<input type="number" min="0"  name="normalPrice1D" value="0" ><br><br>

				<h4>Alocated seat and price for Passenger From Stoppage 1</h4>
				Only Stoppage::
				<select name="toLocationStoppageOnly">
				<?php
					$locationQuery=mysql_query("SELECT * FROM Location ORDER BY Location Asc");
					while($res=mysql_fetch_array($locationQuery)){
						$location=$res['Location'];
						
						echo "<option value=\"$location\"> $location </option>";
					}
				
				?>
				</select><br><br>
				Startday of each week::
				<select name="dayFor1StoppageOnly">
					<option value="Sunday" >Sunday</option>
					<option value="Monday" >Monday</option>
					<option value="Tuesday" >Tuesday</option>
					<option value="Wednesday" >Wednesday</option>
					<option value="Thursday" >Thursday</option>
					<option value="Friday" >Friday</option>
					<option value="Saturday" >Saturday</option>
				</select>
				Time ::
				<input type="time" name="time1stoppageOnly" placeholder="Exp: 20:30"><br><br>
			
				
				Economy Seat::
					<input type="number" min="0" name="EconomyS1" value="0" >
					Price::<input type="number" min="0" name="EconomyPriceS1" value="0"  ><br><br>
				Business Seat::
					<input type="number" min="0" name="BusinessS1" value="0" >
					Price::<input type="number" min="0" name="businessPriceS1" value="0" ><br><br>
				Normal Seat::
					<input type="number" min="0" name="NormalS1" value="0">
					Price::<input type="number" min="0" name="normalPriceS1" value="0" ><br><br>
				
			</div>
			
			<script type="text/javascript">
				$(document).ready(function(){
					//-----------------------script for open hide div on radio button click
					
					$('input[name="totalStoppage"]').click(function(){
						if($(this).attr("value")=="0"){
							$(".box").not(".red").hide();
							$(".red").show();
						}
						if($(this).attr("value")=="1"){
							$(".box").not(".green").hide();
							$(".green").show();
						}
						
					});
					
				});
				</script>
				
			
			
			<input type="submit" name="addRoute"value="Add Route">
		
		</form>
		
		<!-----------------------------------Add Flight Route Action-->
		<?php include("Admin-AddFlightRouteAction.php");?>	
		
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
