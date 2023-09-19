<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					<?= trans('order_confirmation') ?>
				</h1>
				<p class="text-white link-nav"><a href="<?= base_url('/details'); ?>"><?= trans('back') ?> </a> <span class="lnr lnr-arrow-right"></span> <a href=""><?= trans('order_confirmation') ?> </a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->
<section class="section-gap">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">
				<h3>Your Order Summary</h3>
				<hr />
			</div>

			<div class="col-lg-6">

				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<h4>Insurance</h4>
							<p class=" mt-1 mb-0 pb-0">Period of insurance: <span class="text-black"><?= $quote['days'] ?> days</span></p>
							<p class="pl-2 mb-0">
								<span class="d-block text-black">
									<span class="badge badge-secondary py-1">From: </span>
									<?= $quote['start_date'] ?>
								</span>
								<span class="d-block text-black">
									<span class="badge badge-secondary py-1">to: </span>
									<?= $quote['end_date'] ?>
								</span>
							</p>
							<p class="mt-1 mb-0 pb-0">Variant: <span class="text-black"><?= $package_detail['title'] ?></span></p>
						</div>

						<div class="mb-3">
							<h4>Insured person</h4>
							<p class="mt-1 mb-0 pb-0">Name: <span class="text-black"><?= $quote['firstname'] ?> <?= $quote['lastname'] ?></span></p>
							<p class="mt-1 mb-0 pb-0">Date of birth: <span class="text-black"><?= $quote['dob'] ?></span></p>
							<p class="mt-1 mb-0 pb-0">Permanent residency: <span class="text-black"><?= $nationality ?></span></p>
							<p class="mt-1 mb-0 pb-0">Passport number: <span class="text-black"><?= $quote['passport'] ?></span></p>
						</div>

						<div class="mb-3">
							<h4>Policyholder</h4>
							<p class="mt-1 mb-0 pb-0">Name: <span class="text-black"><?= $quote['policyholder_firstname'] ?> <?= $quote['policyholder_lastname'] ?></span></p>
							<p class="mt-1 mb-0 pb-0">Email: <span class="text-black"><?= $quote['policyholder_email'] ?></span></p>
							<p class="mt-1 mb-0 pb-0">Address:</p>
							<div class="pl-3">
								<span class="d-block text-black"><?= $quote['policyholder_address'] ?></span>
								<span class="d-block text-black"><?= $quote['policyholder_city'] ?></span>
								<span class="d-block text-black"><?= $quote['policyholder_state'] ?></span>
								<span class="d-block text-black"><?= $quote['policyholder_postal_code'] ?></span>
								<span class="d-block text-black"><?= $policyholder_nationality ?></span>
							</div>
						</div>

						<p>
						<h4>Premium: &nbsp;<?= $this->general_settings['currency_sign']; ?> <?= $package_detail['price'] * $quote['days'] ?> (<?= $this->general_settings['currency_sign'] . $package_detail['price'] ?> /day)</h4>
						</p>

						<!-- <p>
							<?php if ($package_detail['price'] == 0) : ?>
								<?php echo form_open(base_url('employers/packages/buy'), 'class="my-form" '); ?>
								<input type="hidden" name="package_id" value="<?= $package_detail['id'] ?>">
								<input type="submit" name="submit" class="btn btn-primary rounded-pill" value="Pay Now">
								<?php echo form_close(); ?>
							<?php endif; ?>
						</p> -->

					</div>

				</div>

			</div>


			<?php if ($package_detail['price'] != 0) : ?>
				<div class="card col-lg-5">
					<div class="card-body">
						<!-- Credit card form tabs -->
						<ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
							<li class="nav-item">
								<a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
									<i class="fa fa-credit-card"></i>
									Credit Card
								</a>
							</li>

							<li class="nav-item">
								<a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
									<i class="fa fa-paypal"></i>
									Paypal
								</a>
							</li>

						</ul>
						<!-- End -->


						<!-- Credit card form content -->
						<div class="tab-content">
							<!-- credit card info-->
							<div id="nav-tab-card" class="tab-pane fade show active">
								<p class="payment-status" id="payment-errors">&nbsp;</p>
								<?php $attributes = array('id' => 'paymentFrm', 'method' => 'post', 'class' => 'form_horizontal'); ?>
								<?php echo form_open_multipart(base_url('policy/register_policy'), $attributes); ?>
								<div class="form-group">
									<label for="username">Full name (on the card)</label>
									<input type="text" name="name" id="name" placeholder="Jason Doe" required class="form-control">
								</div>
								<div class="form-group">
									<input type="hidden" name="item_number" class="form-control" value="<?= $package_detail['id'] ?>" required>
								</div>

								<div class="form-group">
									<input type="hidden" name="item_price" class="form-control" value="<?= $package_detail['price'] * $quote['days'] ?>" required />
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" placeholder="test@example.com" required class="form-control">
								</div>
								<div class="form-group">
									<label for="cardNumber">Card number</label>
									<div id="card-number" class="form-control"></div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<label><span class="hidden-xs">Expiration</span></label>
											<div id="card_expiry" class="form-control"></div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group mb-4">
											<label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
												<i class="fa fa-question-circle"></i>
											</label>
											<div id="card-cvc" class="form-control"></div>
										</div>
									</div>
								</div>
								<!-- Used to display Element errors. -->
								<div id="card-errors" class="text-danger"></div>
								<button type="submit" id="payBtn" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm </button>
								<?php echo form_close(); ?>
							</div>
							<!-- End -->

							<!-- Paypal info -->
							<div id="nav-tab-paypal" class="tab-pane fade">
								<?php echo form_open(base_url('employers/packages/buy'), 'class="my-form" '); ?>
								<input type="hidden" name="package_id" value="<?= $package_detail['id'] ?>">
								<p>Pay with your Paypal account.</p>
								<p>
									<input type="submit" name="submit" class="btn btn-primary rounded-pill" value="Pay with Paypal">
								</p>
								<p class="text-muted">System will take you to Paypal website for payment.
								</p>
								<?php echo form_close(); ?>
							</div>
							<!-- End -->
						</div>
						<!-- End -->
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php $this->load->view('js_stripe'); ?>