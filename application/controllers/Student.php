<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }

    public function index()
    {
        $this->load->view('student/student');
    }

    public function get_student()
    {
        $id = $this->input->get('id');
        $data['student'] = $this->student_model->get_student($id);
        echo json_encode($data);
    }

//     public function create_student()
//     {
//         $name = $this->input->get('name');
//         $email = $this->input->get('email');

//         $data['status'] = $this->student_model->create_student($name, $email);
//         echo json_encode($data);
//     }

//     public function delete_student()
//     {
//         $id = $this->input->get('id');
//         $data['status'] = $this->student_model->delete_student($id);
//         echo json_encode($data);
//     }

//     public function update_student()
//     {
//         $id = $this->input->get('id');
//         $name = $this->input->get('name');
//         $email = $this->input->get('email');

//         $data['status'] = $this->student_model->update_student($id, $name, $email);
//         echo json_encode($data);
//     }
}