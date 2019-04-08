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
        $data['status']  = $this->message->success('R');
        echo json_encode($data);
    }

    public function create_exam()
    {
        $description = $this->input->get('description');
        $course_id = $this->input->get('course_id');

        $this->exam_model->create_exam($description,$course_id);
        $data['status'] = $this->message->success('C');
        echo json_encode($data);
    }

    public function delete_exam()
    {
        $id = $this->input->get('id');
        $this->exam_model->delete_exam($id);
        $data['status'] = $this->message->error('D');
        echo json_encode($data);
    }
    
    public function update_exam()
    {
        $id = $this->input->get('id');
        $description = $this->input->get('description');
        
        $this->exam_model->update_exam($id, $description);
        $data['status'] = $this->message->warning('U');
        echo json_encode($data);
    }
    
}