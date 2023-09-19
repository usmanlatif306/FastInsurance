<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Complete personal data of an insured and a policyholder
				</h1>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start information -->
<section class="featured-cities-area section-full" id="Cities">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<?php if ($this->session->flashdata('validation_errors')) {
					echo '<div class="alert alert-danger">' . $this->session->flashdata('validation_errors') . '</div>';
				} ?>
				<?php $attributes = array('id' => 'save_details', 'method' => 'post');
				echo form_open('home/save_details', $attributes); ?>

				<div class="profile_job_content col-lg-12 ">
					<div class="headline">
						<h3>Insured person</h3>
					</div>
					<div class="profile_job_detail">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('first_name') ?> *</h5>
									<input class="form-control" type="text" name="firstname" value="<?= $quote['firstname']  ?>" placeholder="John Wick" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('last_name') ?> *</h5>
									<input class="form-control" type="text" name="lastname" value="<?= $quote['lastname']  ?>" placeholder="John Wick" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('nationality') ?> *</h5>
									<select name="nationality" class="form-control" required>
										<option><?= trans('select_nationality') ?></option>
										<?php foreach ($countries as $country) : ?>
											<?php if ($quote['country'] == $country['id']) : ?>
												<option value="<?= $country['id']; ?>" selected> <?= $country['name']; ?> </option>
											<?php else : ?>
												<option value="<?= $country['id']; ?>"> <?= $country['name']; ?> </option>
										<?php endif;
										endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('dob') ?>:</h5>
									<input class="form-control" type="date" name="dob" value="<?= $quote['dob']  ?>" disabled>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>Passport Number</h5>
									<input class="form-control" type="text" name="passport" value="<?= $quote['passport']  ?>" placeholder="12345678" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="contact100-form-checkbox pl-2">
									<input class="input-checkbox100" id="ckb1" type="checkbox" name="student" <?= $quote['student'] === 'yes' ? 'checked' : '' ?> disabled>
									<label class="label-checkbox100 text-black" for="ckb1">
										Student
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="profile_job_content col-lg-12 mt-5">
					<div class="headline">
						<h3>Policyholder</h3>
					</div>
					<div class="profile_job_detail">
						<div class="row mb-4">
							<div class="col-md-4 col-sm-12">
								<div class="contact100-form-checkbox pl-2">
									<input class="input-checkbox100" id="same_insured" type="checkbox" name="type" value="same_insured">
									<label class="label-checkbox100 text-black" for="same_insured">
										Same As Insured
									</label>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="contact100-form-checkbox pl-2">
									<input class="input-checkbox100" id="person" type="checkbox" name="type" value="person" checked>
									<label class="label-checkbox100 text-black" for="person">
										Person
									</label>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="contact100-form-checkbox pl-2">
									<input class="input-checkbox100" id="company" type="checkbox" name="type" value="company">
									<label class="label-checkbox100 text-black" for="company">
										Company
									</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="row d-none" id="companyFields">
									<div class="col-md-6 col-sm-12">
										<div class="submit-field">
											<h5>Name</h5>
											<input class="form-control" type="text" name="company_name" value="<?= $quote['company_name']  ?>" placeholder="Company Name">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="submit-field">
											<h5>Identification Number</h5>
											<input class="form-control" type="text" name="identification_number" value="<?= $quote['identification_number']  ?>" placeholder="Company Identification Number">
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-12" id="policyholder_firstname">
								<div class="submit-field">
									<h5><?= trans('first_name') ?> *</h5>
									<input class="form-control" type="text" name="policyholder_firstname" value="<?= $quote['policyholder_firstname']  ?>" placeholder="John Wick">
								</div>
							</div>

							<div class="col-md-6 col-sm-12" id="policyholder_lastname">
								<div class="submit-field">
									<h5><?= trans('last_name') ?> *</h5>
									<input class="form-control" type="text" name="policyholder_lastname" value="<?= $quote['policyholder_lastname']  ?>" placeholder="John Wick">
								</div>
							</div>

							<div class="col-md-6 col-sm-12" id="policyholder_dob">
								<div class="submit-field">
									<h5><?= trans('dob') ?>:</h5>
									<input class="form-control" type="date" name="policyholder_dob" value="<?= $quote['policyholder_dob']  ?>">
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>Address</h5>
									<input class="form-control" type="text" name="policyholder_address" value="<?= $quote['policyholder_address']  ?>" placeholder="Address" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>Postal/Zip Code</h5>
									<input class="form-control" type="text" name="policyholder_postal_code" value="<?= $quote['policyholder_postal_code']  ?>" placeholder="Postal/Zip Code" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>City</h5>
									<input class="form-control" type="text" name="policyholder_city" value="<?= $quote['policyholder_city'] ?>" placeholder="City" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>State/Province</h5>
									<input class="form-control" type="text" name="policyholder_state" value="<?= $quote['policyholder_state'] ?>" placeholder="State/Province" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('nationality') ?> *</h5>
									<select name="policyholder_nationality" class="form-control" required>
										<option><?= trans('select_nationality') ?></option>
										<?php foreach ($countries as $country) : ?>
											<?php if ($quote['policyholder_nationality'] == $country['id']) : ?>
												<option value="<?= $country['id']; ?>" selected> <?= $country['name']; ?> </option>
											<?php else : ?>
												<option value="<?= $country['id']; ?>"> <?= $country['name']; ?> </option>
										<?php endif;
										endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5><?= trans('email') ?> *</h5>
									<input class="form-control" type="email" name="policyholder_email" value="<?= $quote['policyholder_email'] ?>" placeholder="example@example.com" required>
								</div>
							</div>

							<div class="col-md-6 col-sm-12">
								<div class="submit-field">
									<h5>Repeat Email</h5>
									<input class="form-control" type="email" name="policyholder_repeat_email" value="<?= $quote['policyholder_repeat_email'] ?>" placeholder="example@example.com" required>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="profile_job_content col-lg-12 mt-5">
					<div class="headline">
						<h3>Important statements</h3>
					</div>
					<div class="profile_job_detail">
						<div class="row">
							<div class="col-12">
								<div class="contact100-form-checkbox">
									<input class="input-checkbox100" id="terms_condition" type="checkbox" name="terms_condition" <?= $quote['terms_condition'] === 'on' ? 'checked' : '' ?> required>
									<label class="label-checkbox100 text-black" for="terms_condition">
										I Agree*
									</label>
								</div>
								<p>Prior to the conclusion of this contract I have read and accepted the General Conditions of the Insurance (GTC), Insurance Product Information Document (IPID), Terms of Use, Privacy Policy, price proposal and I hereby undertake to familiarize all Insured persons with these documents.</p>
							</div>

							<div class="col-12">
								<div class="contact100-form-checkbox">
									<input class="input-checkbox100" id="requirements_true" type="checkbox" name="requirements_true" <?= $quote['requirements_true'] === 'on' ? 'checked' : '' ?> required>
									<label class="label-checkbox100 text-black" for="requirements_true">
										I Agree*
									</label>
								</div>
								<p>This insurance contract is compatible with my insurance requirements/needs and the data provided in order to conclude this contract is true to the best of my knowledge.</p>
							</div>

							<div class="col-12">
								<div class="contact100-form-checkbox">
									<input class="input-checkbox100" id="marketing" type="checkbox" name="marketing" <?= $quote['marketing'] === 'on' ? 'checked' : '' ?>>
									<label class="label-checkbox100 text-black" for="marketing">
										I Agree
									</label>
								</div>
								<p>I hereby give my consent to the website administrator, INS Global (NIP: 847-145-53-36), to process my personal data for marketing purposes, including the sending of insurance offers by e-mail. At the same time, I acknowledge that I may revoke my consent at any time by sending a revocation to the e-mail address contact@europe-insurance.eu</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 text-center mt-5">
					<div class="submit-field">
						<input type="submit" class="btn job_detail_btn" name="submit" value="Go to Payment" />
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
<!-- End information -->