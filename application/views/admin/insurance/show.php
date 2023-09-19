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
				<h4 class="head3" style="display: inline-block;"> <strong>Insurance Detail</strong></h4>

				<div class="button-inline pull-right">
					<a href="<?= base_url('admin/insurances') ?>" class="btn btn-primary">View Insurance List</a>
				</div>
			</div>
		</section>

		<section class="panel">
			<div class="panel-body">
				<div class="panel-heading">
					<h4>Insurance Details</h4>
				</div>
				<div class="row ml-5">
					<div class="col-md-5">
						<p>Number: <span style="font-weight: 600;"><?= $policy['number']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Date of Birth: <span style="font-weight: 600;"><?= date('d F Y', strtotime($policy['dob'])); ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Starting: <span style="font-weight: 600;"><?= date('d F Y', strtotime($policy['start'])); ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Ending: <span style="font-weight: 600;"><?= date('d F Y', strtotime($policy['end'])); ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Duration: <span style="font-weight: 600;"><?= $policy['duration']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Variant: <span style="font-weight: 600;"><?= $policy['variat']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Premium: <span style="font-weight: 600;"><?= $policy['currency']; ?> <?= $policy['amount']; ?></span></p>
					</div>
					<div class="col-md-12 py-3">
						<h4>Policy Holder</h4>
					</div>
					<div class="col-md-5">
						<p>First Name: <span style="font-weight: 600;"><?= $policyholder['first_name']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Last Name: <span style="font-weight: 600;"><?= $policyholder['last_name']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Email Address: <span style="font-weight: 600;"><?= $policyholder['email']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Date of Birth: <span style="font-weight: 600;"><?= date('d F Y', strtotime($policyholder['dob'])); ?></span></span></p>
					</div>
					<div class="col-md-5">
						<p>Address: <span style="font-weight: 600;"><?= $policyholder['address']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Post Code: <span style="font-weight: 600;"><?= $policyholder['postcode']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>City: <span style="font-weight: 600;"><?= $policyholder['city']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Country: <span style="font-weight: 600;"><?= $policyholder['country']; ?></span></p>
					</div>
					<div class="col-md-12 py-3">
						<h4>Insured</h4>
					</div>
					<div class="col-md-5">
						<p>First Name: <span style="font-weight: 600;"><?= $insured['first_name']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Last Name: <span style="font-weight: 600;"><?= $insured['last_name']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Country: <span style="font-weight: 600;"><?= $insured['country']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p>Passport: <span style="font-weight: 600;"><?= $insured['passport']; ?></span></p>
					</div>
					<div class="col-md-5">
						<p class="text-capitalize">Student: <span style="font-weight: 600;"><?= $insured['student']; ?></span></p>
					</div>
				</div>
			</div>
		</section>

	</div>
</div>