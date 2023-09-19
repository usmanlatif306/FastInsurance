<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>

	<style>
		.invoice-box {
			max-width: 100%;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		/* .invoice-box table td {
			padding: 5px;
			vertical-align: top;
		} */

		p {
			font-size: 14px;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table class="top" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="2">
					<table>
						<tr>
							<td>
								<h4 style="margin-bottom: 0px;">Dear Sir or Madam</h1>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>
								<p>Thank you for purchasing <?= $title ?>, the coverage for all European countries on
									one insurance policy. We are very pleased that you decided on <?= $title ?> and
									will do our best to ensure your satisfaction.</p>
								<p>You will find all necessary documents attached to this message: </p>
								<p>
								<ul>
									<li>
										your insurance policy/certificate,
									</li>
									<li>
										general terms and conditions (GTC),
									</li>
									<li>
										product information document (IPID).
									</li>
								</ul>
								</p>
								<p>
									In the event of a sudden illness or accident, please contact the Medical Assistance
									Centre on <b>+48 22 529 85 18</b> to arrange a medical appointment, hospitalisation
									or to
									report a claim. The number is also printed on your insurance policy/certificate.
								</p>
								<p>You can also go to a medical facility, doctor's appointment or hospital on your own.
									Once you have paid for the costs related to the treatment of the illness or
									accident, you can apply for a reimbursement by reporting the loss through the
									website <a href="#"> Report a Claim</a>.</p>
								<p>In case you experience problems downloading your attachments, please follow this link
									to download your <?= $title ?> policy/certificate: <a href="#">My policy</a> . In
									order to protect
									your personal data, this link will only stay active for next 24 hours.</p>
								<p>Should you have any questions, please do not hesitate to contact us on email <a href="mailto:contact@europe-insurance.eu.">contact@europe-insurance.eu.</a>
								</p>
								<p>Yours faithfully, </p>

							</td>

						</tr>
						<tr>
							<td>
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								<h2><?= $title ?> Team</h2>
								<p><a href="#">europe-insurance.eu</a><br>
									<a href="#">contact@europe-insurance.eu</a>
								</p>
							</td>

						</tr>
						<tr>
							<td>
								<img src="<?= base_url(); ?>assets/img/logo.png" alt="">
								<p>Twarda 18 <br>
									00-105 Warsaw <br>
									Poland, Europe <br>
									<a href="#">europe-insurance.eu</a>
								</p>

							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>