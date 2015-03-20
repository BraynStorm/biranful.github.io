<?php
	session_start();
	require "dbConfig.php";
	if(isset($_GET["id"]) && (int)$_GET["id"] > 0 ){
		
		$q = mysql_query("SELECT * FROM goods WHERE id=".$_GET["id"]) or die(mysql_error());
		if(mysql_num_rows($q)>0){
			$result = mysql_fetch_assoc($q) or die(mysql_error());
		}	
	}
	require "header.php";
	
	$stockName = $_GET["stockName"];
	$stockDescription = $_GET["stockDescription"];
	$stockPrice = $_GET["stockPrice"];
	$buyerName = $_GET["buyerName"];
	$buyerSurName = $_GET["buyerSurName"];
	$buyerLastName = $_GET["buyerLastName"];
	$buyerTown = $_GET["buyerTown"];
	$buyerAddress = $_GET["buyerAddress"];
	$buyerPhone = $_GET["buyerPhone"];
	if(!empty($buyerName) && !empty($buyerSurName) && !empty($buyerLastName) && !empty($buyerTown) && !empty($buyerAddress) && !empty($buyerPhone)){
		
		$sql = "INSERT INTO orders (stockName, stockDescription, stockPrice, buyerName, buyerSurName, buyerLastName, buyerTown, buyerAddress, buyerPhone)".
		"VALUES ('$stockName', '$stockDescription', '$stockPrice', '$buyerName', '$buyerSurName', '$buyerLastName', '$buyerTown', '$buyerAddress', '$buyerPhone')";
		mysql_query($sql) or die(mysql_error());
		
		echo "Въведената информация е валидна.";
		
		
	}else{
		header("Location: purchaseOrder.php?id=".$_GET["idIfBadOrder"]);
	}
	
	
	
	
?>