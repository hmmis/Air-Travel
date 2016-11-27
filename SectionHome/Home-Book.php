<?php

	if(isset($_POST['processBookSubmit'])){
		$ScheduleId=$_POST['ScheduleId'];
		$class=$_POST['class'];
		$price=$_POST['Price'];
		
		include("config.php");
		$result = mysql_query("SELECT * FROM flightrouteschedule WHERE Id = '$ScheduleId' ");
		while($res= mysql_fetch_array($result)){
			$FlightRouteId=$res['FlightRouteId'];
			
			$a=$res['StartDate'];
			$b=strtotime($a);
			$startDate=date("d-M-Y",$b);
		}
		$result1 = mysql_query("SELECT * FROM flightroute WHERE FlightRouteId = '$FlightRouteId' ");
		while($res1= mysql_fetch_array($result1)){
			$to=$res1['FlightTo'];
			$from=$res1['FlightFrom'];
			$flightName=$res1['FlightName'];
			$day=$res1['StartDay'];
			$time=$res1['StartTime'];
			$Stoppage=$res1['Stoppage'];
			
		}
	}
	
?>

<!doctype html>
<html>
	<head>
	   <title>Air Travels Manamement</title>
	   <?php include("Home-Link.html");?>
		
	   
	</head>
	<body>
		<!-----------------------------------------Menu Bar-->
		<?php include("Home-MenuBar.html");?>
		<!-----------------------------------------2 Form in tab-->
		<div id = "All-tabs">
			 <ul>
				<li><a href = "#tabs-1">Book As New User</a></li>
				<li><a href = "#tabs-2">Book As Old User</a></li>	
			 </ul>
				
			 <div id = "tabs-1">
				<p>Flight:: <b> <?php echo $flightName;?> </b></p>
				<p>To:: <b> <?php echo $to;?> </b></p>
				<p>From:: <b> <?php echo $from;?> </b></p>
				<p>Start Date:: <b> <?php echo $startDate;?> </b></p>
				<p>Stoppage:: <b> <?php echo $Stoppage;?> </b></p>
				<p>Class:: <b> <?php echo $class;?> </b></p>
				<p>Price Per Seat:: <b> <?php echo $price;?> </b></p>
				<form action="Home-Book-NewUser.php" method="post">
					
					<hr>
					Total Seat::
					<select name="totalSeat">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select><br><br>
					
					User Name::
					<input type="text" name="username"  placeholder="Set User name" required><br><br>
					Password::
					<input type="password" name="password" placeholder="Set Password" required>
					
					<br><br>
					
					Email::
					<input type="email" name="email" placeholder="Give Your Valid Email Address" required><br><br>
					Mobile No::
					<input type="number" name="mobileNo" placeholder="Mobile No. with Country code" required><br><br>
					Account No::
					<input type="number" name="AccountNo" placeholder="Account for Payment" required><br><br>
					Passport No::
					<input type="number" name="passportNo" placeholder="Passport No." required><br><br>
					
					<input type="hidden" name="scheduleId" value="<?php echo $ScheduleId;?>">
					<input type="hidden" name="class" value="<?php echo $class;?>">
					<input type="hidden" name="pricePerSeat" value="<?php echo $price;?>">
					<input type="submit" name="BookAsNew" value="Book"><br><br>
					
				</form>
			 </div>
				
			 <div id = "tabs-2">
				<p>Flight:: <b> <?php echo $flightName;?> </b></p>
				<p>To:: <b> <?php echo $to;?> </b></p>
				<p>From:: <b> <?php echo $from;?> </b></p>
				<p>Start Date:: <b> <?php echo $startDate;?> </b></p>
				<p>Stoppage:: <b> <?php echo $Stoppage;?> </b></p>
				<p>Class:: <b> <?php echo $class;?> </b></p>
				<p>Price Per Seat:: <b> <?php echo $price;?> </b></p>
				<form action="Home-Book-OldUser.php" method="post">
					<hr>
					Total Seat::
					<select name="totalSeat">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select><br><br>
					
					User Name::
					<input type="text" name="usernameOld" required><br><br>
					Password::
					<input type="password" name="passwordOld" required><br><br>
					
					<input type="hidden" name="scheduleId" value="<?php echo $ScheduleId;?>">
					<input type="hidden" name="class" value="<?php echo $class;?>">
					<input type="hidden" name="pricePerSeat" value="<?php echo $price;?>">
					<input type="submit" name="BookAsOld" value="Book"><br><br>
				
				</form>
			 </div>
				
			 
			
      </div>
	  <br><br>
		
		<!------------------------------------------Footer-->
		<?php include("Home-Footer.html");?>
		
	</body>
<html>
