<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('student_model','exam_model'));
        //$this->load->library('Message');
    }

    public function index()
    {
        $this->load->view('student/student');
    }

    public function get_student()
    {
        $id = $this->input->get('id');
        $data['student'] = $this->student_model->get_student($id);
        $data['status']  = $this->message->success('R');
        echo json_encode($data);
    }

    public function create_student()
    {
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $cellphone = $this->input->get('cellphone');

        $this->student_model->create_student($name, $lastname, $cellphone);
        $data['status'] = $this->message->success('C');
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
    
    public function get_studentbycourse()
    {
        $course_id = $this->input->get('course_id');
        $data['student'] = $this->student_model->get_studentbycourse($course_id);
        echo json_encode($data);
    }
    
    public function get_studentbytest()
    {
        $test_id = $this->input->get('test_id');
        
        $data_course = $this->exam_model->get_exambytest($test_id);
        $course_id  = $data_course[0]['course_id'];
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $data['student'] = $this->student_model->get_studentbycourse($course_id);
        echo json_encode($data);
    }
      
    
}