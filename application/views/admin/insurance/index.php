<div class="row">
	<div class="col-lg-12">
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> <strong>
					<?= $this->session->flashdata('success') ?>
				</strong>
			</div>
		<?php endif; ?>

		<section class="panel">
			<div class="panel-body">
				<h4 class="head3" style="display: inline-block;"> <strong>Insurance List</strong></h4>
			</div>
		</section>

		<section class="panel">
			<div class="panel-body">
				<div class="panel-heading">
					<h4>Insurance Lists</h4>
				</div>
				<div class="adv-table">
					<table class="mv_datatable display table table-bordered table-striped">
						<thead>
							<tr>
								<th> #</th>
								<th>Number</th>
								<th>Start</th>
								<th>End</th>
								<th>Duration</th>
								<th>Name</th>
								<th>Email</th>
								<th>DOB</th>
								<th>Payment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($policies as $index => $policy) : ?>
								<tr>
									<td><?= $index + 1; ?></td>
									<td><?= $policy['number']; ?></td>
									<td><?= date('d F Y', strtotime($policy['start'])); ?></td>
									<td><?= date('d F Y', strtotime($policy['end'])); ?></td>
									<td><?= $policy['duration']; ?></td>
									<td><?= $policy['first_name']; ?> <?= $policy['last_name']; ?></td>
									<td><?= $policy['email']; ?></td>
									<td><?= date('d F Y', strtotime($policy['dob'])); ?></td>
									<td class="text-capitalize"><?= $policy['payment']; ?></td>
									<td>
										<a class="edit btn btn-xs btn-primary" href="<?= base_url("admin/insurance/show/" . $policy['policy_id']); ?>" title="View">
											<i class="fa fa-eye"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- page end-->
<script src="<?php echo base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
	$(' .mv_datatable').DataTable();
</script>
<script>
	$('li#jobs').addClass('active');
</script>