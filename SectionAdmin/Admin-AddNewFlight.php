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
			<form action="" method="post">
				New Filght Name ::
				<input type="text" name="flightName" required><br><br>
				
				<input type="submit" name="addFlight"value="Add Flight">
			</form>
			<?php
			//------------------------------add location action
				
				if(isset($_POST['addFlight'])){
					$name=$_POST['flightName'];
				
					
					//--------------------------check new location is already exits or not
					$result=mysql_query("SELECT * FROM FlightInfo where FlightName= '$name'");
					
					if( mysql_num_rows($result)==1){
						echo "<script> alert('This Flight is already Have'); </script>";
						
					}else if(mysql_num_rows($result)==0){
						$addLocation=mysql_query("Insert INTO  FlightInfo(FlightName) Values('$name')");
						
						echo "<script> alert('Successfully Add Flight'); </script>";
					}
				}
				


			?>
			<hr>
			<h3>Already Saved Flight</h3>
			<table>
				<tr>
					<th>Flight</th>
					<th>Delete</th>
				</tr>
			
			<?php
			//-----------------------------getting all info of saved location to display
				
				$resultshow=mysql_query("SELECT * FROM FlightInfo Order By FlightName Asc");
				while($res=mysql_fetch_array($resultshow)){
					echo "<tr>";
						echo "<td>".$res['FlightName']."</td>";
						
						$delId=$res['FlightId'];
						echo "<td><a href=\"Admin-AddNewFlight-Delete.php?delId=$delId\" onClick=\"return confirm('Sure To Delete?')\">Delete</a></td>";
						
					echo "</tr>";
					
					
				}
			?>
			</table>
		
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
