<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />

	<style>
		.invoice-box {
			max-width: 100%;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 14px;
			line-height: 20px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
			font-size: 10px !important;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.invoice-box.rtl table {
			text-align: right;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<!-- style="margin-top: 100px;" -->
		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td class="title">
								<img src="<?= $policy['logo']; ?>" style="width: 100%; max-width: 300px" />
							</td>

							<td>
								<span style="color: #072F70; font-size: 25px; font-weight: 700;"> Travel medical insurance </span>
								<span style="color: #072F70; font-size: 25px; font-weight: 700; padding-top:10px; display:block;"> EUROPE
									INSURANCE</span>
								<span style="color: gray; font-size: 14px;">Agreed electronically</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td style="color: #072F70; font-size: 20px; font-weight: 700;">
								Policy Number: <?= $policy['number']; ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="heading">
				<td>Insurer</td>
				<td></td>
			</tr>

			<tr class="details">
				<td style="font-size: small;" colspan="2">
					Inter Partner Assistance S.A. a company seated in Brussels and operating
					in Poland through Inter Partner Assistance S.A. Branch in Poland, seated in Warsaw, ul. Gieldowa
					1, 01-211 Warszawa, entered into the Register of Entrepreneurs kept by the District Court for the
					Capital City of Warsaw, 12th Commercial Department of the National Court
					Register, under number KRS 0000320749, holding NIP number (tax identification number) 108-00-06-955
				</td>
			</tr>

			<tr class="heading" colspan="4">
				<td>Policyholder</td>
				<td></td>
			</tr>

			<tr class="details" style="align-items: center;">
				<td>Name and surname: <?= $policyholder['first_name']; ?> <?= $policyholder['last_name']; ?> <br>
					Street and number of house: <?= $policyholder['address']; ?> <br>
					Postcode: <?= $policyholder['postcode']; ?> <br>
					Municipality: <?= $policyholder['city']; ?> <br>
					Country, State: <?= $policyholder['country']; ?></td>
				<td class="details" style="text-align: left;"> Date of birth: <?= date('d F Y', strtotime($policyholder['dob'])); ?> <br>
					Email address: <?= $policyholder['email']; ?></td>
				<td>
				</td>
			</tr>

			<tr class="heading">
				<td> Insured</td>
				<td></td>
			</tr>

			<tr class="details" style="align-items: center;">
				<td>Name and surname: <?= $insured['first_name']; ?> <?= $insured['last_name']; ?> <br>
					Date of birth: <?= date('d F Y', strtotime($insured['dob'])); ?> <br>
					Passport number: <?= $insured['passport']; ?></td>
				<td class="details" style="text-align: left;"> Country of residence: <?= $insured['country']; ?> <br>
					Student: <?= $insured['student'] === 'yes' ? 'Yes' : 'No'; ?> </td>
			</tr>

			<tr class="heading">
				<td>Insurance</td>
				<td></td>
			</tr>

			<tr class="details" style="align-items: center;">
				<td colspan="2">Territorial validity: <br>
					SCHENGEN AREA and EUROPEAN UNION and Albania, Andorra, Belarus, Bosnia and Herzegovina, Moldova,
					Monaco, Montenegro, North Macedonia, San Marino,
					Serbia, Ukraine, Vatican City, United Kingdom of Great Britain and Northern Ireland
				</td>
			</tr>
			<tr class="details" style="align-items: center;">
				<td>Medical insurance upper limit: 60 000 EUR <br>
					Civil liability insurance:☒ No <br>
					Baggage insurance:☒ No <br>
					Insurance covers tourist, work and study stays.
				</td>
				<td class="details" style="text-align: left;">
					Variant of insurance: <?= $policy['varian']; ?> <br>
					Beginning of insurance: <?= date('d F Y', strtotime($policy['start'])); ?> <br>
					End of insurance: <?= date('d F Y', strtotime($policy['end'])); ?><br>
					Duration: <?= $policy['days']; ?> days
				</td>
				<td> </td>
			</tr>


			<tr class="heading">
				<td>Insurance premium</td>
				<td></td>
			</tr>

			<tr class="details" style="align-items: center;">
				<td>Total insurance premium: <?= $policy['currency']; ?><?= $policy['amount']; ?> <br>
					Actual validity of the insurance can be verified at https://europe-insurance.eu/verify</td>
				<td class="details" style="text-align: left; text-transform: capitalize;"> Status: <?= $policy['payment']; ?> <br>
				</td>
			</tr>

			<tr class="heading">
				<td>Statement</td>
				<td></td>
			</tr>

			<tr class="details" style="text-align: justify;">
				<td colspan="2">
					<p> The insurance contract confirmed by this insurance policy was concluded on the basis of the
						General Terms and Conditions of travel medical insurance “Europe Insurance”
						approved on 05.05.2022 by the General Manager of Inter Partner Assistance SA Branch in
						Poland with No. 27/2022. The General Conditions was served to Policyholder. The
						General Conditions are an integral part of the insurance contract. All disputes resulting
						from or related to this insurance contract shall be settled by a competent court of
						general jurisdiction, or by a court relevant for the place of residence or the business seat
						of the Policyholder, the Insured or the Entitled under the insurance contract; and
						in case of claims pursued by a heir of the Insured or a heir of the Entitled under the
						insurance contract, by a court relevant for the place of residence of the heir of the
						Insured or the heir of the Entitled under the insurance contract. </p>
					<p>The Policyholder confirms that:</p>

					<ul>
						<li>
							The data contained in this policy is true and comply with my best knowledge.
						</li>
						<li>Before concluding the insurance contract I received the General Terms and Conditions of
							Insurance and undertakes to familiarize all insured persons with their
							content.</li>
						<li>Before the conclusion of the insurance contract, I received information resulting from
							the Regulation of the European Parliament and Council 2016/679 of 27 April
							2016 on the protection of individuals with regard to the processing of personal data and
							on the free movement of such data and repealing Directive 95/46/EC (general
							regulation on data protection) (Journal of Laws of the EU, No. L. of 2016 No. 119, page
							1) and undertakes to familiarize all insured persons with their content.</li>
						<li>
							This insurance contract is compatible with my insurance needs and requirements.
						</li>
						<li>I agree to the Insurer's processing of data regarding health condition, addictions,
							medical history, provided in the application and any other letters related to the
							conclusion and implementation of the insurance contract requested</li>
						<li>
							The insurer informed me that in the event of a claim for the provision of medical services under the insurance contract, the Insurer may request the delivery of
							medical documentation, further consent and submission of statements necessary to determine the Insurer's liability and scope of benefits. In particular, the Insurer
							may request further consents for:
							<ul>
								<li>submission of the statement referred to in art. 38 of the Act of 11 September 2015 on insurance and reinsurance activities (regarding obtaining information and
									documentation from doctors and medical facilities),</li>
								<li>obtaining information from the National Health Fund,</li>
								<li>obtaining information from other insurers.</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>

			<tr class="heading">
				<td>The insurance policy is concluded</td>
				<td></td>
			</tr>

			<tr class="details" style="align-items: center;">
				<td>Date: <?= date('d F Y', strtotime($policy['created_at'])); ?></td>
				<td class="details" style="text-align: left;"> Hour: <?= date('h:i A', strtotime($policy['created_at'])); ?><br>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
				</td>
			</tr>
			<tr class="heading">
				<td> Signature of the insurer’s representative</td>
				<td></td>
			</tr>

			<tr class="details" style="margin-left: 50px;">
				<td>
					<p>Jan Čupa <br>
						General Director </p>
					<img src="<?= $policy['signature']; ?>" alt="" width="150px"> <br>
					Inter Partner Assistance S.A. Branch Office in Poland
				</td>
				<td>
					<img src="<?= imageToBase64($policy['filename']); ?>" alt="">
				</td>
			</tr>
			<tr class="details" style="margin-left: 50px;">
				<td colspan="2">
					<p style="text-align: center; font-size: 10px;">The brand AXA Assistance is property of AXA Assistance Group, which is represented in Poland by: Inter Partner Assistance S.A. - a company seated in Warsaw, ul. Gieldowa 1, 01-211 Warszawa, entered into in the Register of
						Entrepreneurs kept by the District Court for the Capital City of Warsaw, 12th Commercial Department of the National Court Register, under number KRS 0000060063, holding NIP number (tax identification number) 525-15-73-813, whose
						share capital amounts to PLN 2,000,000 (paid up in full). </p>
					<h3 style="text-align: center;">24h Emergency Contact Centre</h3>
					<h3 style="text-align: center;"> +48 22 529 85 18 </h3>
				</td>
			</tr>

			<!-- <table>
				<tr class="heading">
					<td>Statement</td>
					<td></td>
				</tr>

				<tr class="details" style="text-align: justify;">
					<td colspan="2">
						<p> The insurance contract confirmed by this insurance policy was concluded on the basis of the
							General Terms and Conditions of travel medical insurance “Europe Insurance”
							approved on 05.05.2022 by the General Manager of Inter Partner Assistance SA Branch in
							Poland with No. 27/2022. The General Conditions was served to Policyholder. The
							General Conditions are an integral part of the insurance contract. All disputes resulting
							from or related to this insurance contract shall be settled by a competent court of
							general jurisdiction, or by a court relevant for the place of residence or the business seat
							of the Policyholder, the Insured or the Entitled under the insurance contract; and
							in case of claims pursued by a heir of the Insured or a heir of the Entitled under the
							insurance contract, by a court relevant for the place of residence of the heir of the
							Insured or the heir of the Entitled under the insurance contract. </p>
						<p>The Policyholder confirms that:</p>

						<ul>
							<li>
								The data contained in this policy is true and comply with my best knowledge.
							</li>
							<li>Before concluding the insurance contract I received the General Terms and Conditions of
								Insurance and undertakes to familiarize all insured persons with their
								content.</li>
							<li>Before the conclusion of the insurance contract, I received information resulting from
								the Regulation of the European Parliament and Council 2016/679 of 27 April
								2016 on the protection of individuals with regard to the processing of personal data and
								on the free movement of such data and repealing Directive 95/46/EC (general
								regulation on data protection) (Journal of Laws of the EU, No. L. of 2016 No. 119, page
								1) and undertakes to familiarize all insured persons with their content.</li>
							<li>
								This insurance contract is compatible with my insurance needs and requirements.
							</li>
							<li>I agree to the Insurer's processing of data regarding health condition, addictions,
								medical history, provided in the application and any other letters related to the
								conclusion and implementation of the insurance contract requested</li>
							<li>
								The insurer informed me that in the event of a claim for the provision of medical services under the insurance contract, the Insurer may request the delivery of
								medical documentation, further consent and submission of statements necessary to determine the Insurer's liability and scope of benefits. In particular, the Insurer
								may request further consents for:
								<ul>
									<li>submission of the statement referred to in art. 38 of the Act of 11 September 2015 on insurance and reinsurance activities (regarding obtaining information and
										documentation from doctors and medical facilities),</li>
									<li>obtaining information from the National Health Fund,</li>
									<li>obtaining information from other insurers.</li>
								</ul>
							</li>
						</ul>
					</td>
				</tr>
			</table> -->

			<!-- <table>
				<tr class="heading">
					<td> The insurance policy is concluded</td>
					<td></td>
				</tr>

				<tr class="details" style="align-items: center;">
					<td>Date: <?= date('d F Y', strtotime($policy['created_at'])); ?></td>
					<td class="details" style="text-align: left;"> Hour: <?= date('h:i A', strtotime($policy['created_at'])); ?><br>
					</td>
					<td> </td>
				</tr>
			</table> -->

			<!-- <table>
				<tr class="heading">
					<td> Signature of the insurer’s representative</td>
					<td></td>
				</tr>

				<tr class="details" style="margin-left: 50px;">
					<td>
						<p>Jan Čupa <br>
							General Director </p>
						<img src="<?= base_url(); ?>assets/img/signature.png" alt="" width="200px"> <br>
						Inter Partner Assistance S.A. Branch Office in Poland
					</td>
					<td class="details" style="text-align: left;"> <br>
					</td>
					<td></td>
				</tr>
			</table> -->

			<!-- <p style="text-align: center; font-size: 12px;">The brand AXA Assistance is property of AXA Assistance Group, which is represented in Poland by: Inter Partner Assistance S.A. - a company seated in Warsaw, ul. Gieldowa 1, 01-211 Warszawa, entered into in the Register of
				Entrepreneurs kept by the District Court for the Capital City of Warsaw, 12th Commercial Department of the National Court Register, under number KRS 0000060063, holding NIP number (tax identification number) 525-15-73-813, whose
				share capital amounts to PLN 2,000,000 (paid up in full). </p>
			<h2 style="text-align: center;">24h Emergency Contact Centre</h2>
			<h2 style="text-align: center;"> +48 22 529 85 18 </h2> -->
		</table>
	</div>
</body>

</html>