<?php
		//-------------------------------------------------Add Route Action
		include_once("../SectionHome/config.php");
		if(isset($_POST['addRoute'])){
			$to=$_POST['toLocation'];
			$from=$_POST['fromLocation'];
		
			
			if($to==$from){
				echo "<p style=\"color:red\";>**To and From will not be same<p>";
			}else{
				//---------------------------code for add route
	
				$flight=$_POST['flightName'];
				$totalStoppage=$_POST['totalStoppage'];
				$nextTotalWeek=$_POST['nextTotalWeek'];
				
				if($totalStoppage==0){
					//----------------------If Derect Service
					$dayFor0Stoppage=$_POST['dayFor0Stoppage'];
					$time0stoppage=$_POST['time0stoppage'];
					
					if(!empty($time0stoppage) && strlen($time0stoppage)==5){
						//------------------------ if Input Time is valied
						$Economy0=$_POST['Economy0'];
						$EconomyPrice0=$_POST['EconomyPrice0'];
						$Business0=$_POST['Business0'];
						$businessPrice0=$_POST['businessPrice0'];
						$Normal0=$_POST['Normal0'];
						$normalPrice0=$_POST['normalPrice0'];
						
						$FlightRouteId=$flight.$to.$from;
						
						//-------------------to check that is this data is already in database or not
						$query="SELECT * FROM flightroute WHERE FlightRouteId = '$FlightRouteId' ";
						$result = mysql_query($query); 

						if( mysql_num_rows($result)==0){
							//----------------------Insert In Database
					
							
							$insert = mysql_query("INSERT INTO flightroute(FlightRouteId,FlightTo,FlightFrom,
							FlightName,Stoppage,StartDay,StartTime,Economy,Business,Normal,PriceEcomomy,
							PriceBuisness,PriceNormal)
							VALUES( '$FlightRouteId' ,'$to','$from' ,'$flight','$totalStoppage','$dayFor0Stoppage','$time0stoppage','$Economy0',
							'$Business0','$Normal0','$EconomyPrice0','$businessPrice0','$normalPrice0')");
							
							
							//--------------------------insert Date schedule
							for ($x = 1; $x <= $nextTotalWeek; $x++) {
								
								//-----------------Loop for  multiple insert of date
								$t=strtotime("+$x $dayFor0Stoppage");
								$d=date("Y/m/d",$t);
								
								$insertSchedule = mysql_query("INSERT INTO flightrouteschedule(FlightRouteId,
								StartDate,RemEconomy,RemBuisness,RemNormal)
								VALUES('$FlightRouteId','$d','$Economy0','$Business0','$Normal0')");
								
							}
							
							echo "<p style=\"color:green\";>**Success For Direct<p>";
							
						}else{
							echo "<p style=\"color:red\";>**This Flight,This To Form Data is already Added<p>";
						
						}
						
						
						
						
					}else{
						echo "<p style=\"color:red\";>**Wrong Date Formate,Use Google Chrome or Follow Exp for direct<p>";
					}
				}else if($totalStoppage==1){
					//----------------------If Derect Service whith 1 stoppage
					
					
					$time1stoppageDirect=$_POST['time1stoppageDirect'];
					$time1stoppageOnly=$_POST['time1stoppageOnly'];
					$toLocationStoppageOnly=$_POST['toLocationStoppageOnly'];
					if(!empty($time1stoppageDirect) && strlen($time1stoppageDirect)==5  && !empty($time1stoppageOnly) && strlen($time1stoppageOnly)==5){
						
						if($to!=$toLocationStoppageOnly && $from!=$toLocationStoppageOnly){
							//------------------------ if Input Time is valied
							$dayFor1StoppageDirect=$_POST['dayFor1StoppageDirect'];
							$Economy1D=$_POST['Economy1D'];
							$EconomyPrice1D=$_POST['EconomyPrice1D'];
							$Business1D=$_POST['Business1D'];
							$businessPrice1D=$_POST['businessPrice1D'];
							$Normal1D=$_POST['Normal1D'];
							$normalPrice1D=$_POST['normalPrice1D'];
							
		//--------------------------------------------------Insert In Database For Direct
							$FlightRouteId=$flight.$to.$from;
						
							//-------------------to check that is this data is already in database or not
							$query="SELECT * FROM flightroute WHERE FlightRouteId = '$FlightRouteId' ";
							$result = mysql_query($query); 

							if( mysql_num_rows($result)==0){
								//----------------------Insert In Database
						
								
								$insert = mysql_query("INSERT INTO flightroute(FlightRouteId,FlightTo,FlightFrom,
								FlightName,Stoppage,StartDay,StartTime,Economy,Business,Normal,PriceEcomomy,
								PriceBuisness,PriceNormal)
								VALUES('$FlightRouteId','$to','$from' ,'$flight','$totalStoppage','$dayFor1StoppageDirect','$time1stoppageDirect','$Economy1D',
								'$Business1D','$Normal1D','$EconomyPrice1D','$businessPrice1D','$normalPrice1D')");
								
								
								//--------------------------insert Date schedule
								for ($x = 1; $x <= $nextTotalWeek; $x++) {
									
									//-----------------Loop for  multiple insert of date
									$t=strtotime("+$x $dayFor1StoppageDirect");
									$d=date("Y/m/d",$t);
									
									$insertSchedule = mysql_query("INSERT INTO flightrouteschedule(FlightRouteId,
									StartDate,RemEconomy,RemBuisness,RemNormal)
									VALUES('$FlightRouteId','$d','$Economy1D','$Business1D','$Normal1D')");
									
								}
								
								
								
							}else{
								echo "<p style=\"color:red\";>**This Flight,This To Form Data is already Added<p>";
							
							}
							//-------------------------------------------
							//dayFor1StoppageOnly  time1stoppageOnly  toLocationStoppageOnly
							$dayFor1StoppageOnly=$_POST['dayFor1StoppageOnly'];
							$EconomyS1=$_POST['EconomyS1'];
							$EconomyPriceS1=$_POST['EconomyPriceS1'];
							$BusinessS1=$_POST['BusinessS1'];
							$businessPriceS1=$_POST['businessPriceS1'];
							$NormalS1=$_POST['NormalS1'];
							$normalPriceS1=$_POST['normalPriceS1'];
							$totalStoppage=0;
	//----------------------------------------------Insert In Database Form Stoppage 1
							$FlightRouteId=$flight.$toLocationStoppageOnly.$from;
						
							//-------------------to check that is this data is already in database or not
							$query="SELECT * FROM flightroute WHERE FlightRouteId = '$FlightRouteId' ";
							$result = mysql_query($query); 

							if( mysql_num_rows($result)==0){
								//----------------------Insert In Database
						
								
								$insert = mysql_query("INSERT INTO flightroute(FlightRouteId,FlightTo,FlightFrom,
								FlightName,Stoppage,StartDay,StartTime,Economy,Business,Normal,PriceEcomomy,
								PriceBuisness,PriceNormal)
								VALUES('$FlightRouteId','$toLocationStoppageOnly','$from' ,'$flight','$totalStoppage','$dayFor1StoppageOnly','$time1stoppageOnly','$EconomyS1',
								'$BusinessS1','$NormalS1','$EconomyPriceS1','$businessPriceS1','$normalPriceS1')");
								
								
								//--------------------------insert Date schedule
								for ($x = 1; $x <= $nextTotalWeek; $x++) {
									
									//-----------------Loop for  multiple insert of date
									$t=strtotime("+$x $dayFor1StoppageOnly");
									$d=date("Y/m/d",$t);
									
									$insertSchedule = mysql_query("INSERT INTO flightrouteschedule(FlightRouteId,
									StartDate,RemEconomy,RemBuisness,RemNormal)
									VALUES('$FlightRouteId','$d','$EconomyS1','$BusinessS1','$NormalS1')");
									
								}
								
								echo "<p style=\"color:green\";>**Success<p>";
								
							}else{
								echo "<p style=\"color:red\";>**This Flight,This To Form Data is already Added<p>";
							
							}
							
						}else{
							echo "<p style=\"color:red\";>**Stoppage will not be same as To or From<p>";
						}
						
					}else{
						echo "<p style=\"color:red\";>**Wrong Date Formate,Use Google Chrome or Follow Exp For Stoppage 1<p>";
					}
				}
			}
		}
?>