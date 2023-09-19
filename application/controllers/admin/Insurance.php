<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insurance extends Main_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('policy_model', 'policy_model');
		$this->load->model('payment_model');
	}

	//------------------------------------------------
	public function index()
	{
		$data['policies'] = $this->policy_model->Get_all_policies();
		// var_dump($data['policies']);
		// die;

		$data['title'] = 'Insurance List';
		$data['view']  = 'admin/insurance/index';
		$this->load->view('admin/layout', $data);
	}

	//------------------------------------------------
	public function datatable_json()
	{
		$records = $this->job_model->GetAll();
		$data = array();

		$i = 1;
		foreach ($records['data']  as $row) {
			$buttoncontroll = '<a class="btn btn-xs btn-success" href=' . base_url("admin/job/edit/" . $row['id']) . ' title="View" > 
				 <i class="fa fa-eye"></i></a>&nbsp;&nbsp;

				  <a class="edit btn btn-xs btn-primary" href=' . base_url("admin/job/edit/" . $row['id']) . ' title="Edit" > 
				 <i class="fa fa-edit"></i></a>&nbsp;&nbsp;

				 <a class="btn-delete btn btn-xs btn-danger" href=' . base_url("admin/job/del/" . $row['id']) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> 
				 <i class="fa fa-trash-o"></i></a>';

			$data[] = array(
				$i++,
				$row['title'],
				'<a class="edit btn btn-xs btn-info mb-3" href=' . base_url("admin/applicants/view/" . $row['id']) . ' title="Applicants" > 
				 Applied [ ' . $row['cand_applied'] . ' ]
				</a>
				<a class="edit btn btn-xs btn-info" href=' . base_url("admin/applicants/shortlisted/" . $row['id']) . ' title="Applicants" > 
				 Shortlisted [ ' . $row['total_shortlisted'] . ' ]
				</a>',
				get_industry_name($row['industry']),  //  helper function
				get_country_name($row['country']), // same as above
				date_time($row['created_date']),
				$row['is_status'],
				$buttoncontroll
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	//------------------------------------------------
	public function show($id)
	{
		$data['policy'] = $this->policy_model->get_policy_by_id($id);
		$data['policyholder'] = $this->policy_model->get_policyholder_by_policy($data['policy']['id']);
		$data['insured'] = $this->policy_model->get_insured_by_policy($data['policy']['id']);
		$data['payment'] = $this->payment_model->get_payment_by_id($data['policy']['payment_id']);
		$data['plan'] = $this->policy_model->get_plan_by_id($data['payment']['purchased_plan']);
		$data['policy']['currency'] = $data['payment']['currency'];
		$data['policy']['amount'] = $data['payment']['payment_amount'];
		$data['policy']['variat'] = $data['plan']['title'];

		// var_dump($data);
		// die;

		$data['title'] = 'Insurance Show';
		$data['view']  = 'admin/insurance/show';
		$this->load->view('admin/layout', $data);
	}
}
