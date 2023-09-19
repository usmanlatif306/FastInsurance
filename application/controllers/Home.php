<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Main_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('pdf');
		$this->load->model('home_model');
		$this->load->model('employers/package_model', 'package_model');
		$this->load->model('policy_model');
		$this->load->model('payment_model');
	}

	//-----------------------------------------------------------------------------
	// Index funciton will call bydefault
	public function index()
	{
		// $data['policy'] = $this->policy_model->get_policy_by_number('4540000001');
		// $data['policyholder'] = $this->policy_model->get_policyholder_by_policy($data['policy']['id']);
		// $data['insured'] = $this->policy_model->get_insured_by_policy($data['policy']['id']);
		// $data['payment'] = $this->payment_model->get_payment_by_id($data['policy']['payment_id']);
		// $data['plan'] = $this->policy_model->get_plan_by_id($data['payment']['purchased_plan']);
		// $data['policy']['currency'] = $data['payment']['currency'];
		// $data['policy']['amount'] = $data['payment']['payment_amount'];
		// $data['policy']['varian'] = $data['plan']['title'];
		// $data['policy']['logo'] = imageToBase64(base_url($this->general_settings['logo']));
		// $data['policy']['signature'] = imageToBase64(base_url() . "assets/img/signature.png");
		// $qr = base_url() . "?policy_number=" . $data['policy']['number'] . "&dob=" . $data['policy']['dob'];
		// $data['policy']['filename'] =  $data['policy']['number'] . "png";
		// $data['policy']['qr'] = generate_qr_code($qr, $data['policy']['filename'], 3);

		// var_dump());
		// die;
		// $html = $this->load->view('pdf/privacy', $data, true);
		// $name = 'mypdf-' . rand(100, 999);
		// $this->pdf->createPDF($html, $name);
		// $data['layout'] = 'pdf/privacy';
		// $this->load->view('layout', $data);

		$data['countries'] = $this->common_model->get_countries_list();

		$data['testimonials'] = $this->home_model->get_testimonials();

		$data['companies'] =  [];
		$data['packages'] = $this->package_model->get_all_pakages();


		$seo = page_seo('homepage');
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];

		$data['quote'] = $this->session->userdata('quote');
		if (!$data['quote']) {
			$data['quote'] = [
				'country' => '',
				'start_date' => '',
				'end_date' => '',
				'dob' => '',
				'student' => '',
			];
		}

		// $this->mailer->policy_success_email('usmanlatif603@gmail.com', 'Policy Success', $data['policy']['number']);
		$data['layout'] = 'home';
		$this->load->view('layout', $data);
	}


	//-----------------------------------------------------------------------------
	// Offers Page
	public function get_quote()
	{
		if ($this->input->post('quote')) {
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$dob = $this->input->post('dob');

			$duration = date_formater($start_date, $end_date);
			$age_in_years = age_calculator('now', $dob);
			$days = days_calculator($start_date, $end_date);

			$details = [
				'country' => $this->input->post('country'),
				'start_date' => $start_date,
				'end_date' => $end_date,
				'duration' => $duration,
				'days' => $days,
				'dob' => $dob,
				'age_in_years' => $age_in_years,
				'student' => $this->input->post('student') === 'on' ? 'yes' : 'no',
			];

			$this->session->set_userdata('quote', $details);

			redirect(base_url('/offers'));
		}
		redirect(base_url('/'), 'refresh');
	}

	//-----------------------------------------------------------------------------
	// Offers Page
	public function offers()
	{
		$data['quote'] = $this->session->userdata('quote');
		if ($data['quote']) {
			$data['title'] = 'Choose a varient';
			$data['packages'] = $this->package_model->get_all_pakages();
			$data['meta_description'] = 'your meta description here';
			$data['keywords'] = 'meta tags here';
			$data['dont_display_banner'] = true;
			$data["package_cards"] = $this->load->view('employers/packages/insurance_list', $data, TRUE);

			$data['layout'] = 'offers';
			$this->load->view('layout', $data);
		} else {
			redirect(base_url('/'));
		}
	}

	//-----------------------------------------------------------------------------
	// Select Package
	public function select_package()
	{
		if ($this->input->post('submit')) {
			$quote = $this->session->userdata('quote');
			$quote['package_id'] = $this->input->post('package_id');

			$this->session->set_userdata('quote', $quote);
			redirect(base_url('/details'));
		} else {
			redirect(base_url('/'), 'refresh');
		}
	}

	//-----------------------------------------------------------------------------
	// Offers Page
	public function details()
	{
		$data['quote'] = $this->session->userdata('quote');
		if ($data['quote']) {
			$data['title'] = 'Enter your personal data';
			$data['meta_description'] = 'your meta description here';
			$data['keywords'] = 'meta tags here';
			$data['countries'] = $this->common_model->get_countries_list();
			// var_dump(old('firstname'));
			// die;
			$extraInfo = [
				'firstname' => old('firstname') ? old('firstname') : (isset($data['quote']['firstname']) ? $data['quote']['firstname'] : ''),
				'lastname' => old('lastname') ? old('lastname') : (isset($data['quote']['lastname']) ? $data['quote']['lastname'] : ""),
				'nationality' => old('nationality') ? old('nationality') : (isset($data['quote']['nationality']) ? $data['quote']['nationality'] : ''),
				'passport' => old('passport') ? old('passport') : (isset($data['quote']['passport']) ? $data['quote']['passport'] : ''),
				'type' => old('type') ? old('type') : (isset($data['quote']['type']) ? $data['quote']['type'] : ''),
				'company_name' => old('company_name') ? old('company_name') : (isset($data['quote']['company_name']) ? $data['quote']['company_name'] : ''),
				'identification_number' => old('identification_number') ? old('identification_number') : (isset($data['quote']['identification_number']) ? $data['quote']['identification_number'] : ''),
				'policyholder_firstname' => old('policyholder_firstname') ? old('policyholder_firstname') : (isset($data['quote']['policyholder_firstname']) ? $data['quote']['policyholder_firstname'] : ''),
				'policyholder_lastname' => old('policyholder_lastname') ? old('policyholder_lastname') : (isset($data['quote']['policyholder_lastname']) ? $data['quote']['policyholder_lastname'] : ''),
				'policyholder_dob' => old('policyholder_dob') ? old('policyholder_dob') : (isset($data['quote']['policyholder_dob']) ? $data['quote']['policyholder_dob'] : ''),
				'policyholder_address' => old('policyholder_address') ? old('policyholder_address') : (isset($data['quote']['policyholder_address']) ? $data['quote']['policyholder_address'] : ''),
				'policyholder_postal_code' => old('policyholder_postal_code') ? old('policyholder_postal_code') : (isset($data['quote']['policyholder_postal_code']) ? $data['quote']['policyholder_postal_code'] : ''),
				'policyholder_city' => old('policyholder_city') ? old('policyholder_city') : (isset($data['quote']['policyholder_city']) ? $data['quote']['policyholder_city'] : ''),
				'policyholder_state' => old('policyholder_state') ? old('policyholder_state') : (isset($data['quote']['policyholder_state']) ? $data['quote']['policyholder_state'] : ''),
				'policyholder_nationality' => old('policyholder_nationality') ? old('policyholder_nationality') : (isset($data['quote']['policyholder_nationality']) ? $data['quote']['policyholder_nationality'] : ''),
				'policyholder_email' => old('policyholder_email') ? old('policyholder_email') : (isset($data['quote']['policyholder_email']) ? $data['quote']['policyholder_email'] : ''),
				'policyholder_repeat_email' => old('policyholder_repeat_email') ? old('policyholder_repeat_email') : (isset($data['quote']['policyholder_email']) ? $data['quote']['policyholder_email'] : ''),
				'terms_condition' => old('terms_condition') ? old('terms_condition') : (isset($data['quote']['terms_condition']) ? $data['quote']['terms_condition'] : ''),
				'requirements_true' => old('requirements_true') ? old('requirements_true') : (isset($data['quote']['requirements_true']) ? $data['quote']['requirements_true'] : ''),
				'marketing' => old('marketing') ? old('marketing') : (isset($data['quote']['marketing']) ? $data['quote']['marketing'] : ''),
			];
			$data['quote'] = array_merge($data['quote'], $extraInfo);

			$data['layout'] = 'details';
			$this->load->view('layout', $data);
		} else {
			redirect(base_url('/'));
		}
	}

	//-----------------------------------------------------------------------------
	// Save Details
	public function save_details()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('lastname', 'lastname', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('nationality', 'nationality', 'trim|required');
			$this->form_validation->set_rules('passport', 'passport', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('type', 'type', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('company_name', 'company_name', 'trim|min_length[3]');
			$this->form_validation->set_rules('identification_number', 'identification_number', 'trim|min_length[3]');
			$this->form_validation->set_rules('policyholder_firstname', 'policyholder_firstname', 'trim|min_length[3]');
			$this->form_validation->set_rules('policyholder_lastname', 'policyholder_lastname', 'trim|min_length[3]');
			$this->form_validation->set_rules('policyholder_dob', 'policyholder_dob', 'trim|min_length[3]');
			$this->form_validation->set_rules('policyholder_address', 'policyholder_address', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('policyholder_postal_code', 'policyholder_postal_code', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('policyholder_city', 'policyholder_city', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('policyholder_state', 'policyholder_state', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('policyholder_nationality', 'policyholder_nationality', 'trim|required');
			$this->form_validation->set_rules('policyholder_email', 'policyholder_email', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('policyholder_repeat_email', 'policyholder_repeat_email', 'trim|required|min_length[3]|matches[policyholder_email]');
			$this->form_validation->set_rules('terms_condition', 'terms_condition', 'required');
			$this->form_validation->set_rules('requirements_true', 'requirements_true', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors(),
				);
				$this->session->set_flashdata('form_data', $this->input->post());
				$this->session->set_flashdata('validation_errors', $data['errors']);
				redirect(base_url('details'));
			} else {
				// $firstname = $this->input->post('firstname');
				// $lastname = $this->input->post('lastname');
				// $nationality = $this->input->post('nationality');
				// $passport = $this->input->post('passport');
				// $type = $this->input->post('type');
				// $company_name = $this->input->post('company_name');
				// $identification_number = $this->input->post('identification_number');
				// $policyholder_firstname = $this->input->post('policyholder_firstname');
				// $policyholder_lastname = $this->input->post('policyholder_lastname');
				// $policyholder_dob = $this->input->post('policyholder_dob');
				// $policyholder_address = $this->input->post('policyholder_address');
				// $policyholder_postal_code = $this->input->post('policyholder_postal_code');
				// $policyholder_city = $this->input->post('policyholder_city');
				// $policyholder_state = $this->input->post('policyholder_state');
				// $policyholder_nationality = $this->input->post('policyholder_nationality');
				// $policyholder_email = $this->input->post('policyholder_email');
				// $policyholder_repeat_email = $this->input->post('policyholder_repeat_email');
				// $terms_condition = $this->input->post('terms_condition');
				// $requirements_true = $this->input->post('requirements_true');
				// $marketing = $this->input->post('marketing');

				// var_dump($firstname, $lastname, $nationality, $passport, $type, $company_name, $identification_number, $policyholder_firstname, $policyholder_lastname, $policyholder_dob, $policyholder_address, $policyholder_postal_code, $policyholder_city, $policyholder_state, $policyholder_nationality, $policyholder_email, $policyholder_repeat_email, $terms_condition, $requirements_true, $marketing);
				// die;

				$quote = $this->session->userdata('quote');
				$quote['firstname'] = $this->input->post('firstname');
				$quote['lastname'] = $this->input->post('lastname');
				$quote['nationality'] = $this->input->post('nationality');
				$quote['passport'] = $this->input->post('passport');
				$quote['type'] = $this->input->post('type');
				$quote['company_name'] = $this->input->post('company_name');
				$quote['identification_number'] = $this->input->post('identification_number');
				$quote['policyholder_firstname'] = $this->input->post('policyholder_firstname');
				$quote['policyholder_lastname'] = $this->input->post('policyholder_lastname');
				$quote['policyholder_dob'] = $this->input->post('policyholder_dob');
				$quote['policyholder_address'] = $this->input->post('policyholder_address');
				$quote['policyholder_postal_code'] = $this->input->post('policyholder_postal_code');
				$quote['policyholder_city'] = $this->input->post('policyholder_city');
				$quote['policyholder_state'] = $this->input->post('policyholder_state');
				$quote['policyholder_nationality'] = $this->input->post('policyholder_nationality');
				$quote['policyholder_email'] = $this->input->post('policyholder_email');
				$quote['terms_condition'] = $this->input->post('terms_condition');
				$quote['requirements_true'] = $this->input->post('requirements_true');
				$quote['marketing'] = $this->input->post('marketing');

				$this->session->set_userdata('quote', $quote);

				redirect(base_url('/payment'));
			}
		} else {
			redirect(base_url('/'), 'refresh');
		}
	}

	public function payment()
	{
		$data['quote'] = $this->session->userdata('quote');

		if ($data['quote']) {
			// $this->rbac->check_emp_authentiction();

			$package_id = $data['quote']['package_id'];

			if ($package_id == '') {
				redirect(base_url('/'));
			}

			$data['package_detail'] = $this->package_model->get_package_by_id($package_id);
			$data['nationality'] = $this->common_model->get_countries_list($data['quote']['nationality'])['name'];
			$data['policyholder_nationality'] = $this->common_model->get_countries_list($data['quote']['policyholder_nationality'])['name'];

			// var_dump($data['nationality']);
			// die;

			$data['title'] = trans('order_confirmation');

			$data['layout'] = 'payment';

			$this->load->view('layout', $data);
		} else {
			redirect(base_url('/'));
		}
	}

	//-----------------------------------------------------------------------------
	// Quote Insurance
	public function quote_insurance()
	{
		$data['countries'] = $this->common_model->get_countries_list();
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];

		$data['dont_display_banner'] = true;
		$data['quote'] = $this->session->userdata('quote');
		if (!$data['quote']) {
			$data['quote'] = [
				'country' => '',
				'start_date' => '',
				'end_date' => '',
				'dob' => '',
				'student' => '',
			];
		}
		$data['layout'] = 'quote_insurance';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// About Insurance
	public function about_insurance()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['layout'] = 'about_insurance';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// About Insurer
	public function about_insurer()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['layout'] = 'about_insurer';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// Who Needs
	public function who_needs()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['layout'] = 'who_needs';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// countries
	public function countries()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['countries'] = $this->common_model->get_countries_list();
		$data['layout'] = 'countries';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// Coverage
	public function coverage()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['layout'] = 'coverage';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// Pricing
	public function pricing()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;
		$data['packages'] = $this->package_model->get_all_pakages();

		$data['layout'] = 'pricing';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// Travel Insurance Online
	public function travel_online()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];
		$data['dont_display_banner'] = true;

		$data['layout'] = 'travel_online';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// About Us Page
	public function about_us()
	{
		$seo = page_seo($this->uri->segment('1'));
		$data['title'] = $seo['title'];
		$data['meta_description'] = $seo['meta_description'];
		$data['keywords'] = $seo['keywords'];

		$data['layout'] = 'about_us';
		$this->load->view('layout', $data);
	}

	//-----------------------------------------------------------------------------
	// Dynamic page builder 
	public function any($slug)
	{
		$slug = $this->security->xss_clean($slug);
		//index page
		if (empty($slug)) {
			redirect(base_url());
		}

		$data['page'] = $this->home_model->get_page($slug);

		//if not exists
		if (empty($data['page'])) {
			redirect(base_url());
		} else {
			$data['title'] = $data['page']['title'];
			$data['meta_description'] = $data['page']['description'];
			$data['keywords'] = $data['page']['keywords'];

			$data['layout'] = 'page';
			$this->load->view('layout', $data);
		}
	}

	//-----------------------------------------------------------------------------
	// Contact Us Functionality
	public function contact()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Full Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('subject', 'last name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('message', 'message', 'trim|required|min_length[3]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('error_send', $data['errors']);

				redirect(base_url('contact'), 'refresh');
			} else {
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message'),
					'created_date' => date('Y-m-d : h:m:s'),
					'updated_date' => date('Y-m-d : h:m:s')
				);

				$data = $this->security->xss_clean($data); // XSS Clean Data

				$result = $this->home_model->contact($data);

				if ($result) {
					// email code
					$this->load->helper('email_helper');

					$to = $this->general_settings['admin_email'];
					$subject = 'Contact Us | ' . $this->general_settings['application_name'];
					$message =  '<p>Username: ' . $data['username'] . '</p> 
					<p>Email: ' . $data['email'] . '</p>
					<p>Message: ' . $data['message'] . '</p>';

					sendEmail($to, $subject, $message, $file = '', $cc = '');

					$this->session->set_flashdata('success', '<p class="alert alert-success"><strong>Success! </strong>your message has been sent successfully!</p>');
					redirect(base_url('contact'), 'refresh');
				} else {
					redirect(base_url('contact'), 'refresh');
				}
			}
		} else {
			$seo = page_seo($this->uri->segment('1'));
			$data['title'] = $seo['title'];
			$data['meta_description'] = $seo['meta_description'];
			$data['keywords'] = $seo['keywords'];

			$data['layout'] = 'contact_us';
			$this->load->view('layout', $data);
		}
	}
	public function site_lang($site_lang)
	{
		echo $site_lang;
		echo '<br>';
		echo 'you will be redirected to :' . $_SERVER['HTTP_REFERER'];
		$language_data = array(
			'site_lang' => $site_lang
		);

		$this->session->set_userdata($language_data);
		if ($this->session->userdata('site_lang')) {
			echo 'user session language is = ' . $this->session->userdata('site_lang');
		}
		redirect($_SERVER['HTTP_REFERER']);

		exit;
	}

	// --------------------------------------------------------------------------
	// Add Subscriber 
	public function add_subscriber()
	{

		if ($this->input->post()) {
			$this->form_validation->set_rules('subscriber_email', 'Subscriber Email', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('error_subscriber', validation_errors());
			} else {
				$data = array(
					'email' => $this->input->post('subscriber_email'),
					'created_at' => date('Y-m-d h:i:s')
				);

				$this->home_model->add_subscriber($data);

				$this->session->set_flashdata('success_subscriber', trans('success_subscriber_msg'));
			}

			if ($this->agent->is_referral())
				redirect($this->agent->referrer() . '#subscribe-area');
			else
				redirect(base_url() . '#subscribe-area');
		}
	}
}// endClass
