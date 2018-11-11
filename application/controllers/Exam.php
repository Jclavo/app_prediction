<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('exam_model','course_model'));
    }

    public function index()
    {
        $this->load->view('exam/exam');
    }

    public function get_exam()
    {
        $id = $this->input->get('id');
        $data['exam'] = $this->exam_model->get_exam($id);
        $this->db->close();
        $data['course'] = $this->course_model->get_course();
        
        echo json_encode($data);
    }

    public function create_exam()
    {
        $description = $this->input->get('description');
        $course_id = $this->input->get('course_id');

        $data['status'] = $this->exam_model->create_exam($description,$course_id);
        echo json_encode($data);
    }

    public function delete_exam()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->exam_model->delete_exam($id);
        echo json_encode($data);
    }
    
    public function update_exam()
    {
        $id = $this->input->get('id');
        $description = $this->input->get('description');
        
        $data['status'] = $this->exam_model->update_exam($id, $description);
        echo json_encode($data);
    }
}