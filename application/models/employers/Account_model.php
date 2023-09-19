<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model{

	//----------------------------------------------------------------------
	// Total Job Posted
	public function total_posted_job()
	{
		$this->db->where('employer_id', $this->session->userdata('employer_id'));
		return $this->db->count_all_results('xx_job_post');
	}

	//----------------------------------------
	//get emp payments
	public function get_emp_payments(){

		$this->db->select('
 
			xx_payments.txn_id,
			xx_payments.payment_amount,
			xx_payments.currency,
			xx_payments.payment_status,
			xx_payments.payment_date,
			');

		$this->db->from('xx_payments');

		$this->db->where('employer_id', emp_id()); 

		$this->db->order_by("xx_payments.payment_date", "DESC");

		$query = $this->db->get();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
			return $module;
		}
		else
			return false;

	}


	//-------------------------------------------------------
	// Update New password
	public function update_password($data,$user_id)
	{
		$query = $this->db->get_where('xx_employers' , array('id' => $user_id));
		$result = $query->row_array();

		 $validPassword = password_verify($data['old_password'], $result['password']);

		if ($validPassword) {
			$this->db->where('id',$user_id);
			$this->db->update('xx_employers',array('password' => $data['password']));
			return true;
		}else{
			return false;
		}
		
	}

}

?>