<?php

 include('config/conn.php');

 $name = $_POST['name'];
 $id = $_POST['id'];

 $sql = "UPDATE categories SET catname='$name' WHERE categoryid=$id";
 echo $sql;
  mysqli_query($conn,$sql);

  header("location:category-list.php");

?>