<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmeans extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('exam_model',
                                 'student_model',
                                 'course_model',
                                 'answer_model',
                                 'question_model',
                                 'alternative_model'
        ));
        $this->load->library('k_means');
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
        
        //$data['student'] = $this->student_model->get_studentbycourse($course_id);
        
        $data['student'] = $this->course_model->get_avegareByCourse($course_id);
        
        $students = $this->k_means->start_kmeans($data['student'],2); //CALL Kmeans
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $answers = $this->answer_model->get_gradebytest($test_id);
        
        
        
        //$answer_list = $this->question_model->get_questionbytest($test_id);

        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $alternatives = $this->alternative_model->getbytest($test_id);
        
        
        //Create Histogram Structure
        $histograms = array();
        foreach ($alternatives as $alternative) {
            
            $alternative['value'] = 0;
            
            array_push($histograms,$alternative);
            
        }        
        
        //Full fill Histogram
        $index_histogram = 0;
        foreach ($answers as $answer) {
            
            foreach ($histograms as $key => $histogram) {
                
                if ($answer['question_id'] == $histogram['question_id'] ) {
                    
                    if ($answer['selected_option'] > 0 ) {
                        
                        $index_histogram = 0;
                        $index_histogram = $key + $answer['selected_option'] - 1;
                        
                        $histograms[$index_histogram]['value'] = $histograms[$index_histogram]['value'] + 1;
                        
                    }
                                       
                }
                
            }
        } 
        
        if (1 == 1) {
            
        }
        
        
    }
}