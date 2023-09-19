<?php
class Category_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	public function get_all_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('xx_categories');
		return $result = $query->result_array();
	}
	//-----------------------------------------------------
	public function add_category($data){
		$result = $this->db->insert('xx_categories', $data);
        return $this->db->insert_id();	
	}
	//-----------------------------------------------------
	public function edit_category($data, $id){
		$this->db->where('id', $id);
		$this->db->update('xx_categories', $data);
		return true;

	}
	//-----------------------------------------------------
	public function get_category_by_id($id){
		$query = $this->db->get_where('xx_categories', array('id' => $id));
		return $result = $query->row_array();
	}
}
?>