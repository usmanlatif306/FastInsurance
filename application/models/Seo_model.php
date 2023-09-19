<?php defined('BASEPATH') or exit('No direct script access allowed');

class Seo_Model extends CI_Model
{
	//-------------------------------------------------------
	// Get all pages
	public function get_all_pages()
	{
		$query = $this->db->get('seo');
		return $query->result_array();
	}

	//---------------------------------------------------
	// Get page detial by ID
	public function get_page_by_id($slug)
	{
		$query = $this->db->get_where('seo', array('slug' => $slug));
		return $result = $query->row_array();
	}

	//---------------------------------------------------
	// Update Page
	public function update_page($slug, $data)
	{
		$this->db->where('slug', $slug);
		$this->db->update('seo', $data);
		return true;
	}
}// endClass
