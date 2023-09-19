<?php defined('BASEPATH') or exit('No direct script access allowed');

class Policy_Model extends CI_Model
{
	//---------------------------------------------------
	// Count total policies
	public function count_all_policies()
	{
		return $this->db->count_all('policies');
	}

	//-----------------------------------------------------
	function Get_all_policies()
	{
		$this->db->from('policies');
		$query = $this->db->join('policyholders', 'policyholders.policy_id = policies.id', 'left')->get();
		return $query->result_array();
	}


	//---------------------------------------------------
	// Get last policy
	public function last_policy()
	{
		$this->db->from('policies');
		return  $this->db->order_by('id', "desc")
			->limit(1)
			->get()
			->row();
	}

	// Save Policy
	public function save_policy($data)
	{
		$this->db->insert('policies', $data);
		return $this->db->insert_id();
	}

	// Save Policyholder
	public function save_policyholder($data)
	{
		$this->db->insert('policyholders', $data);
		return $this->db->insert_id();
	}

	// Save Policy insured
	public function save_insured($data)
	{
		$this->db->insert('insureds', $data);
		return $this->db->insert_id();
	}

	// Search Policy
	public function search_policy($number, $dob)
	{
		$this->db->from('policies');
		return  $this->db->where('number', $number)->where('dob', $dob)->get()->row();
	}

	// Search Policy
	public function get_policy_by_id($id)
	{
		$query = $this->db->get_where('policies', array('id' => $id));
		return $query->row_array();
	}

	// Search Policy
	public function get_policy_by_number($number)
	{
		$query = $this->db->get_where('policies', array('number' => $number));
		return $query->row_array();
	}

	// Get policy holder by policy number
	public function get_policyholder_by_policy($policy_id)
	{
		$query = $this->db->get_where('policyholders', array('policy_id' => $policy_id));
		return $query->row_array();
	}

	// Get insured by policy number
	public function get_insured_by_policy($policy_id)
	{
		$query = $this->db->get_where('insureds', array('policy_id' => $policy_id));
		return $query->row_array();
	}

	// Get insured by policy number
	public function get_plan_by_id($id)
	{
		$query = $this->db->get_where('xx_packages', array('id' => $id));
		return $query->row_array();
	}
}
