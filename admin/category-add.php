<?php
	include("config/conn.php");
	$name = $_POST['name'];

	$sql = "INSERT INTO categories(catname) VALUES('$name')";
	mysqli_query($conn,$sql);

	header("location:category-list.php");

?>