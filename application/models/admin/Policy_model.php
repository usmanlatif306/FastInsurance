<?php defined('BASEPATH') or exit('No direct script access allowed');

class Policy_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	function GetAll()
	{
		$wh = array();

		if ($this->session->userdata('job_search_industry') != '')
			$wh[] = " xx_job_post.industry = '" . $this->session->userdata('job_search_industry') . "'";
		if ($this->session->userdata('job_search_category') != '')
			$wh[] = " xx_job_post.category = '" . $this->session->userdata('job_search_category') . "'";
		if ($this->session->userdata('job_search_location') != '')
			$wh[] = " xx_job_post.country = '" . $this->session->userdata('job_search_location') . "'";

		if ($this->session->userdata('job_search_from') != '')
			$wh[] = " xx_job_post.created_date >= '" . date('Y-m-d', strtotime($this->session->userdata('job_search_from'))) . "'";
		if ($this->session->userdata('job_search_to') != '')
			$wh[] = " xx_job_post.created_date <= '" . date('Y-m-d', strtotime($this->session->userdata('job_search_to'))) . "'";

		$SQL = 'SELECT policies.* FROM policies';

		$GROUP_BY = ' GROUP BY policies.id ';

		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE, $GROUP_BY);
		} else {
			return $this->datatable->LoadJson($SQL, '', $GROUP_BY);
		}
	}
}
