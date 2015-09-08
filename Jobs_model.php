<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {

    public $id;
    public $emp_id;
    public $company;
    public $job_title;
    public $job_description;
    public $location;
    public $skill;
    public $industry;
    public $interview_date;
    public $salary_from;
    public $salary_to;
    public $finders_fee_from;
    public $finders_fee_to;
    public $created_at;

    public function __construct()
    {
        $this->set_segment();
        $this->set_post();
    }

    public function set_post()
    {
        foreach($this->input->post() as $k => $v)
            $this->$k = $v;
    }

    function set_segment()
    {
        $id = $this->uri->segment(3,0);
        ctype_digit($id) and $this->id=$id;
    }

    function get_current()
    {
        $result = $this->db->get_where('job', array('id'=>$this->id))->row();
        foreach($result as $k => $v)
            $this->$k = $v;
    }

    function get_all()
    {
        return $this->db->from('job')->get()->result();
    }

    function insert()
    {
        $this->set_rules();

        if($this->form_validation->run() == false)
            return false;

        $insert = array(
                'emp_id' => $this->emp_id,
                'company' => $this->company,
                'job_title' => $this->job_title,
                'job_description' => $this->job_description,
                'location' => $this->location,
                'skill' => $this->skill,
                'industry' => $this->industry,
                'interview_date' => date('Y-m-d H:i:s', strtotime($this->interview_date)),
                'salary_from' => $this->salary_from,
                'salary_to' => $this->salary_to,
                'finders_fee_from' => $this->finders_fee_from,
                'finders_fee_to' => $this->finders_fee_to,
                'created_at' => date('Y-m-d H:i:s'),
            );

        $this->db->insert('job', $insert);

        $this->session->set_flashdata('msg','Record added successfully!');
        return true;
    }

    function update()
    {
        $this->set_rules();

        if($this->form_validation->run() == false)
            return false;

        $update = array(
                'emp_id' => $this->emp_id,
                'company' => $this->company,
                'job_title' => $this->job_title,
                'job_description' => $this->job_description,
                'location' => $this->location,
                'skill' => $this->skill,
                'industry' => $this->industry,
                'interview_date' => date('Y-m-d H:i:s', strtotime($this->interview_date)),
                'salary_from' => $this->salary_from,
                'salary_to' => $this->salary_to,
                'finders_fee_from' => $this->finders_fee_from,
                'finders_fee_to' => $this->finders_fee_to,
            );

        $this->db->update('job', $update, array('id' => $this->id));

        $this->session->set_flashdata('msg','Record updated successfully!');
        return true;
    }

    function set_rules()
    {
        $this->form_validation->set_rules('company', 'Company name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('job_title', 'Job title', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('salary_from', 'Salary from', 'trim|required|integer');
        $this->form_validation->set_rules('salary_to', 'Salary to', 'trim|required|integer');
        $this->form_validation->set_rules('finders_fee_from', 'Finders fee from', 'trim|required|integer');
        $this->form_validation->set_rules('finders_fee_to', 'Finders fee to', 'trim|required|integer');
    }
}
