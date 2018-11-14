<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('course_model','student_model','student_course_model',));
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
        $flag_copy = $this->input->get('flag_copy');
        $course_copied = $this->input->get('course_copied');

        $this->db->trans_start();// start Tx 
        
        $course = $this->course_model->create_course($name, $started_date);
        $course_new_id = $course[0]['last_course_id'];
//         echo $course[0]['last_course_id'];
        mysqli_next_result( $this->db->conn_id );
        
        if ($flag_copy == 'X') {
            $list_student = $this->student_model->get_studentbycourse($course_copied);
            
            mysqli_next_result( $this->db->conn_id );
            
            foreach ($list_student as $student) {
                $this->student_course_model->create_student_course($student['student_id'],$course_new_id);
            }
            
        }
        
        $this->db->trans_complete();// End Tx, if there is any error, there is a ROLL BACK, otherwise a COMMIT 
        
        $data['status'] = $course;
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