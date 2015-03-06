<?php 
	
	if(isset($_GET["id"]) && (int)$_GET["id"] > 0 ){
		
		require "dbConfig.php";
		$q = mysql_query("SELECT * FROM goods WHERE id=".$_GET["id"]) or die(mysql_error());
		if(mysql_num_rows($q)>0){
			$result = mysql_fetch_assoc($q) or die(mysql_error());
		}	
	}
	
	
	
	
	
	
	require "header.php";
?>
	<div class="content" id="goodsContent">
		<?php 
			
			if(isset($result)){
			 ?>
				<div class="goodsName"><?php  echo $result["articleTitle"]; ?></div>
				<img class="goodsImages" src="goods/<?php echo $result["id"]; ?>.jpg"/>
				<div class="goodsDescription"><?php  echo $result["description"]; ?></div>
				<div class="goodsPrice"><?php  echo $result["price"]; ?></div>
			<?php
			}
			
		?>
	</div>
	</body>
</html>