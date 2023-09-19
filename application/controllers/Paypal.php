<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends Main_Controller
{

	function  __construct()
	{

		parent::__construct();

		$this->load->helper('email_helper');
		$this->load->library('paypal_lib');
		$this->load->library('pdf');
		$this->load->model('payment_model');
		$this->load->model('policy_model');
		$this->load->model('common_model');
		$this->load->model('employers/package_model', 'package_model');
	}

	//--------------------------------------------------------------------

	function success()
	{
		// https://insurance.dev.com/paypal/success?PayerID=V8HSKR6XHY3KJ
		// $ipn_check = $this->paypal_lib->validate_ipn($_GET['PayerID']);
		$quote = $this->session->userdata('quote');
		// isset($_GET['PayerID']) && 
		if ($quote) {
			if (emp_id())
				$emp_id = emp_id();
			else
				$emp_id = 0;
			if (user_id())
				$user_id = user_id();
			else
				$user_id = 0;
			$message = "<h1>Paypal variables</h1>";

			// $payment_data = array(
			// 	'payment_method' => 'paypal',
			// 	'txn_id' => $_POST['txn_id'],
			// 	'employer_id' => $emp_id,
			// 	'user_id' => $user_id,
			// 	'currency' => $_POST['mc_currency'],
			// 	'payment_amount' => $_POST['payment_gross'],
			// 	'payer_email' => $_POST['payer_email'],
			// 	'payment_status' => $_POST['payment_status'],
			// 	'purchased_plan' => $_POST['item_number'],
			// 	'payment_date' => $_POST["payment_date"],

			// );
			$package_detail = $this->package_model->get_package_by_id($quote['package_id']);
			$payment_data = array(
				'payment_method' => 'paypal',
				'txn_id' => $_GET['PayerID'] ? $_GET['PayerID'] : md5(rand(0, 100)),
				'employer_id' => $emp_id,
				'user_id' => $user_id,
				'currency' => $this->general_settings['currency'],
				'payment_amount' => $package_detail['price'] * $quote['days'],
				'payer_email' => '',
				'payment_status' => 'complete',
				'purchased_plan' => $quote['package_id'],
				'payment_date' => date('Y-m-d h:i:s'),
			);

			$payment_id = $this->payment_model->insert_payment($payment_data);

			$policy_data = array(
				'number' => policy_number(),
				'dob' => $quote['dob'],
				'start' => $quote['start_date'],
				'end' => $quote['end_date'],
				'duration' => $quote['duration'],
				'payment' => 'paid',
				'payment_id' => $payment_id,
				'status' => 'active',
				'created_at' => date('Y-m-d : h:m:s'),
				'updated_at' => date('Y-m-d : h:m:s')
			);

			$policy = $this->policy_model->save_policy($policy_data);

			$policyholder = array(
				'policy_id' => $policy,
				'first_name' => $quote['policyholder_firstname'],
				'last_name' => $quote['policyholder_lastname'],
				'email' => $quote['policyholder_email'],
				'dob' => $quote['policyholder_dob'],
				'address' => $quote['policyholder_address'],
				'postcode' => $quote['policyholder_postal_code'],
				'city' => $quote['policyholder_city'],
				'country' => $this->common_model->get_countries_list($quote['policyholder_nationality'])['name'],
				'company_name' => $quote['company_name'],
				'company_identity' => $quote['identification_number'],
				'created_at' => date('Y-m-d : h:m:s'),
				'updated_at' => date('Y-m-d : h:m:s')
			);

			$this->policy_model->save_policyholder($policyholder);

			$insured = array(
				'policy_id' => $policy,
				'first_name' => $quote['firstname'],
				'last_name' => $quote['lastname'],
				'dob' => $quote['dob'],
				'country' => $this->common_model->get_countries_list($quote['country'])['name'],
				'passport' => $quote['passport'],
				'student' => $quote['student'],
				'created_at' => date('Y-m-d : h:m:s'),
				'updated_at' => date('Y-m-d : h:m:s')
			);

			$this->policy_model->save_insured($insured);

			$data['policy'] = $policy_data;
			$data['policyholder']  = $policyholder;
			$data['insured']  = $insured;
			$data['payment']  = $payment_data;
			$data['plan'] = $this->policy_model->get_plan_by_id($data['payment']['purchased_plan']);
			$data['policy']['currency'] = $data['payment']['currency'];
			$data['policy']['amount'] = $data['payment']['payment_amount'];
			$data['policy']['varian'] = $data['plan']['title'];
			$data['policy']['logo'] = imageToBase64(base_url($this->general_settings['logo']));
			$data['policy']['signature'] = imageToBase64(base_url() . "assets/img/signature.png");
			$qr = base_url() . "verify/?policy_number=" . $data['policy']['number'] . "&dob=" . $data['policy']['dob'];
			$data['policy']['filename'] = "assets/qrcodes/" . $data['policy']['number'] . ".png";
			$data['policy']['qr'] = generate_qr_code($qr, $data['policy']['filename'], 3);
			$html = $this->load->view('pdf/privacy', $data, true);
			$this->pdf->createPDF($html, $data['policy']['number'], true);

			$this->mailer->policy_success_email($data['policyholder']['email'], 'Policy Success', $data['policy']['number']);

			$this->session->unset_userdata('quote');

			$this->session->set_flashdata('policy_success', 'Insurance created successfully. A confirmation email is send with all information regarding policy.');

			redirect(base_url('/'));
		} else {
			redirect(base_url('/payment'));
		}
	}


	//--------------------------------------------------------------------

	function cancel()
	{
		redirect(base_url('/payment'));
	}



	//--------------------------------------------------------------------
	function ipn()
	{
		/* CHECK THESE 4 THINGS BEFORE PROCESSING THE TRANSACTION, HANDLE THEM AS YOU WISH

		  1. Make sure that business email returned is your business email

		  2. Make sure that the transaction�s payment status is �completed�

		  3. Make sure there are no duplicate txn_id

		  4. Make sure the payment amount matches what you charge for items. (Defeat Price-Jacking) */

		// Paypal posts the transaction data
		$paypal_info = $this->input->post();

		if (!empty($paypal_info)) {
			// Validate and get the ipn response
			$ipn_check = $this->paypal_lib->validate_ipn($paypal_info);

			// Check whether the transaction is valid
			if ($ipn_check) {

				$to = 'codeglamourofficial@gmail.com';
				$subject = 'Paypal Notification | Jobpostingplatform';
				$message = print_r($_POST, true);

				$email = sendEmail($to, $subject, $message, $file = '', $cc = '');

				if ($email == true) {
					echo 'success';
				} else {
					echo $email;
				}
			}
		}
	}
}
