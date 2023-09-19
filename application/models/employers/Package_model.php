<?php

class Package_Model extends CI_Model
{

	//---------------------------------------------------
	// Get All Packages
	public function get_all_pakages()
	{

		$this->db->where('package_for', 1); // '1' is for employer

		$this->db->where('is_active', 1);

		$this->db->order_by('sort_order', 'asc');

		$query = $this->db->get('xx_packages');

		return  $result = $query->result_array();
	}

	//---------------------------------------------------
	// Get Package by ID
	public function get_package_by_id($id)
	{
		$query = $this->db->get_where('xx_packages', array('id' => $id));
		return $result = $query->row_array();
	}

	//----------------------------------------------------------------------
	// Active Job package
	public function get_active_package()
	{
		$this->db->select('xx_packages_bought.*, 

			xx_packages.title,

			xx_packages.no_of_posts,

			xx_packages.price,

			xx_packages_bought.no_of_posts AS no_of_posts_bought,

			');

		$this->db->from('xx_packages_bought');

		$this->db->join('xx_packages', 'xx_packages.id = xx_packages_bought.package_id', 'left');

		$this->db->where('xx_packages_bought.employer_id', emp_id());

		$this->db->where('package_for', 1);

		$this->db->order_by("xx_packages_bought.buy_date", "DESC");

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) {

			$module = $query->row_array();
		}

		return $module;
	}

	//---------------------------------------------------
	// Employer Boutght Package
	public function get_employer_packages($emp_id)
	{
		$this->db->select('xx_packages_bought.*, 

			xx_packages.title,

			xx_packages.no_of_posts,

			xx_packages.detail,

			xx_packages.price,

			');

		$this->db->from('xx_packages_bought');

		$this->db->join('xx_packages', 'xx_packages.id = xx_packages_bought.package_id', 'left');

		$this->db->where('xx_packages_bought.employer_id', $emp_id);

		$this->db->where('package_for', 1);

		$this->db->order_by("xx_packages_bought.buy_date", "DESC");

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) {

			$module = $query->result_array();
		}

		return $module;
	}

	//------------------------------------------------	
	// Get Active Package
	public function get_active_package_id()
	{
		$query = $this->db->get_where('xx_packages_bought', array('employer_id' => emp_id(), 'is_active' => 1));

		return $result = $query->row_array()['id'];
	}

	//---------------------------------------------
	// Get Free Package
	public function get_free_package()
	{
		$query = $this->db->get_where('xx_packages', array('price' => '0'));

		return $result = $query->row_array();
	}
} //endClass
