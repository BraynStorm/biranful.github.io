<?php
	session_start();
	
	if(isset($_GET["id"]) && (int)$_GET["id"] > 0 ){
		
		require "dbConfig.php";
		$q = mysql_query("SELECT * FROM goods WHERE id=".$_GET["id"]) or die(mysql_error());
		if(mysql_num_rows($q)>0){
			$result = mysql_fetch_assoc($q) or die(mysql_error());
		}	
	}
	$n = rand(0,100000);
	$to = "biranful@gmail.com";
	$subject = "Поръчка №".$n;
	$message = $subject . "\r\n Име на продукта: ";
	
	if($_GET["sendMail"]){
		$headers="From: " .$_GET["buyerName"]. "\r\n".
		"Reply-to".$_GET["buyerName"]."\r\n";
		
		if(mail("biarnful@gmail.com",$subject,$message, $headers)){
			
			echo "send";
		}
		else{
			echo "not send";
		}
		
		
	}
	require "header.php";
?>