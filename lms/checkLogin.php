<?php
	require "dbConfig.php";
	
	$adminName=$_POST['username']; 
	$adminPass=$_POST['password']; 
	$q=mysql_query("SELECT * FROM admin WHERE username='$adminName' and password=".$adminPass);
	$result=mysql_num_rows($q);
	if($result==1){
		$_SESSION["logged"] = true;
		header("location:changeInventory.php");
	}

?>