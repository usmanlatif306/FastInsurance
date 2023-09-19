<?php defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('seo_model');
	}

	public function index()
	{
		$data['pages'] = $this->seo_model->get_all_pages();

		$data['title'] = 'SEO Setting';
		$data['view'] = 'admin/seo/index';
		$this->load->view('admin/layout', $data);
	}

	public function edit_seo($slug)
	{
		$data['page'] = $this->seo_model->get_page_by_id($slug);
		$data['slug'] = $slug;

		$data['title'] = 'SEO Setting';
		$data['view'] = 'admin/seo/edit';
		$this->load->view('admin/layout', $data);
	}

	public function update_seo($slug)
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('meta_description', 'meta_description', 'trim|required');
			$this->form_validation->set_rules('keywords', 'keywords', 'trim|required');
		}

		if ($this->form_validation->run() == FALSE) {
			$data['page'] = $this->seo_model->get_page_by_id($slug);
			$data['slug'] = $slug;
			$data['title'] = 'SEO Setting';
			$data['view'] = 'admin/seo/edit';
			$this->load->view('admin/layout', $data);
		} else {
			$result = $this->seo_model->update_page($slug, [
				'title' => $this->input->post('title'),
				'meta_description' => $this->input->post('meta_description'),
				'keywords' => $this->input->post('keywords'),
			]);

			if ($result) {
				$this->session->set_flashdata('msg', 'Page seo has been updated successfully!');
				redirect(base_url('admin/settings/seo'));
			}
		}
	}
}
