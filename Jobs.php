<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_logged_in() or redirect('login');
        $this->load->model('jobs_model', 'jobs');
    }
	
	public function index()
	{
		$data = [];

		$data['job_rec'] = $this->jobs->get_all();
		$data['msg'] = $this->session->flashdata('msg') ? : '';

		$this->load->view('main_header');
		$this->load->view('jobs', $data);
		$this->load->view('main_footer');
	}

	public function delete($id=0)
	{
		ctype_digit($id) or redirect('jobs');

		$this->db->where('id',$id);
		$this->db->delete('job');

		$this->session->set_flashdata('msg','Record deleted successfully!');

		redirect('jobs');
	}

	public function add()
	{
		$this->input->post() and $this->jobs->insert() and redirect('jobs');

		$data['jobs'] = $this->jobs;
		$data['errors'] = validation_errors();

		$this->load->view('main_header');
		$this->load->view('jobs_edit', $data);
		$this->load->view('main_footer');		
	}

	public function edit($id=0)
	{
		$this->input->post() and $this->jobs->update() and redirect('jobs');

		ctype_digit($id) or redirect('jobs');

		$get_one = $this->db->get_where('job', array('id'=>$id))->row();

		$get_one or redirect('jobs');

		$this->input->post() or $this->jobs->get_current();

		$data['jobs'] = $this->jobs;
		$data['errors'] = validation_errors();

		$this->load->view('main_header');
		$this->load->view('jobs_edit', $data);
		$this->load->view('main_footer');
	}
}
