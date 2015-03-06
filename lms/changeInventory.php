<?php
	require "header.php";
	
?>
		<div class="content" id="optionsContent">
		<form class="addStock" action="addStock.php" method="get">
			<fieldset class="addStockField">
				<legend>Добави продукт</legend>
				<p>Име:</p>
				<input type="text" name="stockTitle_add"/>
				<p>Описание:</p>
				<input type="text" name="stockDescription_add"/>
				<p>Цена:</p>
				<input type="text" name="stockPrice_add"/>
				<input type="submit" name="submit" value="Добави"/>
			</fieldset>
		</form>
		<form class="addStock" action="deleteStock.php" method="get">
			<fieldset class="addStockField">
				<legend>Изтрий продукт</legend>
				<p>ID на продукта:</p>
				<input type="text" name="stockID_remove"/>
				<input type="submit" name="submit" value="Премахни"/>
			</fieldset>
		</form>
		</div>
	</body>
</html>