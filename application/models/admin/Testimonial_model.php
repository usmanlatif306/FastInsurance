<?php
class Testimonial_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_testimonials()
	{
		$this->db->order_by('id');
		$query = $this->db->get('xx_testimonials');
		return $result = $query->result_array();
	}

	//-----------------------------------------------------
	public function add_testimonial($data){
		$result = $this->db->insert('xx_testimonials', $data);
        return $this->db->insert_id();	
	}

	//-----------------------------------------------------
	public function get_testimonial_by_id($id){
		$query = $this->db->get_where('xx_testimonials', array('id' => $id));
		return $result = $query->row_array();
	}

	//-----------------------------------------------------
	public function edit_testimonial($data, $id){
		$this->db->where('id', $id);
		$this->db->update('xx_testimonials', $data);
		return true;
	}
}
?>