<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends Main_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->rbac->check_emp_authentiction();	// checking user login session (rbac is a library function)

		$this->load->model('employers/package_model', 'package_model');

		$this->load->model('employers/account_model', 'account_model');

		$this->load->model('employers/job_model', 'job_model');
		$this->load->model('employers/profile_model', 'profile_model');
	}

	//-------------------------------------------------------------------------------
	public function dashboard()
	{
		$emp_id = $this->session->userdata('employer_id');
		$data['emp_info'] = $this->profile_model->get_employer_by_id($emp_id);

		$data['total_job_credits'] = 0;
		$data['total_job_posted'] = 0;
		$data['featured_jobs'] = 0;
		$data['closed_jobs'] = 0;
		$data['code'] = $data['emp_info']['code'];

		$data['total_job_credits'] = $this->job_model->count_jobs_credits(emp_id());

		$data['total_job_posted'] = $this->job_model->count_posted_jobs(emp_id());

		$data['featured_jobs'] = $this->job_model->count_featured_jobs(emp_id());

		$data['closed_jobs'] = $this->job_model->count_closed_jobs(emp_id());


		$data['emp_sidebar'] = 'employers/emp_sidebar'; // load sidebar for employer

		$data['title'] = trans('label_dashboard');

		$data['layout'] = 'employers/account/dashboard';

		$this->load->view('layout', $data);
	}



	//-------------------------------------------------------------------------------

	public function change_password()

	{

		if ($this->input->post('submit')) {

			$emp_id = $this->session->userdata('employer_id');

			$this->form_validation->set_rules('old_password', 'old password', 'trim|required|min_length[3]');

			$this->form_validation->set_rules('new_password', 'new password', 'trim|required|min_length[3]');

			$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|min_length[3]|matches[new_password]');



			if ($this->form_validation->run() == FALSE) {

				$data = array(

					'errors' => validation_errors()

				);

				$this->session->set_flashdata('error_update_password', $data['errors']);

				redirect(base_url('employers/account/change_password'), 'refresh');
			} else {

				$data = array(

					'id' => $emp_id,

					'old_password' => $this->input->post('old_password'),

					'password' => password_hash($this->input->post('new_password'), PASSWORD_BCRYPT),

				);



				$result = $this->account_model->update_password($data, $emp_id);



				if ($result) {

					$this->session->set_flashdata('update_password_success', trans('password_updated_success'));



					redirect(base_url('employers/account/change_password'));
				} else {

					$this->session->set_flashdata('update_password_failed', trans('old_pass_incorrect'));

					redirect(base_url('employers/account/change_password'));
				}
			}
		} else {

			$data['emp_sidebar'] = 'employers/emp_sidebar'; // load sidebar for user

			$data['layout'] = 'employers/account/change_password_page';

			$this->load->view('layout', $data);
		}
	}


	//-----------------------------------------------------------------
	// All payments
	public function payments()
	{

		$data['payments'] = $this->account_model->get_emp_payments();

		$data['emp_sidebar'] = 'employers/emp_sidebar'; // load sidebar for employer

		$data['title'] = trans('payments');

		$data['layout'] = 'employers/account/payment_page';

		$this->load->view('layout', $data);
	}
}// endClass
