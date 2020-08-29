<?php 
	
	include("admin-nav.php");

	$sql = "SELECT * FROM products ORDER BY productid DESC";
	$result = mysqli_query($conn,$sql);	

	$sql_cat = "SELECT * FROM categories";
	$result_cat = mysqli_query($conn,$sql_cat);	



?>
<body>
	<div class="container" style="margin-top: 80px">
		<h2 class="text-center">PRODUCTS CRUD</h2>
		<div class="row" style="margin-bottom: 8px;">
			<div class="col-md-12">
				<!-- <a href="#addproduct" data-toggle="modal" data-target="#myModal" class="float-right btn btn-primary"><i class="fas fa-plus"></i> Product</a> --> 
				<button class="float-right btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>Product</button>
				<div class="modal" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								New Products Insert Form
								<button class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="product-add.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="name">Product Name</label>
										<input type="text" name="name" class="form-control" id="name">
									</div>
									<div class="form-group">
										<label for="price">Product Price</label>
										<input type="text" name="price" class="form-control" id="price">
									</div>
									<div class="form-group">
										<label for="category">Category</label>
										<select name="categoryid" class="form-control" id="category">
											<option value="0">--Option--</option>
											<?php while($row = mysqli_fetch_assoc($result_cat)): ?>
												<option value="<?php echo $row['categoryid']; ?>"><?php echo $row["catname"];?></option>
											<?php endwhile; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="upload">Photo Upload</label>
										<input type="file" name="upload" id="upload" class="form-control">
									</div>
									<div class="form-group">
											<button type="submit" class="float-right btn btn-info"><span class="fas fa-save"></span> Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<table class="table table-striped table-bordered">
			<thead>
					<th>Photo</th>
					<th>Product Name</th>
					<th>Price</th>
					<th class="text-center">Action</th>
			</thead>
			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><img src="<?php echo $row['photo']; ?>" height="30px" width="40px">
					</td>
					<td><?php echo $row['productname']; ?></td>
					<td><?php echo number_format($row['price']); ?>Kyats</td>
					<td class="text-right">
						<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['productid'] ?>" >
							<span class="fas fa-pencil-alt"></span> Edit
						</button>
						<div class="modal" id="editModal<?php echo $row['productid'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
											Edit Products
											<button class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
												<form action="product-edit.php" method="POST" enctype="multipart/form-data">
													<input type="hidden" name="productid" value="<?php echo $row['productid'] ?>">
													<div class="form-group">
															<label for="name" class="float-left">Product Name</label>
															<input type="text" name="productname" id="name" class="form-control" value="<?php echo $row['productname']; ?>">
													</div>
													<div class="form-group">
															<label for="price" class="float-left">Product price</label>
															<input type="text" name="price" class="form-control" value=<?php echo $row['price']; ?>>
													</div>
													<div class="form-group">
														<label for="category" class="float-left">Category</label>
														<select name="categoryid" class="form-control" id="category">
														<?php
															$categories = mysqli_query($conn,"SELECT categoryid,catname FROM categories");
																while($cat = mysqli_fetch_assoc($categories)):
														?>
																<option value="<?php echo $cat['categoryid'] ?>"
																<?php if($cat['categoryid'] == $row['categoryid']) echo "selected" ?> >
																<?php echo $cat['catname'] ?>

																</option>
																<?php endwhile; ?>	
														</select>
													</div>
				
													<div class="form-group">
															<label for="upload" class="float-left">Product photo</label>
															<input type="file" name="upload" class="form-control" value=<?php echo $row['photo']; ?>>
													</div>
													<div class="form-group">
														<a data-dismiss="modal" class="btn btn-info btn-sm ">
															<span class="fas fa-times"></span> Cancle
														</a>
														<button type="submit" class="btn btn-success btn-sm">
															<span class="fas fa-pencil-alt"></span>Update
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
							</div>
						</div>

					|| 
					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal<?php echo $row['productid'] ?>">
							<span class="fas fa-trash-alt"></span> Delete
						</button>
						<div class="modal" id="delModal<?php echo $row['productid'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										Are you sure to delete?
										<button class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-footer">
										<a data-dismiss="modal" class="btn btn-info btn-sm ">
											<span class="fas fa-times"></span> Cancle
										 </a>

										<a href="product-delete.php?id=<?php echo $row['productid']?>" class="btn btn-danger btn-sm">
											<span class="fas fa-trash-alt"></span> Yes
										</a>
									</div>
									
								</div>
							</div>
						</div>	
					<!-- <a href="product-delete.php?id=<?php echo $row['productid']?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span> Delete</a> --></td>
				</tr>
			<?php endwhile;?>	
		</table>
	</div>
</body>
