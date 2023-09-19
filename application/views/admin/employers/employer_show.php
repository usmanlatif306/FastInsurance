<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body with-border">
				<div class="col-md-6">
					<h4><i class="fa fa-plus"></i> &nbsp; Add New Employer</h4>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= base_url('admin/employer'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Employers List</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Employer Users Resumes</h3>
				</div>
				<section class="panel">
					<div class="panel-body">
						<div class="adv-table">
							<table id="na_datatable" class="table table-bordered table-striped" style="width: 100%">
								<thead>
									<tr>
										<th class="text-center">User Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Resume</th>
										<th class="text-center">Passport</th>
										<th class="text-center">Birth Certificate</th>
									</tr>
								</thead>
								<tbody>
									<?php if (empty($users_info)) : ?>
										<p class="text-gray"><strong><?= trans('sorry') ?>,</strong> <?= trans('no_user_yet') ?></p>
									<?php endif; ?>

									<?php foreach ($users_info as $user) : ?>
										<tr>
											<td class="text-center"><?= $user->firstname . ' ' . $user->lastname; ?></td>
											<td class="text-center"><?= $user->email; ?></td>
											<td class="text-center">
												<?php if ($user->resume) : ?>
													<a class="btn btn-xs btn-primary" href="<?= base_url() . $user->resume; ?>">Download</a>
												<?php else : ?>
													<small class="text-primary">User has not uploaded CV</small>
												<?php endif; ?>
											</td>
											<td class="text-center">
												<?php if ($user->passport) : ?>
													<a class="btn btn-xs btn-primary" href="<?= base_url() . $user->passport; ?>">Download</a>
												<?php else : ?>
													<small class="text-primary">User has not uploaded passport</small>
												<?php endif; ?>
											</td>
											<td class="text-center">
												<?php if ($user->birth_certificate) : ?>
													<a class="btn btn-xs btn-primary" href="<?= base_url() . $user->birth_certificate; ?>">Download</a>
												<?php else : ?>
													<small class="text-primary">User has not uploaded birth certificate</small>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
				<!-- <div class="box-body my-form-body">
					<div class="onjob-job-alerts">
						<div class="table-responsive">
							<table>
								<thead>
									<tr>
										<th class="text-center"><?= trans('name') ?></th>
										<th class="text-center"><?= trans('email') ?></th>
										<th class="text-center"><?= trans('resume') ?></th>
									</tr>
								</thead>
								<tbody>
									<?php if (empty($users_info)) : ?>
										<p class="text-gray"><strong><?= trans('sorry') ?>,</strong> <?= trans('no_posted_job_yet') ?></p>
									<?php endif; ?>

									<?php foreach ($users_info as $user) : ?>
										<tr>
											<td class="text-center"><?= $user->firstname . ' ' . $user->lastname; ?></td>
											<td class="text-center"><?= $user->email; ?></td>
											<td class="text-center">
												<a class="btn btn-outline" href="<?= base_url() . $user->resume; ?>"><i class="lnr lnr-download"></i> <small><?= trans('resume_down_msg') ?></small></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div> -->

			</div>
			<!-- /.box-body -->
		</div>
	</div>
	</div>
</section>