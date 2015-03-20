<?php
	session_start();

	require "dbConfig.php";
	if(!$_SESSION["logged"]){
		header("Location: index.php");
	}
	
	
	//uploading information about the stock & uploading the image
	$checkIfImgIsUploadedCorrectly = false;
	
	if(isset($_POST["stockTitle_add"]) && isset($_POST["stockDescription_add"]) && isset($_POST["stockPrice_add"])){
		$addStock_Title = $_POST["stockTitle_add"];
		$addStock_Description = $_POST["stockDescription_add"];
		$addStock_Price = $_POST["stockPrice_add"];
		
		$sql = "INSERT INTO goods (articleTitle, description, price) VALUES ('$addStock_Title', '$addStock_Description', '$addStock_Price')";
		mysql_query($sql) or die(mysql_error());
		//selecting image to upload and setting it's name to requested id
		$q = mysql_query("SELECT id FROM goods ORDER BY id DESC LIMIT 1") or die(mysql_error());
		$ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
		$target_file = "goods/" . (mysql_fetch_assoc($q)["id"]).".jpg";
		//converting any image TO .JPG
		if (preg_match('/jpg|jpeg/i',$ext))
			$imageTmp=imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
		else if (preg_match('/png/i',$ext))
			$imageTmp=imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
		else if (preg_match('/gif/i',$ext))
			$imageTmp=imagecreatefromgif($_FILES["fileToUpload"]["tmp_name"]);
		else if (preg_match('/bmp/i',$ext))
			$imageTmp=imagecreatefrombmp($_FILES["fileToUpload"]["tmp_name"]);
		//uploading all information on the database and the image in the directory
		
		if (imagejpeg($imageTmp, $target_file, 80)) {
			$checkIfImgIsUploadedCorrectly = true;
		}
		imagedestroy($imageTmp);
	}
	//END OF - uploading information about the stock & uploading the image
	require "header.php";

?>
		<div class="content" id="optionsContent">
			<form class="addStock" action="" method="post" enctype="multipart/form-data">
				<fieldset class="addStockField">
					<legend>Добави продукт</legend>
					<p>Име:</p>
					<input type="text" name="stockTitle_add"/>
					<p>Описание:</p>
					<input type="text" name="stockDescription_add"/>
					<p>Снимка:</p>
					<input type="file" name="fileToUpload"/>
					<p>Цена:</p>
					<input type="text" name="stockPrice_add"/>
					<input type="submit" name="submit" value="Добави"/>
				</fieldset>
			</form>
			<?php 
				if(!$checkIfImgIsUploadedCorrectly && isset($_POST["stockTitle_add"]) && isset($_POST["stockDescription_add"]) && isset($_POST["stockPrice_add"])){
					echo "<div id=\"error\">Имаше грешка при добавянето на стоката</div>";
				}
			?>
		</div>
	</body>
</html>