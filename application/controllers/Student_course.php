<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_course extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('student_course_model','course_model','student_model'));
    }

    public function index()
    {
        $this->load->view('student_course/student_course');
    }

    public function get_student_course()
    {
        $id = $this->input->get('id');
        $data['student_course'] = $this->student_course_model->get_student_course($id);
        $this->db->close();
        $data['course'] = $this->course_model->get_course();
        $this->db->close();
        $data['student'] = $this->student_model->get_student();
        $data['status']  = $this->message->success('R');
        echo json_encode($data);
    }

    public function create_student_course()
    {
        $student_id = $this->input->get('student_id');
        $course_id = $this->input->get('course_id');

        $this->student_course_model->create_student_course($student_id,$course_id);
        $data['status'] = $this->message->success('C');
        
        echo json_encode($data);
    }

    public function delete_student_course()
    {
        $id = $this->input->get('id');
        $this->student_course_model->delete_student_course($id);
        $data['status'] = $this->message->error('D');
        
        echo json_encode($data);
    }
    
}