<?php 
	session_start();
	include("navbar.php");
	include("admin/config/conn.php");

	$customer = $_SESSION["customer"];

	$sql="select purchaseid from purchases where customer='$customer'";
	$result=mysqli_query($conn,$sql);
	$id=mysqli_fetch_assoc($result);

	$sql="select total from purchases where customer='$customer'";
	$res_total=mysqli_query($conn,$sql);
	$total=mysqli_fetch_assoc($res_total);

	
							                               
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation Page</title>
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="text-center">
			<h1><i class="fas fa-circle"></i>Thanks Your Order</h1>
		<div>	
		<?php 
		$sql="select * from purchase_details left join products on products.productid=purchase_details.productid where purchaseid='".$id['purchaseid']."'";
		$dquery=mysqli_query($conn,$sql);
		?>
		<div class="float-left" style="margin-bottom: 20px;">Customer: <b><?php echo $customer; ?></b></div>
		<table class="table table-bordered">
			<thead>
				<th>Products Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			</thead>
			<tr>
			<?php while($drow=mysqli_fetch_assoc($dquery)): ?>
			
				<tr>
					<td><?php echo $drow['productname']; ?></td>
					<td class="text-right"><?php echo number_format($drow['price']); ?> Kyats</td>
					<td><?php echo $drow['quantity']; ?></td>
					<td class="text-right">
					<?php $subt = $drow['price']*$drow['quantity']; echo number_format($subt); ?> Kyats </td>
				</tr> 
				<tr>
					<td colspan="3" class="text-right"><b>TOTAL</b></td>
					<td class="text-right"> <?php echo number_format($total['total']); ?> Kyats</td>
				</tr>
			<?php endwhile; ?>                 
			
		</table>	
	</div>
</body>
</html>