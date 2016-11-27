<?php include("Session-Active.php");?> 
<?php
	$oldPW=$_POST["currentPW"];
	$newPW=$_POST["newPW"];
	
	
	include("../SectionHome/config.php");
	
	$adminUN=$_SESSION["username"];
	
	//-------------------Get Old Password From Database
	$result= mysql_query("SELECT Password From admin  WHERE Username= '$adminUN'");
	while($res=mysql_fetch_array($result)){
		$PW=$res['Password'];
	}
	
	if($oldPW==$PW){
		//update New Password;
		$update= mysql_query("UPDATE admin SET Password='$newPW' WHERE Username= '$adminUN'");
	
		header("Location:AdminHome.php");
	}else{
		
		header("Location:LogOut.php");
	}
						
	

?>