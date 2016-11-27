<!doctype html>
<html>
	<head>
	   <title>Touch Airlines</title>
	   
	   <?php include("SectionHome/config.php"); ?>
	   
	   <link href="css/menuStylesCSS.css" rel="stylesheet">
	   
	   <link href="css/homeSectionCSS.css" rel="stylesheet">
	   <link  href="css/homeSection-FormCSS.css" rel="stylesheet">
			  
	   <script src="js/jquery-latest.min.js" type="text/javascript" ></script>
	   <script src="js/script.js" type="text/javascript"></script>
	   
		<!--For date picker-->
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<link href="css/jquery-ui-sunny.css" rel="stylesheet">
		
		<!------------------------------------For Model Form-->
	   <script src="js/jquery.js"></script>
	   <script src="js/jquery-ui.js"></script>
	   <link rel="stylesheet" href="css/jquery-ui-sunny.css">
	   <script src="js/modelFormScript-UpdateAdminInfo.js"></script>
	   
	   <!--------------------------------------Ajax Script-->
	   <script src="js/ajaxForSearch.js"></script>
	   
	   
	  
	</head>
	<body>
		<img src="image/img50.jpg" alt="Air Travels Manamement" width="100%" height="150px">
		<!-----------------------------------------Menu Bar-->
		<div id='cssmenu'>
			<ul>
			   <li class="active"><a href="index.php">Home</a></li>
			   <li><a href='SectionHome/Home-TravelsInformation.php'>Travels Information</a></li>
			   <li><a href="SectionHome/Home-NoticeArchive.php">Notice Archive</a></li>

			   <li><a href="SectionHome/Home-AboutUs.php">About Us</a></li>
			   <li style="float:right" ><a href="#" id="showModelFormLI">Log In</a>
				
			   </li>
			</ul>
		</div>
		<!-------------------------------------Model Form-->
		<div id="dialog-1formLI" title="Log In">
		
			<form action="SectionHome/Home-ModelForm-LogInAction.php" method="post">
				Username<br>
				<input type="text" name="username" value="" required><br>
				Password<br>
				<input type="password" name="password" value="" required><br><br>
				
				<input type="submit" value="Log In">
			
			
			</form>
		</div>
		<!-----------------------------------------Search Form-->
		<div class="HomeSearchForm">
		<form>
		<h2 class="formHeader">Welcome to Touch Airlines!</h2><br>
		<h3>Give your choice here.....</h3>
			
			
			
			Form::
			<select name="fromLocation" onchange="searchFrom(this.value)">
			<?php
			//-------------getting From from Database
				echo "<option value=\"None\">--Select From--</option>";
				$locationQuery=mysql_query("SELECT * FROM Location ORDER BY Location Asc");
				while($res=mysql_fetch_array($locationQuery)){
					$location=$res['Location'];
					
					echo "<option value=\"$location\"> $location </option>";
				}
			
			?>
			</select><br><br>
			To::
			<select name="toLocation" onchange="searchTo(this.value)">
			<?php
			//-------------getting To from Database
				echo "<option value=\"None\">--Select To--</option>";
				$locationQuery=mysql_query("SELECT * FROM Location ORDER BY Location Asc");
				while($res=mysql_fetch_array($locationQuery)){
					$location=$res['Location'];
					
					echo "<option value=\"$location\"> $location </option>";
				}
				session_start();
				$_SESSION["to"] = "None";
				$_SESSION["from"] = "None";
				$_SESSION["date"] = "None";
			
			?>
			</select><br><br>
			Departing Date::
			<input type="text" id="datepicker" onchange="searchDate(this.value)" placeholder="MM/DD/YYYY"><br><br>
			
			
		</form>
		</div>
		
		
		<!----------------------------------------------Notice Board-->
		<div class="classNoticeBoard">
			<?php
					
					
					$result=mysql_query("SELECT * FROM noticeboard WHERE NoticeId=(SELECT MAX(NoticeId))");
					while($res=mysql_fetch_array($result)){
						$noticeTitle=$res['NoticeTitle'];
						$noticeDetais=$res['NoticeDetails'];	
						$noticePost=$res['NoticePostedTime'];	
						
					}
				?>
				<div class="notice"><h2>Notice<h2></div>
				</br></br>
				<h1><?php echo $noticeTitle; ?></h1>
				<p><?php echo $noticeDetais; ?></p><br>
				<p>Posted Time ::<?php echo $noticePost; ?></p>
		</div>
		
	<div id="container">
		
   
		<h2 style="color:white">Follow us</h2>
		<a href="https://www.facebook.com/shovon487" target="_blank"><img src="image/fb.jpg" alt="Facebook" width="30%" height="30px"></a><br>
		<a href="https:www.twitter.com" target="_blank"><img src="image/twt.jpg" alt="Twitter" width="30%" height="30px"></a><br>
		<a href="https:www.linkdin.com" target="_blank"><img src="image/linkdin.png" alt="Linkdin" width="30%" height="30px"></a><br>
		<a href="https://www.instagram.com/?hl=en" target="_blank"><img src="image/ins.jpg" alt="Instagram" width="30%" height="30px"></a>
	
	</div></hr>
    <div id="content"></div></br></br>
</div>
		</br></br>
		
		
		<div class="ResultOfSearch" id="txtHint">

			<h3><marquee direction="right">Your result wiil be shown here.......</marquee></h3>
		</div>
		<!------------------------------------------Footer-->
		<div class="classFooter">
			This site is developed by Shovon, Shuvo , Rafi, Nabila
			<br>
			Students of American International University - Bangladesh(AIUB)
			<br>
			Email::mislam6789@gmail.com </br>
				   s.m.hasan.shuvo@gmail.com
			<br>
			Office::House 83/B, Road 4, Kemal Ataturk Avenue, Banani,Dhaka 1213, Bangladesh
		</div>
		
	</body>
<html>
