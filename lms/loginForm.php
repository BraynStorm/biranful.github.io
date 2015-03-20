<?php
	session_start();
	if($_SESSION["logged"]){
		header("Location: index.php");
	}
	require "header.php";
?>
		<div class="content">
			<form id="login" action="checkLogin.php" method="post">
				<span>Име:</span>
				<input type="text" name="username"/>
				<span>Парола:</span>
				<input type="password" name="password"/>
				<input type="submit" name="submit" value="вход"/>
			</form>
		</div>
	</body>
</html>