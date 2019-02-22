<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmeans extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('exam_model','student_model'));
    }
    
    public function index()
    {
        //$this->load->view('kmeans/kmeans', $data);
        $data = null;
        $this->load->view('kmeans/kmeans',$data);
    }
    
    public  function execute_kmeans() {
        
        $test_id = $this->input->get('test_id');
        
        $data_course = $this->exam_model->get_exambytest($test_id);
        $course_id  = $data_course[0]['course_id'];
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $data['student'] = $this->student_model->get_studentbycourse($course_id);
        
        
        
        
        
        ;
    }
}