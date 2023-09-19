<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Fast Insurance quote
				</h1>
				<p class="text-white text-normol">Get affordable travel medical insurance in a second.<br> Fast Insurance quote is few clicks away.</p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<section class="feature-cat-area section-full" id="category">
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-md-6 col-lg-5 bg-light-blue rounded shadow p-4">
				<?php $attributes = array('id' => 'search_job', 'method' => 'post');
				echo form_open('home/get_quote', $attributes); ?>
				<div class="row form-wrap no-gutters text-left">
					<div class="col-12 text-left mb-3">
						<h3 class="text-info">Fast Insurance Quote</h3>
					</div>
					<div class="col-12 form-cols text-left mb-2">
						<label for="" class="text-info">MAIN DESTINATION IN EUROPE</label>
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
							<label class="text-info">START DATE</label>
							<input class="form-control" id="start_date" type="date" name="start_date" value="<?= $quote['start_date']  ?>" min="<?php echo $tommorow; ?>">
						</div>
					</div>

					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="text-info">END DATE</label>
							<input class="form-control" id="end_date" type="date" name="end_date" value="<?= $quote['end_date']  ?>" min="<?php echo $after_month; ?>">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label class="text-info">DATE OF BIRTH</label>
							<input class="form-control" type="date" name="dob" value="<?= $quote['dob']  ?>">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="contact100-form-checkbox pl-2">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="student" <?= $quote['student'] === 'yes' ? 'checked' : '' ?>>
							<label class="label-checkbox100 text-info" for="ckb1">
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
			<div class="col-md-6 col-lg-7">
				<div class="menu-content pb-60 pl-5 col-lg-10">
					<div class="title">
						<h3 class="mb-2">Medical and travel insurance to Europe</h3>
						<p class="text-md">Get a high-quality, low-cost insurance quote in seconds. Covers up to €150,000 in medical expenses with no co-payments or deductibles. Includes 24-hour medical assistance and repatriation. Insure your baggage and liability at an affordable cost. Save money with wide-ranging, suitable insurance for all of Europe.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>