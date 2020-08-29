<?php 
	include("admin-nav.php"); 
	// include("category-modal.php");
	$sql = "SELECT * FROM categories ORDER BY categoryid desc";
	$result = mysqli_query($conn,$sql);
?>
<body >
	<div class="container" style="margin-top: 80px;">
		<h2 class="text-center">CATEGORY CURD</h2>
		<div class="row" style="margin-bottom: 8px;">
			<div class="col-md-12">
				<button class="float-right btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>Category</button>
				<div class="modal" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								New Category Insert Form
								<button class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="category-add.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="name">Category Name</label>
										<input type="text" name="name" class="form-control" id="name">
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
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th class="text-right">Action</th>
			</thead>
			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><?php echo $row['catname'] ?></td>
					<td class="text-right">
						<!-- <a href="category-edit.php?id=<?php echo $row['categoryid']?>" data-toggle="	modal" class="btn btn-success btn-sm">
							<span class="fas fa-pencil-alt"></span> Edit
						</a> -->
						<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['categoryid'] ?>" >
							<span class="fas fa-pencil-alt"></span> Edit
						</button>
						<div class="modal" id="editModal<?php echo $row['categoryid'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
											Edit Category
											<button class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
												<form action="category-edit.php" method="POST">
													<input type="hidden" name="id" value="<?php echo $row['categoryid'] ?>">
													<div class="form-group">
															<label for="name" class="float-left">Category Name
																<!-- <?php echo $edit_name; ?>
																<?php echo $edit_id; ?> -->
															</label>
															<input type="text" name="name" class="form-control" value=<?php echo $row['catname']; ?>>
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
						<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal<?php echo $row['categoryid'] ?>" >
							<span class="fas fa-trash-alt"></span> Delete
						</button>
						<div class="modal" id="delModal<?php echo $row['categoryid'] ?>">
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

										<a href="category-delete.php?id=<?php echo $row['categoryid']?>"  class="btn btn-danger btn-sm">
											<span class="fas fa-trash-alt"></span> Yes
										</a>
									</div>
									
								</div>
							</div>
						</div>
						
					</td>
				</tr>
			<?php endwhile; ?>	
		</table>

	</div>
	
</body>
