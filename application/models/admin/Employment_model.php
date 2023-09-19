<?php
	class Employment_model extends CI_Model{

		public function add_employment($data){
			return $this->db->insert('xx_employment', $data);
		}

		public function get_all_employment(){
			$query = $this->db->get('xx_employment');
			return $result = $query->result_array();
		}

		public function edit_employment($data, $id){
			$this->db->where('id', $id);
			$this->db->update('xx_employment', $data);
			return true;

		}

		public function get_employment_by_id($id){
			$query = $this->db->get_where('xx_employment', array('id' => $id));
			return $result = $query->row_array();
		}

	}

?>	