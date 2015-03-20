<?php
	session_start();
	
	if(isset($_GET["id"]) && (int)$_GET["id"] > 0 ){
		
		require "dbConfig.php";
		$q = mysql_query("SELECT * FROM goods WHERE id=".$_GET["id"]) or die(mysql_error());
		if(mysql_num_rows($q)>0){
			$result = mysql_fetch_assoc($q) or die(mysql_error());
		}	
	}

	require "header.php";
?>
	
		<div class="content">
			<form action="purchaseComplete.php" method="get">
				<table id="tableStylize">
					<tbody>
						<tr>
						<td>Име на продукта:</td><td><?php echo $result["articleTitle"]; ?></td>
						</tr>
						<tr>
						<td>Описание на продукта:</td><td><?php echo $result["description"]; ?></td>
						</tr>
						<tr>
						<td>Цена:</td><td> <?php echo $result["price"]; ?></td>
						</tr>
						<tr>
						<td>Име:</td><td> <input type="text" name="buyerName" class="insertInformation"/></td>
						</tr>
						<tr>
						<td>Презиме:</td><td><input type="text" name="buyerSurName"/></td>	
						</tr>
						<tr>
						<td>Фамилия:</td><td><input type="text" name="buyerLastName"/></td>
						</tr>
						<tr>
						<td>Град:</td><td><input type="text" name="buyerTown"/></td>
						</tr>
						<tr>
						<td>Адрес:</td><td><input type="text" name="buyerAddress"/></td>
						</tr>
						<tr>
						<td>Телефонен номер:</td><td><input type="text" name="buyerPhone"/></td>
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="stockName" value="<?php echo $result["articleTitle"]; ?>"/>
				<input type="hidden" name="stockDescription" value="<?php echo $result["description"]; ?>"/>
				<input type="hidden" name="stockPrice" value="<?php echo $result["price"]; ?>"/>
				<input type="hidden" name="idIfBadOrder" value="<?php echo $result["id"]; ?>"/>
				<input type="submit" name="sendMail" id="sendButton" value="Поръчай"/>
			</form>
		</div>	
	</body>
</html>