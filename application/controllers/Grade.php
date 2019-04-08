<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends CI_Controller
{

    
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('grade_model','student_model','course_model','exam_model'));
    }

    public function index($exam_id,$course_id)
    {
        $data['exam_id'] = $exam_id;
        $data['course_id'] = $course_id;
        
        $this->load->view('grade/grade', $data);
    }

//     This function create or update grades
//        Course => Exam
    public function get_grade()
    {
        $exam_id   = $this->input->get('exam_id');
        $course_id = $this->input->get('course_id');
      
        $data_aux = $this->student_model->get_studentbycourse($course_id);
        
        mysqli_next_result( $this->db->conn_id );
        
        foreach ($data_aux as $student) {
            $this->grade_model->set_grade($student['student_id'],$exam_id);
        }

        $data['grade'] = $this->grade_model->get_gradebyexam($exam_id);
        mysqli_next_result( $this->db->conn_id );
        $data['course'] = $this->course_model->get_course($course_id);
        mysqli_next_result( $this->db->conn_id );
        $data['exam'] = $this->exam_model->get_exam($exam_id);
        
        $data['status']  = $this->message->success('R');
        
        echo json_encode($data);
    }
    
    public function update_grade()
    {

        // Unescape the string values in the JSON array
        $grade = stripcslashes($this->input->get('grade'));
        
        // Decode the JSON array
        $grade = json_decode($grade,TRUE);
        
        foreach ($grade as $grade_aux) {
            $data['status']  =  $this->grade_model->update_grade($grade_aux['grade'],$grade_aux['student_id'],$grade_aux['exam_id']);
        }
        
        $data['status']  = $this->message->success('U');
        
        echo json_encode($data);
    }

}