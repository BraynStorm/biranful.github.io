<?php

	require "dbConfig.php";
	
	$addStock_Title = $_GET["stockTitle_add"];
	$addStock_Description = $_GET["stockDescription_add"];
	$addStock_Price = $_GET["stockPrice_add"];
	
	$sql = "INSERT INTO goods (articleTitle, description, price) VALUES ('$addStock_Title', '$addStock_Description', '$addStock_Price')";
	
	mysql_query($sql);

?>