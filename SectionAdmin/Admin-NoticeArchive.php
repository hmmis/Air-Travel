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
			<h1> Notice Archive<h1>
		</div>
		
		<div class="adminPageActivity" style="overflow-x:auto;">
			<table border="1" align="center">
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Description</th>
					<th>Posted By</th>
					<th>Posted Time</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				
				<?php
					include("../SectionHome/config.php");
					$result=mysql_query("SELECT * FROM noticeboard ORDER BY NoticeId DESC");
					
					while($res=mysql_fetch_array($result)){
						echo "<tr>";
							echo "<td>".$res['NoticeId']."</td>";
							echo "<td>".$res['NoticeTitle']."</td>";
							echo "<td><a href=\"Admin-NoticeArchive-Details.php?id=$res[NoticeId]\">Details</a></td>";
							echo "<td>".$res['NoticePostedBy']."</td>";
							echo "<td>".$res['NoticePostedTime']."</td>";
							echo "<td><a href=\"Admin-NoticeArchive-Edit.php?id=$res[NoticeId]\">Edit</a></td>";
							echo "<td><a href=\"Admin-NoticeArchive-Delete.php?id=$res[NoticeId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
						echo "</tr>";
					}
				?>
			
			</table>
		</div>
	
		
		<!------------------------------------------Footer-->
		<?php include("Admin-Footer.html");?>
		
	</body>
<html>
