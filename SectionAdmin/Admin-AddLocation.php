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
				New Location ::
				<input type="text" name="location" required><br><br>
				
				Time::
				<input type="number" name="time" required><br><br>
				
				<input type="submit" name="addLocation"value="Add location">
			</form>
			<?php
			//------------------------------add location action
				
				if(isset($_POST['addLocation'])){
					$name=$_POST['location'];
					$time=$_POST['time'];
					
					//--------------------------check new location is already exits or not
					$result=mysql_query("SELECT * FROM Location where location= '$name'");
					
					if( mysql_num_rows($result)==1){
						echo "<script> alert('This Location is already Have'); </script>";
						
					}else if(mysql_num_rows($result)==0){
						$addLocation=mysql_query("Insert INTO  Location(location,TimeAddSub) Values('$name','$time')");
						
						echo "<script> alert('Successfully Add Location'); </script>";
					}
				}
				


			?>
			<hr>
			
			<h3><font color="firebrick">Already Saved Location</font></h3>
			<table>
				<tr>
					<th>Location</th>
					<th>Time Difference</th>
					<th>Delete</th>
				</tr>
			
			<?php
			//-----------------------------getting all info of saved location to display
				
				$resultshow=mysql_query("SELECT * FROM location Order By Location Asc");
				while($res=mysql_fetch_array($resultshow)){
					echo "<tr>";
						echo "<td>".$res['Location']."</td>";
						echo "<td>".$res['TimeAddSub']."</td>";
						
						$delId=$res['LocID'];
						echo "<td><a href=\"Admin-AddLocation-Delete.php?delId=$delId\" onClick=\"return confirm('Sure To Delete?')\">Delete</a></td>";
						
					echo "</tr>";
					
					
				}
			?>
			</table>
		
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
		
		
	</body>
<html>
