<?php
	include("config/conn.php");
	$id = $_GET['id'];

	$sql = "DELETE FROM categories WHERE categoryid=$id";
	mysqli_query($conn, $sql);

	header("location:category-list.php");

?>