<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Main_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->rbac->check_emp_authentiction();	// checking user login session
		$this->load->model('employers/company_model', 'company_model');
	}

	//--------------------------------------------------------------------------------------
	public function index()
	{
		$emp_id = $this->session->userdata('employer_id');
		$data['users'] = $this->company_model->get_users_by_id($emp_id);
		$data['emp_sidebar'] = 'employers/emp_sidebar'; // load sidebar for employer

		$data['title'] = trans('company');
		$data['meta_description'] = 'your meta description here';
		$data['keywords'] = 'meta tags here';

		$data['layout'] = 'employers/company/users';
		$this->load->view('layout', $data);
	}
}
