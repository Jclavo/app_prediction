<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
//         $this->load->model('grade_model');
    }

    public function index()
    {
        $this->load->view('grade/grade');
    }

//     This function create or update grades
//        Course => Exam
    public function set_grade()
    {
//         $course_id = $this->input->get('course_id');
        $exam_id   = $this->input->get('exam_id');
        
        
//         $data['grade'] = $this->grade_model->get_grade($id);
//         echo json_encode($data);
    }

}