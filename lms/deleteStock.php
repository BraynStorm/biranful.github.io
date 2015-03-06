<?php

	require "dbConfig.php";
	
	$stockID = $_GET["stockID_remove"];
	
	$sql = "DELETE FROM goods WHERE id=".$stockID;
	
	mysql_query($sql);

?>