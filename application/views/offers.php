<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Choose The Best Pricing For You
				</h1>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<section class="quote-statistics bg-light">
	<div class="container text-center">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-bank fa-3x"></i>
				<h5 class="pt-3 pb-2">Age</h5>
				<h6><?= $quote['age_in_years'] ?></h6>
			</div>
			<div class="col-md-4">
				<i class="fa fa-briefcase fa-3x"></i>
				<h5 class="pt-3 pb-2">Student</h5>
				<h6 class="text-capitalize"><?= $quote['student'] ?></h6>
			</div>
			<div class="col-md-4">
				<i class="fa fa-file-word-o fa-3x"></i>
				<h5 class="pt-3 pb-2">Period of insurance</h5>
				<h6><?= $quote['days'] ?> days</h6>
			</div>
		</div>
	</div>
</section>

<!-- Package Cards -->
<?php
echo $package_cards;
?>
<!-- end Package Cards -->