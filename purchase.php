<?php
	session_start();
	include('conn.php');
	if(isset($_POST['productid'])){
 
		$customer=$_POST['customer'];
		$_SESSION["customer"]=$customer;
		$sql="insert into purchases (customer,date_purchase) values ('$customer', NOW())";
		$conn->query($sql);
		$pid=$conn->insert_id;
 
		$total=0;
 
		foreach($_POST['productid'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="select * from products where productid='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
 
		if (isset($_POST['quantity_'.$iterate])){
			$subt=$row['price']*$_POST['quantity_'.$iterate];
			$total+=$subt;

			$sql="insert into purchase_details (purchaseid, productid, quantity) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."')";
			$conn->query($sql);
		}
		endforeach;
 		
 		$sql="update purchases set total='$total' where purchaseid='$pid'";
 		$conn->query($sql);
		header('location:order-confirm.php');		
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='index.php';
		</script>
		<?php
	}
?>