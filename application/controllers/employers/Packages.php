<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Packages extends Main_Controller
{
	public function __construct()
	{

		parent::__construct();

		// $this->rbac->check_emp_authentiction();

		$this->load->library('paypal_lib');

		$this->load->model('employers/package_model', 'package_model');

		$this->load->model('payment_model');
		$this->load->model('employers/job_model', 'job_model');
	}


	public function order_confirmation()
	{

		$this->rbac->check_emp_authentiction();

		$package_id = $this->input->post('package_id');

		if ($package_id == '') {
			redirect(base_url('employers'));
		}

		$data['package_detail'] = $this->package_model->get_package_by_id($package_id);

		$data['title'] = trans('order_confirmation');

		$data['layout'] = 'employers/packages/order_confirmation';

		$this->load->view('layout', $data);
	}

	//------------------------------------------------------------------------

	public function index()

	{

		$data['packages'] = $this->package_model->get_all_pakages();



		$data['title'] = 'Packages';

		$data['layout'] = 'employers/packages/packages_list';

		$this->load->view('layout', $data);
	}

	//------------------------------------------------------------------------
	public function buy()
	{
		$quote = $this->session->userdata('quote');
		$package_id = $this->input->post('package_id');

		$package_detail = $this->package_model->get_package_by_id($package_id);

		if ($package_detail['price'] == 0) {

			$payment_data = array(

				'payment_method' => 'free',

				'txn_id' => uniqid(),

				'employer_id' => emp_id(),

				'payment_amount' => $package_detail['price'],

				'payment_status' => 'complete',

				'purchased_plan' =>  $package_detail['id'],

				'payment_date' => date('Y-m-d h:m:s'),

			);

			$payment_id = $this->payment_model->insert_payment($payment_data);

			$buyer_data = array(

				'payment_id' => $payment_id,

				'employer_id' => emp_id(),

				'package_id' =>  $package_detail['id'],

				'no_of_posts' => $package_detail['no_of_posts'],

				'buy_date' => date('Y-m-d : h:m:s'),
			);

			if (emp_id()) {

				// add new package

				$this->payment_model->insert_buyer_package($buyer_data);
				$this->session->set_flashdata('success', 'Your Free Package has been activated successfully.');

				redirect(base_url('employers/dashboard'));
			}

			exit();
		}

		// Set variables for paypal form

		$returnURL = base_url() . 'paypal/success';

		$cancelURL = base_url() . 'paypal/cancel';

		$notifyURL = base_url() . 'paypal/ipn';

		// Add fields to paypal form

		$this->paypal_lib->add_field('return', $returnURL);

		$this->paypal_lib->add_field('cancel_return', $cancelURL);

		$this->paypal_lib->add_field('notify_url', $notifyURL);

		$this->paypal_lib->add_field('item_name', $package_detail['title']);

		$this->paypal_lib->add_field('item_number',  $package_detail['id']);

		$this->paypal_lib->add_field('amount',  $package_detail['price'] * $quote['days']);

		$this->paypal_lib->add_field('payer_id',  emp_id());

		$this->paypal_lib->add_field('rm',  2);

		$this->paypal_lib->add_field('handling',  0);;
		$this->paypal_lib->image(base_url($this->general_settings['logo']));
		// Render paypal form
		$this->paypal_lib->paypal_auto_form();
	}

	//-------------------------------------------------------------------------------
	public function bought()
	{
		$emp_id = emp_id();

		$data['package_detail'] = $this->package_model->get_employer_packages($emp_id);

		$data['emp_sidebar'] = 'employers/emp_sidebar'; // load sidebar for employer



		$data['title'] = trans('packages');

		$data['layout'] = 'employers/packages/employer_packages_bought';

		$this->load->view('layout', $data);
	}


	//--------------------------------------------------------------
	public function pay_with_stripe()
	{
		$item_number = $this->input->post('item_number');

		$package_detail = $this->package_model->get_package_by_id($item_number);

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
				//'source'  => 'tok_visa',
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

				'description' => $item_number,

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

				// Adding previous package post to new package

				$employer_bought_package = $this->package_model->get_employer_packages(emp_id());

				$no_of_posts_bought = 0;
				if (!empty($employer_bought_package) && $employer_bought_package[0]['is_active'] == 1) {

					$employer_bought_package = $this->package_model->get_employer_packages(emp_id());

					$current_package = $this->package_model->get_active_package();

					$no_of_posts_bought = $current_package['no_of_posts_bought'];
				}

				$buyer_data = array(

					'payment_id' => $payment_id,

					'employer_id' => $emp_id,

					'user_id' => $user_id,

					'package_id' =>  $item_number,

					'no_of_posts' => $package_detail['no_of_posts'] + $no_of_posts_bought,

					'buy_date' => $date,


				);

				if (emp_id()) {

					$this->payment_model->insert_buyer_package($buyer_data);

					if (($payment_id) && $status == 'succeeded') {

						$this->session->set_flashdata('success', 'Payment has been paid successfully.');
					} else if ($status == 'succeeded') {

						$this->session->set_flashdata('errors', 'Payment paid. Error while saving payment data at local database');
					}

					redirect(base_url('employers/dashboard'));
				}

				if (user_id()) {

					// sending invoice to user

					//$user_info = get_user_by_id(user_id());

					$this->payment_model->insert_buyer_package($buyer_data);

					redirect(base_url('user/dashboard'));
				}
			} else {

				$package_id = $this->input->post('item_number');

				$this->session->set_flashdata('errors', 'Invalid Token');

				redirect(base_url('employers', 'refresh'));
			}
		} else {

			echo 'invalid stripe token';
			exit;
		}
	}
}// endClass
