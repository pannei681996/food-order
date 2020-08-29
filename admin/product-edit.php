<?php
	include("config/conn.php");
	$productid = $_POST['productid'];
	$productname = $_POST['productname'];
	$categoryid = $_POST['categoryid'];
	$price = $_POST['price'];
	$upload= $_FILES['upload']['name'];
	$tmp = $_FILES['upload']['tmp_name'];

	echo "$productid,$productname,$categoryid,$price";


	if($upload){
		move_uploaded_file($tmp, "upload/$upload");
		$location="upload/".$upload;
		$sql="UPDATE products SET productname='$productname', categoryid='$categoryid', price='$price', photo='$location' WHERE productid=$productid ";
	}
	else{
		$sql="UPDATE products SET productname='$productname', categoryid='$categoryid', price='$price' WHERE productid=$productid ";
	}

mysqli_query($conn, $sql);
header("location:product.php");



?>