<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Covered countries
				</h1>
				<p class="text-white text-normol">Fast Insurance is valid throughout the territory of the <br> Schengen Area Member States, European Union, United Kingdom and other countries.</p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start how we assist you -->
<section class="feature-cat-area section-full pb-0" id="category">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-8 text-center">
				<div>
					<span class="badge badge-primary px-3 py-2">Europe</span>
					<span class="badge badge-primary px-3 py-2">Schengen Area</span>
					<span class="badge badge-primary px-3 py-2">European Union</span>
					<span class="badge badge-primary px-3 py-2">United Kingdom</span>
				</div>
				<div class="title mt-4 pb-4">
					<h3 class="mb-10">All European countries - just one insurance certificate</h3>
					<p>Travel around 51 countries in Europe or stay at one. Medical coverage anywhere in Europe under a single insurance policy.</p>
				</div>
				<img src="<?= base_url(); ?>assets/img/territory-coverage-map.svg" alt="" class="img-fluid mb-5">

				<div class="row align-items-center pt-5">
					<div class="col-md-6 mb-md-3 mb-lg-4">
						<div class="single-fcat px-2">
							<img src="<?= base_url(''); ?>assets/img/o1.png" alt="" class="single-fcat-img pr-2">
							<h4 class="mb-0 mt-2">For those coming to Europe</h4>
							<p class="m-0">You are covered in all 51 countries of Europe in the list below.</p>
						</div>
					</div>
					<div class="col-md-6 mb-md-3 mb-lg-4">
						<div class="single-fcat px-2">
							<img src="<?= base_url(''); ?>assets/img/o1.png" alt="" class="single-fcat-img pr-2">
							<h4 class="mb-0 mt-2">For those living in Europe</h4>
							<p class="m-0">If you are a permanent resident of any European country, you are covered in all European countries EXCEPT your permanent residence country.</p>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>
<!-- End how we assist you -->

<!-- Start how we assist you -->
<section class="feature-cat-area section-full" id="category">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content col-lg-10">
				<div class="title text-center">
					<h3 class="mb-2">Travel medical insurance in all European countries</h3>
					<p class="text-md">including Schengen Area, European Union, United Kingdom and others.</p>
				</div>
			</div>

			<div class="col-md-8 mt-4">
				<div class="row">
					<?php foreach ($countries as $index => $country) : ?>
						<div class="col-sm-6 col-md-4 mb-3 text-md">
							<?= $index + 1; ?>. <?= $country['name']; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>


	</div>
</section>
<!-- End how we assist you -->