<?php

	require "dbConfig.php";
	
	$addStock_Name = $_GET["stockName_add"];
	$addStock_Title = $_GET["stockTitle_add"];
	$addStock_Description = $_GET["stockDescription_add"];
	$addStock_Price = $_GET["stockPrice_add"];
	
	$sql = "INSERT INTO goods (name, articleTitle, description, price) VALUES ('$addStock_Name', '$addStock_Title', '$addStock_Description', '$addStock_Price')";
	
	mysql_query($sql);

?>