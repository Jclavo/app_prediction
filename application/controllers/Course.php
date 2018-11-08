<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
    }

    public function index()
    {
        $this->load->view('course/course');
    }

    public function get_course()
    {
        $id = $this->input->get('id');
        $data['course'] = $this->course_model->get_course($id);
        echo json_encode($data);
    }

    public function create_course()
    {
        $name = $this->input->get('description');
        $started_date = $this->input->get('started_date');

        $data['status'] = $this->course_model->create_course($name, $started_date);
        echo json_encode($data);
    }

    public function delete_course()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->course_model->delete_course($id);
        echo json_encode($data);
    }
    
    public function update_course()
    {
        $id = $this->input->get('id');
        $name = $this->input->get('description');
        $started_date = $this->input->get('started_date');

        $data['status'] = $this->course_model->update_course($id, $name, $started_date);
        echo json_encode($data);
    }
}