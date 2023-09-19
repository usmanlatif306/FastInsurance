<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Policy extends Main_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('policy_model');
		$this->load->model('common_model');
		$this->load->model('payment_model');
		// $this->load->model('employers/package_model', 'package_model');
	}

	// Index funciton will call bydefault
	public function index()
	{
		$data['quote'] = $this->session->userdata('quote');
		var_dump($data['quote']);
		die;
	}

	// Register policy
	public function register_policy()
	{
		// stripe payment
		$item_number = $this->input->post('item_number');

		//check whether stripe token is not empty
		if (!empty($this->input->post('stripeToken'))) {
			//get token, card and user info from the form

			$user_id = $this->session->userdata('user_id');
			$token  = $this->input->post('stripeToken');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$card_num = $this->input->post('card-number');
			$card_cvc = $this->input->post('card-cvc');
			$card_exp_month = $this->input->post('card-expiry-month');
			$card_exp_year = $this->input->post('card-expiry-year');

			//set api key
			$this->CI = &get_instance();
			$stripe_secret_key = $this->CI->general_settings['stripe_secret_key'];
			$stripe_publish_key = $this->CI->general_settings['stripe_publish_key'];
			$stripe = array(
				"secret_key"      => $stripe_secret_key,
				"publishable_key" => $stripe_publish_key
			);

			\Stripe\Stripe::setApiKey($stripe['secret_key']);

			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token,
			));

			//item information
			$item_price = $this->input->post('item_price');
			$currency = $this->CI->general_settings['currency'];

			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $item_price * 100,
				'currency' => $currency,
				'description' => 'Payment for insurance premium',
				'metadata' => array(
					'item_id' => $item_number
				)
			));

			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
				//order details
				$amount = $chargeJson['amount'] / 100;
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");

				// Save payment data into DB
				if (emp_id())
					$emp_id = emp_id();
				else
					$emp_id = 0;

				if (user_id())
					$user_id = user_id();
				else
					$user_id = 0;

				$payment_data = array(
					'payment_method' => 'stripe',
					'txn_id' => $balance_transaction,
					'employer_id' => $emp_id,
					'user_id' => $user_id,
					'currency' => strtoupper($currency),
					'payment_amount' => $amount,
					'payer_email' => $email,
					'payment_status' => $status,
					'purchased_plan' => $item_number,
					'payment_date' => $date,
				);

				$payment_id = $this->payment_model->insert_payment($payment_data);

				$quote = $this->session->userdata('quote');
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
				$data['policy']['days'] = $quote['days'];
				$data['policy']['logo'] = imageToBase64(base_url($this->general_settings['logo']));
				$data['policy']['signature'] = imageToBase64(base_url() . "assets/img/signature.png");
				$data['policy']['filename'] =  "assets/qrcodes/" . $data['policy']['number'] . ".png";
				$qr = base_url() . "verify/?policy_number=" . $data['policy']['number'] . "&dob=" . $data['policy']['dob'];
				$data['policy']['qr'] = generate_qr_code($qr, $data['policy']['filename'], 3);

				$html = $this->load->view('pdf/privacy', $data, true);
				$this->pdf->createPDF($html, $data['policy']['number'], true);

				$this->mailer->policy_success_email($data['policyholder']['email'], 'Policy Success', $data['policy']['number']);

				$this->session->unset_userdata('quote');

				$this->session->set_flashdata('policy_success', 'Insurance created successfully. A confirmation email is send with all information regarding policy.');

				redirect(base_url('/'));
			}
		}

		redirect(base_url('/details'));
	}

	// Index funciton will call bydefault
	public function verify()
	{
		$values_set = (!empty($this->input->get('policy_number')) && !empty($this->input->get('dob')));

		if ($this->input->post('submit') || $values_set) {
			$number = $this->input->post('policy_number') ? $this->input->post('policy_number') : $this->input->get('policy_number');
			$dob = $this->input->post('dob') ? $this->input->post('dob') : $this->input->get('dob');

			$policy = $this->policy_model->search_policy($number, $dob);
			if ($policy) {
				if ($policy->status === 'active') {
					$message = 'Insurance policy no. ' . $number . ' is PAID and VALID. The insurance is concluded for the period from ' . date('d F Y', strtotime($policy->start)) . ' to ' . date('d F Y', strtotime($policy->end)) . '.';

					$this->session->set_flashdata('policy_success', $message);
				} else {
					$message = 'Insurance policy no. ' . $number . ' is INVALID. The policy has been CANCELLED or EXPIRED.';
					$this->session->set_flashdata('policy_error', $message);
				}
			} else {
				$this->session->set_flashdata('policy_error', 'Insurance policy not found. Please contact us by email for verification.');
			}

			$this->session->set_flashdata('form_data', $this->input->post() ? $this->input->post() : $this->input->get());
		}

		$data['title'] = 'Check Europe Insurance. Instant online verification for embassies';
		$data['meta_description'] = 'your meta description here';
		$data['keywords'] = 'meta tags here';

		$data['layout'] = 'insurance/verify';
		$this->load->view('layout', $data);
	}
}
