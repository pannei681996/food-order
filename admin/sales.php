<body>
<?php 
	include('admin-nav.php');
	include ('config/conn.php');
 ?>
<div class="container" style="margin-top: 80px;">
	<h1 class="page-header text-center">SALES</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date</th>
			<th>Customer</th>
			<th>Total Sales</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from purchases order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right"><?php echo number_format($row['total'], 2); ?> Kyats</td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fas fa-search"></span> View </a>
							<div class="modal" id="details<?php echo $row['purchaseid'] ?>">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											Order Details
											<button class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
							                <div class="container">
							                    <h6>Customer: <b><?php echo $row['customer']; ?></b>
							                        <span class="float-right">
							                            <?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?>
							                        </span>
							                    </h6>
							                    <table class="table table-bordered table-striped">
							                        <thead>
							                            <th>Product Name</th>
							                            <th>Price</th>
							                            <th>Purchase Quantity</th>
							                            <th>Subtotal</th>
							                        </thead>
							                        <tbody>
							                            <?php
							                                $sql="select * from purchase_details left join products on products.productid=purchase_details.productid where purchaseid='".$row['purchaseid']."'";
							                                $dquery=mysqli_query($conn,$sql);
							                                while($drow=mysqli_fetch_assoc($dquery)){
							                                    ?>
							                                    <tr>
							                                        <td><?php echo $drow['productname']; ?></td>
							                                        <td class="text-right"><?php echo number_format($drow['price'], 2); ?>Kyats</td>
							                                        <td><?php echo $drow['quantity']; ?></td>
							                                        <td class="text-right">
							                                            <?php
							                                                $subt = $drow['price']*$drow['quantity'];
							                                                echo number_format($subt, 2);
							                                            ?>
							                                             Kyats
							                                        </td>
							                                    </tr>
							                                    <?php
							                                    
							                                }
							                            ?>
							                            <tr>
							                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
							                                <td class="text-right"> <?php echo number_format($row['total'], 2); ?> Kyats</td>
							                            </tr>
							                        </tbody>
							                    </table>

							                </div>
										</div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-success" data-dismiss="modal"> Close</button>
							            </div>
									</div>
								</div>
							</div>
							
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>