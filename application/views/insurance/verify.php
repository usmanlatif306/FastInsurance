<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center h-100">
			<div class="banner-content col-lg-12 h-100">
				<h1 class="text-white">Fast Insurance policy</h1>
				<p class="text-white">Verify your Fast Insurance policy status submitting the policy number and the date of birth of the insured person.</p>
				<?php $attributes = array('id' => 'search_job', 'method' => 'post');
				echo form_open('policy/verify', $attributes); ?>
				<div class="row justify-content-center form-wrap no-gutters">
					<div class="col-md-5 form-cols">
						<div class="form-group text-left">
							<label class="text-white">Policy Number</label>
							<input class="form-control" type="text" name="policy_number" placeholder="Policy Number" value="<?= old('policy_number') ?>" required>
						</div>
					</div>
					<div class="col-md-5 form-cols">
						<div class="form-group px-md-3 text-left">
							<label class="text-white">Insured's date of birth</label>
							<input class="form-control" type="date" name="dob" value="<?= old('dob') ?>" required>
						</div>
					</div>
					<div class="col-md-2 form-cols" style="margin-top: 6px;">
						<input type="submit" name="submit" class="btn btn-info h-initial py-2 mt-4" value="Check Validity">
					</div>

					<!-- showing result -->
					<div class="col-md-12 form-cols">
						<?php if ($this->session->flashdata('policy_success')) {
							echo '<div class="alert alert-success text-left">' . $this->session->flashdata('policy_success') . '</div>';
						} ?>
						<?php if ($this->session->flashdata('policy_error')) {
							echo '<div class="alert alert-danger text-left">' . $this->session->flashdata('policy_error') . '</div>';
						} ?>
					</div>
				</div>
				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->
