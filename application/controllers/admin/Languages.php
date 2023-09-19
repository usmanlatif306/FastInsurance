<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/languages_model', 'languages_model');
	}

	public function index()
	{
		$data['all_languages'] = $this->languages_model->get_all_languages();
		$data['view'] = 'admin/language/language_list';
		$this->load->view('admin/layout', $data);
	}

	public function add()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('display_name', 'Display Name', 'trim|required');
			$this->form_validation->set_rules('directory_name', 'Directory Name', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/languages/language_add';
				$this->load->view('admin/layout', $data);
			}
			else{
				$data = array(
					'display_name' => $this->input->post('display_name'),
					'directory_name' => $this->input->post('directory_name'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->languages_model->add_language($data);
				if($result){
					$this->session->set_flashdata('msg', 'language has been Added Successfully!');
					redirect(base_url('admin/languages'));
				}
			}
		}
		else{
			$data['view'] = 'admin/language/language_add';
			$this->load->view('admin/layout', $data);
		}
	}

	public function edit($id=0)
	{
		if($this->input->post('submit')){
			$data = array(
				'display_name' => $this->input->post('display_name'),
				'directory_name' => $this->input->post('directory_name'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->languages_model->edit_language($data, $id);
			if($result){
				$this->session->set_flashdata('msg', 'language has been updated successfully!');
				redirect(base_url('admin/languages'));
			}
		}
		else{
			$data['language'] = $this->languages_model->get_language_by_id($id);
			$data['view'] = 'admin/language/language_edit';
			$this->load->view('admin/layout', $data);
		}
	}

	public function del($id)
	{
		$result = $this->languages_model->delete_language($id);
		if ($result) {
			$this->session->set_flashdata('msg', 'language has been Deleted Successfully!');
		} else {
			$this->session->set_flashdata('msg', 'Error while deleting language!');
		}
		redirect(base_url('admin/languages'));
	}

	public function set_default()
	{
		if($this->input->post('submit')){
			$id = $this->input->post('default_lang_id');
			$result = $this->languages_model->set_default_language($id);
			if($result){
				$this->session->set_flashdata('msg', 'Language has been set as default site language!');
				redirect(base_url('admin/languages'));
			} else {
				$this->session->set_flashdata('msg', 'Error while setting default language!');
				redirect(base_url('admin/languages'));
			}
		} else {
			$this->session->set_flashdata('msg', 'Invalid input to set default language!');
			redirect(base_url('admin/languages'));
		}
	}
}

?>