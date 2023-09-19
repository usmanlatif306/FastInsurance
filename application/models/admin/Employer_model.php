<?php
class Employer_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	function get_all_employers()
	{
		$wh = array();


		if ($this->session->userdata('employer_search_from') != '')
			$wh[] = " `created_date` >= '" . date('Y-m-d', strtotime($this->session->userdata('employer_search_from'))) . "'";

		if ($this->session->userdata('employer_search_to') != '')
			$wh[] = " `created_date` <= '" . date('Y-m-d', strtotime($this->session->userdata('employer_search_to'))) . "'";

		$this->db->select('xx_employers.id, 
			xx_employers.firstname, 
			xx_employers.lastname,
			xx_employers.email,
			xx_companies.company_name, 
			xx_companies.phone_no, 
		');
		$this->db->join('xx_companies', 'xx_companies.employer_id = xx_employers.id', 'left');
		$this->db->get('xx_employers');

		$SQL = $this->db->last_query();

		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}

	//---------------------------------------------------
	// Get user detial by ID
	public function get_employer_by_id($id)
	{
		$query = $this->db->get_where('xx_employers', array('id' => $id));
		return $result = $query->row_array();
	}

	//----------------------------------------------------------------------
	// registration
	public function insert_employers($data)
	{
		$this->db->insert('xx_employers', $data);
		$last_id = $this->db->insert_id();
		return  $last_id;
	}

	//----------------------------------------------------------------------
	// Insert company
	public function insert_company($data)
	{
		$this->db->insert('xx_companies', $data);
		$last_id = $this->db->insert_id();
		return  $last_id;
	}

	//---------------------------------------------------
	// Edit user Record
	public function update_employer($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('xx_employers', $data);
		return true;
	}

	//----------------------------------------------------------------------
	// Get company by ID
	public function get_company_info_by_id($emp_id)
	{
		$query = $this->db->get_where('xx_companies', array('employer_id' => $emp_id));
		return $result = $query->row_array();
	}

	//----------------------------------------------------------------------
	// Update Company
	public function update_company_info($data, $comp_id, $emp_id)
	{
		$this->db->where('id', $comp_id);
		$this->db->where('employer_id', $emp_id);
		$this->db->update('xx_companies', $data);
		echo $this->db->last_query();
		return true;
	}

	//---------------------------------------------------
	// Get user detial by ID
	public function get_users_by_id($id)
	{
		$query = $this->db->select('xx_users.id, 
		xx_users.firstname, 
		xx_users.lastname,
		xx_users.email,
		xx_users.resume,
		xx_users.passport,
		xx_users.birth_certificate,
	')->get_where('xx_users', array('employer_id' => $id));
		return $result = $query->result();
	}
}
