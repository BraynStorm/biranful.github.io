<?php
	require "dbConfig.php";
	$temp=[];
	$i=0;
	if($_GET["cmd"]=="sendADozen"){
		
		$q = mysql_query("SELECT * FROM goods LIMIT 20")  or die(mysql_error());
		if(mysql_num_rows($q)>0){
			while(($result = mysql_fetch_assoc($q)) != NULL){
				$temp[$i]=$result;
				$i++;
			}
			echo json_encode($temp);
		}
	}