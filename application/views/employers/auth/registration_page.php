<!-- registration-section-starts -->
<div class="container-login100">
	<div class="wrap-login100" style="width: 650px;">
		<div class="container">
			<span class="login100-form-title pb-5">
				<?= trans('signup') ?> <small>(<?= trans('employers') ?>)</small>
			</span>

			<div class="line-title-left"></div>
			<?php
			if ($this->session->flashdata('error')) {
				echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
			}
			?>

			<?php $attributes = array('id' => 'registeration_form', 'method' => 'post'); ?>
			<?php echo form_open('employers/auth/registration', $attributes); ?>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('first_name') ?> *</label>
						<input type="text" name="firstname" class="form-control" placeholder="<?= trans('enter_your_fname') ?>" value="<?php echo old('firstname'); ?>" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('last_name') ?> *</label>
						<input type="text" name="lastname" class="form-control" placeholder="<?= trans('enter_your_lname') ?>" value="<?php echo old('lastname'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label><?= trans('email') ?> *</label>
						<input type="email" name="email" class="form-control" placeholder="<?= trans('enter_your_email') ?>" value="<?php echo old('email'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('password') ?> *</label>
						<input type="password" name="password" class="form-control" placeholder="<?= trans('enter_your_password') ?>" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('') ?>Confirm Password *</label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="<?= trans('enter_password_again') ?>" />
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-12">
					<h5><?= trans('company_info') ?></h5>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label><?= trans('company_name') ?> *</label>
						<input type="text" name="company_name" class="form-control" placeholder="<?= trans('company_name') ?>" value="<?php echo old('company_name'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('category') ?> *</label>
						<select class="form-control" name="category" id="">
							<option value="">Select category</option>
							<?php foreach ($categories as $category) : ?>
								<option value="<?= $category['id'] ?>" <?php echo old('category') === $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('organization_type') ?></label>
						<select class="form-control" name="org_type" id="org_type">
							<option value="Private" <?php echo old('org_type') === 'Private' ? 'selected' : '' ?>><?= trans('private') ?></option>
							<option value="Public" <?php echo old('org_type') === 'Public' ? 'selected' : '' ?>><?= trans('public') ?></option>
							<option value="Government" <?php echo old('org_type') === 'Government' ? 'selected' : '' ?>><?= trans('government') ?></option>
							<option value="NGO" <?php echo old('org_type') === 'NGO' ? 'selected' : '' ?>><?= trans('ngo') ?></option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('country') ?> *</label>
						<select class="form-control country" name="country" required>
							<option><?= trans('select_country') ?></option>
							<?php foreach ($countries as $country) : ?>
								<option value="<?= $country['id'] ?>" <?php echo old('country') === $country['id'] ? 'selected' : '' ?>><?= $country['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label"><?= trans('state') ?> *</label>
						<select class="form-control state" name="state" required>
							<option><?= trans('select_state') ?></option>
						</select>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label"><?= trans('city') ?> *</label>
						<select class="form-control city" name="city" required>
							<option><?= trans('select_city') ?></option>
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('postal_code') ?> *</label>
						<input type="text" name="postcode" class="form-control" placeholder="" value="<?php echo old('postcode'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label><?= trans('address') ?> *</label>
						<input type="text" name="address" class="form-control" placeholder="" value="<?php echo old('address'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('phone_number') ?>.</label>
						<input type="text" name="phone_no" class="form-control" placeholder="" value="<?php echo old('phone_no'); ?>" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label><?= trans('website') ?></label>
						<input type="text" name="website" class="form-control" placeholder="" value="<?php echo old('website'); ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label><?= trans('company_description') ?></label>
						<textarea name="description" class="form-control" placeholder="" value="<?php echo old('description'); ?>"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<input type="checkbox" name="termsncondition" <?php echo old('termsncondition') === true ? 'checked' : '' ?>> <?= trans('agree_to_our') ?> <small> <?= trans('terms_and_cond') ?></small>
					</div>
					<?php if ($this->recaptcha_status) : ?>
						<div class="recaptcha-cnt">
							<?php generate_recaptcha(); ?>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<input type="submit" class="login100-form-btn btn-block" name="submit" value="Register">
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<div class="text-center w-full pt-4">
				<span class="txt1">
					<?= trans('already_have_account') ?>
				</span>
				<a class="txt1 bo1 hov1" href="<?= base_url(); ?>employers/auth/login">
					<?= trans('signin_now') ?>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- registration-section-Ends -->
