	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						<?= trans('company_details') ?>
					</h1>
					<p class="text-white link-nav"><a href="<?= base_url(); ?>"><?= trans('label_home') ?> </a> <span class="lnr lnr-arrow-right"></span> <a href=""> <?= trans('company_details') ?></a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start post Area -->
	<section class="post-area section-gap">
		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-4 sidebar">
					<?php $this->load->view($emp_sidebar); ?>
				</div>
				<div class="col-lg-8 post-list">

					<?php if ($this->session->flashdata('file_error')) {
						echo '<div class="alert alert-danger">' . $this->session->flashdata('file_error') . '</div>';
					} ?>

					<?php
					if ($this->session->flashdata('update_success')) {
						echo '<div class="alert alert-success">' . $this->session->flashdata('update_success') . '</div>';
					}
					if ($this->session->flashdata('error_update')) {
						echo '<div class="alert alert-danger">' . $this->session->flashdata('error_update') . '</div>';
					}
					?>

					<div class="profile_job_content col-lg-12">
						<div class="headline">
							<h3> <?= trans('company_users') ?></h3>
						</div>

						<div class="onjob-job-alerts">
							<div class="table-responsive">
								<table>
									<thead>
										<tr>
											<th class="text-center"><?= trans('user_name') ?></th>
											<th class="text-center"><?= trans('user_email') ?></th>
											<th class="text-center"><?= trans('user_resume') ?></th>
											<th class="text-center"><?= trans('user_passport') ?></th>
											<th class="text-center"><?= trans('user_birth') ?></th>
										</tr>
									</thead>
									<tbody>
										<?php if (empty($users)) : ?>
											<p class="text-gray"><strong><?= trans('sorry') ?>,</strong> <?= trans('no_user_yet') ?></p>
										<?php endif; ?>

										<?php foreach ($users as $user) : ?>
											<tr>
												<td class="text-center"><?= $user->firstname . ' ' . $user->lastname; ?></td>
												<td class="text-center"><?= $user->email; ?></td>
												<td class="text-center">
													<?php if ($user->resume) : ?>
														<a class="" href="<?= base_url() . $user->resume; ?>"><?= trans('download') ?></a>
													<?php else : ?>
														<small class="text-primary"><?= trans('not_upload') ?></small>
													<?php endif; ?>
												</td>
												<td class="text-center">
													<?php if ($user->passport) : ?>
														<a class="" href="<?= base_url() . $user->passport; ?>"><?= trans('download') ?></a>
													<?php else : ?>
														<small class="text-primary"><?= trans('not_upload') ?></small>
													<?php endif; ?>
												</td>
												<td class="text-center">
													<?php if ($user->birth_certificate) : ?>
														<a class="" href="<?= base_url() . $user->birth_certificate; ?>"><?= trans('download') ?></a>
													<?php else : ?>
														<small class="text-primary"><?= trans('not_upload') ?></small>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End post Area -->