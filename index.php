<?php 
	
	include("navbar.php");
	include("admin/config/conn.php");

	$sql = "SELECT * FROM products ORDER BY productid DESC";
	$result = mysqli_query($conn,$sql);	

	$sql_cat = "SELECT * FROM categories";
	$result_cat = mysqli_query($conn,$sql_cat);	

	$iterate = 0;



?>
<body>
	<div class="container" style="margin-top: 80px">
		<h2 class="text-center">MENU</h2>
		<form action="purchase.php" method="POST">
			<table class="table table-striped table-bordered">
				<thead>
						<th><input type="checkbox" name="check" id="checkAll"></th>
						<th>Photo</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
				</thead>
				<?php while($row = mysqli_fetch_assoc($result)): ?>
					<tr>
						<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
						<td><a href="product-detail.php"><img src="admin/<?php echo $row['photo']; ?>" height="30px" width="40px"></a?td>
						</td>
						<td><?php echo $row['productname']; ?></td>
						<td><?php echo number_format($row['price']); ?>Kyats</td>
						<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>" placeholder="Enter Quantity">
							</div>
						</td>
					</tr>
					<?php
						$iterate++;
					 	endwhile;
					?>	
			</table>
			<div class="row">
				<div class="col-md-3">
					<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
				</div>
				<div class="col-md-2" style="margin-left:-20px;">
					<button type="submit" class="btn btn-primary" style="float: right;"><span class="fas fa-save"></span> Save</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
