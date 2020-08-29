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