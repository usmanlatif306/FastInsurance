  <!-- start banner Area -->
  <section class="banner-area relative" id="home">
  	<div class="overlay overlay-bg"></div>
  	<div class="container">
  		<div class="row fullscreen align-items-center banner-content h-100">
  			<div class="col-md-6 col-lg-7">
  				<?php if ($this->session->flashdata('policy_success')) {
						echo '<div class="alert alert-success">' . $this->session->flashdata('policy_success') . '</div>';
					} ?>
  				<h1 class="text-white">
  					<span>Fast Insurance</span><br> Travel medical insurance to Europe, for residency
  				</h1>
  			</div>
  			<div class="col-md-6 col-lg-5">
  				<?php $attributes = array('id' => 'search_job', 'method' => 'post');
					echo form_open('home/get_quote', $attributes); ?>
  				<div class="row form-wrap no-gutters text-left">
  					<div class="col-12 text-left mb-3">
  						<h3 class="text-info">Fast Insurance Quote</h3>
  					</div>
  					<div class="col-12 form-cols text-left mb-2">
  						<label for="" class="text-white">MAIN DESTINATION IN EUROPE</label>
  						<select name="country" class="form-control">
  							<option value=""><?= trans('select_long_country_stay') ?></option>
  							<?php foreach ($countries as $country) : ?>
  								<?php if ($quote['country'] == $country['id']) : ?>
  									<option value="<?= $country['id']; ?>" selected> <?= $country['name']; ?> </option>
  								<?php else : ?>
  									<option value="<?= $country['id']; ?>"> <?= $country['name']; ?> </option>
  							<?php endif;
								endforeach; ?>
  						</select>
  					</div>
  					<?php
						$today = date("Y-m-d");
						$tommorow =  date('Y-m-d', strtotime($today . " + 1 day"));
						$after_month =  date('Y-m-d', strtotime($today . " + 30 days"));

						?>
  					<div class="col-md-6 col-sm-12 pr-2">
  						<div class="form-group">
  							<label class="text-white">START DATE</label>
  							<input class="form-control" id="start_date" type="date" name="start_date" value="<?= $quote['start_date']  ?>" min="<?php echo $tommorow; ?>">
  						</div>
  					</div>

  					<div class="col-md-6 col-sm-12">
  						<div class="form-group">
  							<label class="text-white">END DATE</label>
  							<input class="form-control" id="end_date" type="date" name="end_date" value="<?= $quote['end_date']  ?>" min="<?php echo $after_month; ?>">
  						</div>
  					</div>
  					<div class="col-md-6 col-sm-12">
  						<div class="form-group">
  							<label class="text-white">DATE OF BIRTH</label>
  							<input class="form-control" type="date" name="dob" value="<?= $quote['dob']  ?>">
  						</div>
  					</div>
  					<div class="col-md-6 col-sm-12">
  						<div class="contact100-form-checkbox pl-2">
  							<input class="input-checkbox100" id="ckb1" type="checkbox" name="student" <?= $quote['student'] === 'yes' ? 'checked' : '' ?>>
  							<label class="label-checkbox100 text-white" for="ckb1">
  								Student
  							</label>
  						</div>
  					</div>
  					<div class="col-lg-12 form-cols">
  						<input type="submit" name="quote" class="btn btn-info" value="Get a Quote">
  					</div>
  				</div>
  				<?php echo form_close(); ?>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- End banner Area -->

  <!-- Start key benefits -->
  <section class="testimonial-area section-full pb-0">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-3 mb-3">
  				<h4>Fast Insurance</h4>
  				<p class="mb-3 text-black text-normol">high quality product</p>
  				<a class="nav-link custom-nav-link active" href="#keyBenefits" data-toggle="pill">1: Key benefits</a>
  				<a class="nav-link custom-nav-link" href="#coverageTerritory" data-toggle="pill">2: Coverage territory</a>
  				<a class="nav-link custom-nav-link" href="#insuranceCover" data-toggle="pill">3: Insurance cover</a>
  			</div>
  			<div class="col-md-9 mb-3">
  				<div class="row pill-content" id="keyBenefits">
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o1.png" alt="">
  								<p class="pb-1">Travel Medical Europe Insurance offers excellent value for your money. With a single insurance policy, you can explore European countries without worrying. It provides comprehensive medical and liability coverage at a reasonable price.</p>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o7.png" alt="">
  								<p>Travel Medical Europe Insurance offers the convenience of easy online purchases. You can securely pay with your debit/credit card and receive your insurance certificate instantly via email. It takes just 2 minutes, with no additional waiting.</p>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o3.png" alt="">
  								<p>Whether it's for a Schengen visa, residency, or any other visit or stay in Europe, our insurance meets all European regulatory requirements. Additionally, you can receive a 100% premium refund if your visa application is refused.</p>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o4.png" alt="">
  								<p>Our travel insurance for Europe offers numerous advantages, including no deductibles and no age limit. Cashless claims settlement and an international 24/7 Assistance Call Centre ensure a seamless experience. It's the perfect insurance choice for anyone traveling within or into Europe.</p>
  							</div>
  						</div>

  					</div>
  				</div>

  				<div class="row pill-content d-none" id="coverageTerritory">
  					<div class="col-md-6 mb-3">
  						<img src="<?= base_url(); ?>assets/img/territory-coverage-map.svg" alt="" class="img-fluid-home">
  					</div>
  					<div class="col-md-6 mb-3">
  						<div class="text-center mb-3">
  							<span class="badge badge-primary px-3 py-2 mb-2">Europe</span>
  							<span class="badge badge-primary px-3 py-2 mb-2">Schengen Area</span>
  							<span class="badge badge-primary px-3 py-2 mb-2">European Union</span>
  							<span class="badge badge-primary px-3 py-2 mb-2">United Kingdom</span>
  						</div>
  						<h3 class="mb-10">All European countries:</h3>
  						<p style="text-align: justify;">Our Fast Insurance provides coverage across the entire European continent, including all 51 European countries. With a single insurance certificate, you can travel seamlessly throughout the Schengen Area, European Union, United Kingdom, and other countries such as Albania, Andorra, Belarus, Bosnia and Herzegovina, Moldova, Monaco, Montenegro, Northern Macedonia, San Marino, Serbia, Ukraine, and Vatican City.</p>
  						<!-- <p class="pb-2">Schengen Area, European Union, United Kingdom and Albania, Andorra, Belarus, Bosnia and Herzegovina, Moldova, Monaco, Montenegro, Northern Macedonia, San Marino, Serbia, Ukraine, Vatican City.</p> -->
  						<a href="<?= base_url('countries'); ?>" class="text-normol">See Full List <i class="fa fa-angle-right align-middle ml-2"></i></a>
  					</div>
  				</div>

  				<div class="row pill-content d-none" id="insuranceCover">
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o1.png" alt="">
  								<p class="pb-1">Our insurance plan offers comprehensive coverage with no deductibles. You can enjoy up to 150,000 € medical coverage for various expenses, including urgent and emergency care, hospitalization, examinations, consultations, medical supplies, dental services, transportation, and repatriation to your home country.</p>
  								<a href="<?= base_url('coverage'); ?>" class="text-normol">Learn More <i class="fa fa-angle-right align-middle ml-2"></i></a>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o7.png" alt="">
  								<p class="pb-1">Our insurance provides civil liability coverage in your private life, offering protection up to 80,000 €. This coverage ensures that you are financially protected in the event that you cause physical injury, harm to someone's health, or damage to someone's property.</p>
  								<a href="<?= base_url('coverage'); ?>" class="text-normol">Learn More <i class="fa fa-angle-right align-middle ml-2"></i></a>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o3.png" alt="">
  								<p class="pb-1">Your baggage insurance is protection against lost, damaged, or stolen personal items during your trip. Protection for your electronic devices or sports equipment (e.g. skis).</p>
  								<a href="<?= base_url('coverage'); ?>" class="text-normol">Learn More <i class="fa fa-angle-right align-middle ml-2"></i></a>
  							</div>
  						</div>

  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="d-flex h-100">
  							<div class="single-fcat px-2 text-left">
  								<img src="<?= base_url(); ?>assets/img/o4.png" alt="">
  								<p class="pb-1">Our baggage insurance offers valuable protection against the loss, damage, or theft of your personal items while you're traveling. It covers various belongings, including electronic devices and sports equipment like skis, ensuring that you have peace of mind throughout your trip.</p>
  								<a href="<?= base_url('coverage'); ?>" class="text-normol">Learn More <i class="fa fa-angle-right align-middle ml-2"></i></a>
  							</div>
  						</div>

  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- End key benefits -->

  <!-- Start Pricing -->
  <section class="feature-cat-area section-full" id="category">
  	<div class="container">
  		<div class="row d-flex justify-content-center">
  			<div class="menu-content pb-60 col-lg-10">
  				<div class="title text-center">
  					<h1 class="mb-10">Pricing</h1>
  					<h5>2 variants tailored to your needs</h5>
  					<p>Our low premium and high sum insured plans include all benefits you need travel or stay in Europe. Money-back guarantee, cancel before your trip.</p>
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

  <!-- Start how we assist you -->
  <section class="feature-cat-area section-full" id="category">
  	<div class="container">
  		<!-- <div class="row d-flex justify-content-center">
  			<div class="menu-content pb-60 col-lg-10">
  				<div class="title text-center">
  					<h1 class="mb-10"><?= trans('feature_job_cats') ?></h1>
  					<p><?= trans('feature_cat_subtitle') ?></p>
  				</div>
  			</div>
  		</div> -->
  		<div class="row">
  			<div class="col-md-6 col-lg-7">
  				<div class="title">
  					<h3 class="mb-10">Few Reasons Why People Choosing Us</h3>
  					<p>At Fast Insurance, we recognize life's unpredictability, and that's why we provide fast and reliable insurance solutions to safeguard what matters most to you. Our team of experienced professionals is committed to offering you the best coverage options at competitive prices. We strive to simplify the insurance process, making it stress-free and allowing you to focus on what truly matters.</p>
  				</div>
  				<div class="row">
  					<div class="col-sm-6 mb-2">
  						<div class="single-fcat">
  							<a href="#">
  								<img src="<?= base_url(''); ?>assets/img/o1.png" alt="">
  								<p><?= trans('feature_hotel') ?></p>
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="single-fcat">
  							<a href="#">
  								<img src="<?= base_url(); ?>assets/img/o7.png" alt="">
  								<p><?= trans('feature_tourism') ?></p>
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="single-fcat">
  							<a href="#">
  								<img src="<?= base_url(); ?>assets/img/o3.png" alt="">
  								<p><?= trans('feature_tech') ?></p>
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6 mb-2">
  						<div class="single-fcat">
  							<a href="#">
  								<img src="<?= base_url(); ?>assets/img/o4.png" alt="">
  								<p><?= trans('feature_sales') ?></p>
  							</a>
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="col-md-6 col-lg-5">
  				<img src="<?= base_url(); ?>assets/images/choose.webp" alt="Why choose us" class="img-fluid choose-img">
  			</div>
  		</div>
  	</div>
  </section>
  <!-- End how we assist you -->


  <!-- Start join us -->
  <section class="callto-action-area section-half" id="join">
  	<div class="container">
  		<div class="row d-flex justify-content-center">
  			<div class="menu-content col-lg-9">
  				<div class="title text-center">
  					<h1 class="mb-10 text-white">Join Us Today Without Any Hesitation</h1>
  					<p class="text-white">If you have any questions or need further information, feel free to ask!</p>
  					<a class="primary-btn" href="<?= base_url('quote-insurance'); ?>">Get a Quote</a>
  					<a class="primary-btn" href="<?= base_url('contact'); ?>">Contact Us</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- End join us -->


  <!-- Start FAQ's -->
  <section class="testimonial-area section-full pb-0">
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

  <!-- Start testimonial Area -->
  <section class="testimonial-area section-full">
  	<div class="container">
  		<div class="row d-flex justify-content-center">
  			<div class="menu-content pb-60 col-lg-10">
  				<div class="title text-center">
  					<h1 class="mb-10">Testimonials</h1>
  					<p>Who Are In Extremely Love With Eco Friendly System</p>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-lg-12 shdw pt-4 pb-4">
  				<div id="testimonial-slider" class="owl-carousel">

  					<?php
						foreach ($testimonials as $row) :
							$photo = ($row['photo']) ? $row['photo'] : 'assets/img/user.png';
						?>
  						<div class="testimonial">
  							<div class="pic">
  								<img src="<?= base_url($photo) ?>" alt="">
  							</div>
  							<h3 class="testimonial-title">
  								<?= $row['testimonial_by'] ?><small> <?= $row['comp_and_desig'] ?></small>
  							</h3>
  							<p class="description">
  								<?= $row['testimonial'] ?>
  							</p>
  						</div>
  					<?php endforeach; ?>

  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- End testimonial Area -->


  <!-- Start Blog Area -->
  <!-- <section class="blog-area section-full">
  	<div class="container">
  		<div class="row d-flex justify-content-center">
  			<div class="menu-content pb-60 col-lg-10">
  				<div class="title text-center">
  					<h1 class="mb-10"><?= trans('blogs') ?></h1>
  					<p><?= trans('blogs_subtitle') ?>.</p>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<?php foreach ($posts as $post) : ?>
  				<div class="col-lg-4">
  					<div class="card">
  						<img class="card-img-top" src="<?= base_url($post['image_default']) ?>" alt="">
  						<div class="card-body">
  							<h5 class="card-title"><a href="<?= base_url() . 'blog/post/' . $post['slug'] ?>"><?= $post['title'] ?></a></h5>
  							<p class="card-text"><?= text_limit($post['content'], 150) ?></p>
  							<a href="<?= base_url() . 'blog/post/' . $post['slug'] ?>" class="btn btn-info"><?= trans('read_more') ?>..</a>
  						</div>
  					</div>
  				</div>
  			<?php endforeach; ?>
  		</div>
  	</div>
  </section> -->