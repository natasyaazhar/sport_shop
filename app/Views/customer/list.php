<div class="container">
	<?php
		if(session()->getFlashdata('status'))
		{
	?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Holy</strong> <?php session()->getFlashdata('status') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php
		}
	?>

	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Manage <b>Customers</b></h2>
				</div>
				<div class="col-sm-6">
					<a href="#addCustomerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a>
					<a href="#deleteCustomerModal" class="btn btn-danger delete_all_customer" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
				</div>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php if($customerList): ?>
					<?php foreach($customerList as $cust): ?>
						<tr>
							<input type="hidden" id="userId" name="id" value="<?php echo $cust['id']; ?>" >
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="data_checkbox[]" class="data_checkbox" name="data_checkbox[]" value="<?php echo $cust['id']; ?>">
									<label for="data_checkbox"></label>
								</span>
							</td>
							<td><?php echo $cust['name'] ?></td>
							<td><?php echo $cust['email'] ?></td>
							<td><?php echo $cust['address'] ?></td>
							<td><?php echo $cust['no_phone'] ?></td>
							<td>
								<a href="#editCustomerModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteCustomerModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>						
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<div class="clearfix">
			<!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
			<ul class="pagination">
				<?php echo $pager->links('group1', 'bs_pagination'); ?>
			</ul>
		</div>
	</div>
</div>

<!-- Start Add Modal HTML -->
<div id="addCustomerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('/customer/store') ?>" method="POST">
				<?= csrf_field() ?>
				<div class="modal-header">						
					<h4 class="modal-title">Add Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="cust_name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="cust_email" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="cust_address" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="cust_no_phone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Add Modal HTML -->

<!-- Start Edit Modal HTML -->
<div id="editCustomerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('/customer/update') ?>" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="cust_id" class="update_id" >
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control update_name" name="cust_name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control update_email" name="cust_email" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control update_address" name="cust_address" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control update_no_phone" name="cust_no_phone" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Edit Modal HTML -->

<!-- Delete Modal HTML -->
<div id="deleteCustomerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('/customer/delete') ?>" method="POST">
				<input type="hidden" name="delete_id" class="delete_id" >
				<div class="modal-header">						
					<h4 class="modal-title">Delete Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>