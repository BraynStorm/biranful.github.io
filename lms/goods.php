<?php 
	session_start();

	if(isset($_GET["id"]) && (int)$_GET["id"] > 0 ){
		
		require "dbConfig.php";
		$q = mysql_query("SELECT * FROM goods WHERE id=".$_GET["id"]) or die(mysql_error());
		if(mysql_num_rows($q)>0){
			$result = mysql_fetch_assoc($q) or die(mysql_error());
		}	
	}

	if(isset($_POST["idStock"])){
		require "dbConfig.php";
		$sql = "DELETE FROM goods WHERE id=".$_POST["idStock"];	
		unlink("goods/".$_POST["idStock"].".jpg");
		mysql_query($sql);
		header("Location: jewelry.php");
	}
	
	require "header.php";
?>
	<div class="content" id="goodsContent">
			<div id="container">
				
				<?php if(isset($result)){ ?>
				<div class="goodsName"><?php  echo $result["articleTitle"]; ?></div>
				<div id="imageNbuttonHolder">
					<img class="goodsImages" src="goods/<?php echo $result["id"]; ?>.jpg"/>
					<form id="purchaseOrderGOODS" action="purchaseOrder.php" method="get">
						<input type="hidden" name="id" value="<?php  echo $result["id"]; ?>"/>
						<input type="submit" value="Поръчай" id="orderButton"/>
					</form>
				</div>
				<div class="goodsDescription"><?php  echo $result["description"]; ?></div>
				<div class="goodsPrice"><?php  echo $result["price"]; ?></div>
				<?php } ?>
				
			</div>
			
	
	</div>
	
	<?php if($_SESSION["logged"]){ ?>
	<form id="deleteStock" action="" method="post">
		<input type="hidden" value="<?php echo $result["id"];?>" name="idStock"/>
		<input type="submit" id="deleteButton" value="Изтрий" name="deleteButton"/>
	</form>
	<form id="updateStock" action="updateStock.php" method="post">
		<input type="hidden" name="updateName" value="<?php  echo $result["articleTitle"]; ?>"/>
		<input type="submit" id="updateButton" value="Промени" name="updateButton"/>
	</form>
	<?php } ?>
	</body>
</html>