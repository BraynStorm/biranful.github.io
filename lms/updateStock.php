<?php
	session_start();
	require "dbConfig.php";
	
	
	require "header.php";
?>
		<div class="content">
			<form class="addStock" action="" method="post">
				<fieldset class="updateStockField">
					<legend>Промени информацията</legend>
					<p>Име:</p>
					<input type="type" name="stockTitle_update" value="<?php $_POST["updateName"] ?>"/>
					<p>Описание:</p>
					<input type="type" name="stockDescription_update"/>
					<p>Цена:</p>
					<input type="type" name="stockPrice_update"/>
					<input type="submit" name="submit" value="Промени"/>
				</fieldset>
			</form>
		</div>	
	</body>
</html>