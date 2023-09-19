<?php

if (!isset($dont_display_banner)) {

?>

	<!-- start banner Area -->

	<section class="banner-area relative" id="home">

		<div class="overlay overlay-bg"></div>

		<div class="container">

			<div class="row d-flex align-items-center justify-content-center">

				<div class="about-content col-lg-12">

					<h1 class="text-white">

						<?= trans('packages') ?>

					</h1>

					<p class="text-white link-nav"><a href="<?= base_url(); ?>"><?= trans('label_home') ?> </a> <span class="lnr lnr-arrow-right"></span> <a href=""> <?= trans('packages') ?></a></p>

				</div>

			</div>

		</div>

	</section>

	<!-- End banner Area -->

<?php

}

?>

<!-- Start price Area -->

<section class="price-area section-gap-insurance" id="pricing_plan">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-40 col-lg-8">
				<div class="title text-center">
					<!-- <h1 class="mb-10"><?= trans('choose_pricing_msg') ?></h1> -->
					<h5><?= trans('eco_friendly_msg') ?>.</h5>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="row">
					<?php foreach ($packages as $package) : ?>
						<div class="col-md-6">
							<div class="single-price no-padding d-flex flex-column h-100">
								<div class="price-top">
									<h4><?= $package['title']; ?></h4>
								</div>

								<p class="p-3"><?= $package['detail']; ?></p>

								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<span class="price total"><?= $this->general_settings['currency_sign']; ?></span>
										<h1 class="mb-0"><?= $quote['days'] * $package['price']; ?></h1>
									</div>
									<span class=""><?= $this->general_settings['currency_sign']; ?><?= $package['price']; ?> / day</span>
									<?php
									$free_pkg_exist = check_free_package(); // check if the free package is already activated or not
									echo form_open(base_url('home/select_package'), array('id' => 'form', 'method' => 'post'));
									?>
									<input type="hidden" name="package_id" value="<?= $package['id']; ?>">

									<?php
									if ($package['price'] == 0) :
										if ($free_pkg_exist == true) :
											echo '<a class="btn btn-outline-dark">No more available</a>';
										else :
									?>
											<input type="submit" class="btn btn-info header-btn" name="submit" value="<?= trans('buy_now') ?>">
										<?php
										endif;
									else : ?>
										<input type="submit" class="btn btn-info header-btn mt-2" name="submit" value="<?= trans('buy_now') ?>">
									<?php
									endif;
									echo form_close();
									?>

								</div>

							</div>

						</div>
					<?php endforeach; ?>
				</div>
			</div>


		</div>

	</div>

</section>

<!-- End price Area -->