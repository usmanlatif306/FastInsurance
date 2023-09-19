<?php defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

	// insert Payment
	public function insert_payment($data)
	{
		$this->db->insert('xx_payments', $data);
		$last_id = $this->db->insert_id();
		return  $last_id;
	}

	// insert buyer package details
	public function insert_buyer_package($data)
	{
		$this->db->insert('xx_packages_bought', $data);
		return true;
	}

	// Get Employers Transactions
	public function get_employer_transactions()
	{
		$query = $this->db->get_where('xx_payments', array('employer_id' => emp_id()));

		return $query->result_array();
	}

	// Get Employers Transactions
	public function get_agency_transactions()
	{
		$query = $this->db->get_where('xx_payments', array('agency_id' => agency_id()));

		return $query->result_array();
	}

	// Get Payment by id
	public function get_payment_by_id($id)
	{
		$query = $this->db->get_where('xx_payments', array('id' => $id));

		return $query->row_array();
	}
}
