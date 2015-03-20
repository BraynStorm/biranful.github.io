<?php 
	if(session_status() == PHP_SESSION_NONE){
    session_start();
	$_SESSION["logged"] = false;
	}
		
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8"/>
		<title>temp</title>
		<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
</head>
<body>
		<div id="topOutput">
			<?php if(!$_SESSION["logged"]){ ?>
				<form id="login" action="loginForm.php" method="post">
					<input type="submit" name="submit" value="вход" class="headerButtons"/>
				</form>
			<?php } ?>
			<?php if($_SESSION["logged"]){ ?>
				<div id="logout">
					<a href="logout.php"><input type="button" value="Изход" class="headerButtons"/></a>
				</div>
				<div id="changeInv">
					<a href="changeInventory.php"><input type="button" value="Добавяне" class="headerButtons"/></a>
				</div>
				<div id="orders">
					<a href="orders.php"><input type="button" value="Поръчки" class="headerButtons"/></a>
				</div>
			<?php } ?>
		</div>
		<div id="topBorder"></div>
		<div id="logo"></div>
		<div id="menuBar">
			<div class="buttons"></div>
			<div class="buttons"></div>
			<div class="buttons"></div>
			<div class="buttons"></div>
			<div class="buttons"></div>
		</div>
		<div id="tooltip"></div>
		
