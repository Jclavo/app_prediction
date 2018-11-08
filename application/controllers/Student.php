<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
//         $this->load->model('student_model');
        $this->load->model(array('student_model','course_model'));
    }

    public function index()
    {
        $this->load->view('student/student');
    }

    public function get_student()
    {
        $id = $this->input->get('id');
        $data['student'] = $this->student_model->get_student($id);
        $this->db->close();
        $data['course'] = $this->course_model->get_course($id);
        echo json_encode($data);
    }

    public function create_student()
    {
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $cellphone = $this->input->get('cellphone');

        $data['status'] = $this->student_model->create_student($name, $lastname, $cellphone);
        echo json_encode($data);
    }

    public function delete_student()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->student_model->delete_student($id);
        echo json_encode($data);
    }
    
    public function update_student()
    {
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $cellphone = $this->input->get('cellphone');

        $data['status'] = $this->student_model->update_student($id, $name, $lastname, $cellphone);
        echo json_encode($data);
    }
}