<!doctype html>
<html>
	<head>
	   <title>Air Travels Manamement</title>
	   <!--link href="../css/tableCSS.css" rel="stylesheet"-->
	   
	   <?php include("Home-Link.html");?> 
	  
	</head>
	<body>
		<!-----------------------------------------Menu Bar-->
		<?php include("Home-MenuBar.html");?>
		
		<!------------------------------------------About Us-->
		<div class="myNoticeArchive">
			<table border="1" align="center">
				<tr>
					<th>Posted Time</th>
					<th>Title</th>
					<th>Description</th>
					
					
				</tr>
				
				<?php
					include("config.php");
					$result=mysql_query("SELECT * FROM noticeboard ORDER BY NoticeId DESC");
					
					while($res=mysql_fetch_array($result)){
						echo "<tr>";
							echo "<td>".$res['NoticePostedTime']."</td>";
							echo "<td>".$res['NoticeTitle']."</td>";
							echo "<td><a href=\"Home-NoticeArchive-Details.php?id=$res[NoticeId]\">Details</a></td>";
							
						echo "</tr>";
					}
				?>
				</table>
		</div>
		
		
		<!------------------------------------------Footer-->
		</br></br></br><br></br></br>
		<?php include("Home-Footer.html");?>
	</body>
<html>
