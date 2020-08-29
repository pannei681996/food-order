<?php
	include("config/conn.php");
	$id = $_GET['id'];

	$sql = "DELETE FROM products WHERE productid=$id";
	mysqli_query($conn, $sql);

	header("location:product.php");

?>