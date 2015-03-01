<?php
	header('Content-Type: text/javascript');

	$results = [];
	$i = 0;
	if(isset($_GET["cmd"])){
		$cmd = $_GET["cmd"];
		if($cmd == "requestpages"){
			mysql_connect("localhost", "root", "slabaksym33");
			mysql_select_db("biranful");
			$q = mysql_query("SELECT * FROM pages");
			if(mysql_num_rows($q)>0){
				while(($result = mysql_fetch_assoc($q))!=NULL){
					$results[$i] = ($result);
					$i++;
				}
				echo json_encode($results);
			}
		}
		
	}