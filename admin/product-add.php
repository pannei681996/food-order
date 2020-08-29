<?php
	include("config/conn.php");

	$name = $_POST['name'];
	$price = $_POST['price'];
	$categoryid = $_POST['categoryid'];
	$upload = $_FILES['upload']['name'];
	$tmp=$_FILES['upload']['tmp_name'];

	if($upload){
		move_uploaded_file($tmp, "upload/$upload");
	}

	$location="upload/".$upload;
	// echo $location;
	// $fileinfo=PATHINFO($_FILES["upload"]["name"]);

	// if(empty($fileinfo['filename'])){
	// 	$location="";
	// }
	// else{
	// $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	// move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	// $location="upload/" . $newFilename;
	// }

	
	
	$sql="insert into products (productname, categoryid, price, photo) values ('$name', '$categoryid', '$price', '$location')";
	$conn->query($sql);

	header('location:product.php');




?>