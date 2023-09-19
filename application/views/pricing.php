<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Low Price
				</h1>
				<p class="text-white text-normol">Competitive premium for Europe Insurance. <br> Basic or Extended plan suitable for your needs at low price.</p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start Pricing -->
<section class="feature-cat-area section-full pb-0" id="category">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h2 class="mb-10">Pricing</h2>
					<h4>Insurance premium</h4>
					<p class="text-md">Fast Insurance premium varies based on your age and your 'student' status.<br> The insurance rate per day decreases when an insurance period is longer (e.g. annual policy).</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="row">
					<?php foreach ($packages as $package) : ?>
						<div class="col-md-6">
							<div class="card d-flex h-100">
								<div class="card-header text-center bg-gray">
									<h4><?= $package['title']; ?></h4>
									<h2><?= $this->general_settings['currency_sign']; ?><?= $package['price']; ?> <small>/ per day</small></h2>
									<small class="d-block">Add. student discount</small>
									<small>Add. lower rates for longer periods</small>
								</div>
								<div class="card-body">
									<?= $package['detail']; ?>
									<div class="text-center mt-5">
										<a href="<?= base_url('quote-insurance'); ?>" class="btn btn-info">Quote Now</a>
										<!-- <a href="#" class="btn btn-info">Learn More</a> -->
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End Pricing -->

<!-- Start FAQ's -->
<section class="testimonial-area section-full">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h2 class="mb-10">Frequently Asked Questions</h2>
				</div>
			</div>
		</div>
		<div class="accordion" id="faqSection">
			<div class="row">
				<div class="col-md-6 mb-2">
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="heading1" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
							<span class="text-md semibold text-black">What is Insurance?</span>
							<span class="text-black"><i id="collapse1_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#faqSection">
							<div class="card-body">
								Insurance is a way to manage your risk. When you buy insurance, you purchase protection against unexpected financial losses. The insurance company pays you or someone you choose if something bad happens to you. If you have no insurance and an accident happens, you may be responsible for all related costs.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="headingTwo" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
							<span class="text-md semibold text-black">Why Is Life Insurance Imported?</span>
							<span class="text-black"><i id="collapse3_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#faqSection">
							<div class="card-body">
								Protects your spouse and children from the potentially devastating financial losses that could result if something happened to you. It provides financial security, helps to pay off debts, helps to pay living expenses, and helps to pay any medical or final expenses.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="headingTwo" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
							<span class="text-md semibold text-black">What is The Basic Nature of Insurance?</span>
							<span class="text-black"><i id="collapse5_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#faqSection">
							<div class="card-body">
								The basic principle of insurance is that an entity will choose to spend small periodic amounts of money against a possibility of a huge unexpected loss. Basically, all the policyholder pool their risks together. Any loss that they suffer will be paid out of their premiums which they pay.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="headingTwo" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
							<span class="text-md semibold text-black">What are the limitations of insurance?</span>
							<span class="text-black"><i id="collapse7_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#faqSection">
							<div class="card-body">
								A limit is the highest amount your insurer will pay for a claim that your insurance policy covers. Think of it this way: It's like filling up a fishbowl. If you file a covered claim, your insurance policy will pay up to a certain amount. You're responsible for any expenses that exceed the limit.
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 mb-2">
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="heading2" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
							<span class="text-md semibold text-black">Why Do You Need Insurance?</span>
							<span class="text-black"><i id="collapse2_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#faqSection">
							<div class="card-body">
								Insurance is a financial safety net, helping you and your loved ones recover after something bad happens — such as a fire, theft, lawsuit or car accident. When you purchase insurance, you'll receive an insurance policy, which is a legal contract between you and your insurance provider.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="heading4" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
							<span class="text-md semibold text-black">What Is The Process of Insurance?</span>
							<span class="text-black"><i id="collapse4_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#faqSection">
							<div class="card-body">
								The insurance transaction involves the policyholder assuming a guaranteed, known, and relatively small loss in the form of a payment to the insurer (a premium) in exchange for the insurer's promise to compensate the insured in the event of a covered loss.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="heading6" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
							<span class="text-md semibold text-black">What is the pricing of insurance?</span>
							<span class="text-black"><i id="collapse6_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse6" class="collapse" aria-labelledby="heading4" data-parent="#faqSection">
							<div class="card-body">
								Rate making, or insurance pricing, is the rate of charges or premiums set by the insurance companies. The benefit of rate making is to ensure a fair and adequate premium for the clients, given the stiff competition in the insurance sector.
							</div>
						</div>
					</div>
					<div class="card rounded border mb-3">
						<div class="card-header cursor-pointer bg-light-blue center-between" id="heading8" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
							<span class="text-md semibold text-black">What is premium insurance?</span>
							<span class="text-black"><i id="collapse8_arrow" class="fa fa-arrow-right"></i></span>
						</div>
						<div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#faqSection">
							<div class="card-body">
								The amount you pay for your health insurance every month. In addition to your premium, you usually have to pay other costs for your health care, including a deductible, copayments, and coinsurance. If you have a Marketplace health plan, you may be able to lower your costs with a premium tax credit.
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- End FAQ's -->