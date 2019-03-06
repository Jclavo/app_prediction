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
        
        
        /*Create Histogram Structure
         * ADD new fields
         * - value = 
         */
        
        $histograms = array();
        foreach ($alternatives as $alternative) {
            
            $alternative['total_checked'] = 0;
            $alternative['sum_cluster']   = 0;
            $alternative['percentage']    = 0;
            
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
                        
                        $histograms[$index_histogram]['total_checked'] = $histograms[$index_histogram]['total_checked'] + 1;
                        
                        foreach ($students as $student) {
                            if ($student['id'] == $answer['student_id']) {
                                $histograms[$index_histogram]['sum_cluster'] = $histograms[$index_histogram]['sum_cluster'] + $student['cluster_value'];
                                break;
                            }
                            
                        }
                        
                        
                    }
                   
                  break;
                }
                
            }
        } 
        
        //Get % Cluster
        $percent_histograms = array();
        $percent_histogram  = array();
        $percent_histogram_flag =  0;
        
        foreach ($histograms as $histogram) {
            $percent_histogram_flag =  0;
            foreach ($percent_histograms as $key => $percent_histogram) {
                if ($histogram['question_id'] == $percent_histogram['question_id']) {
                    $percent_histograms[$key]['total'] = $percent_histograms[$key]['total'] + $histogram['sum_cluster'];
                    $percent_histogram_flag =  1;
                }
            }
            if ($percent_histogram_flag == 0) {
                $percent_histogram['question_id'] = $histogram['question_id'];
                $percent_histogram['total'] = $histogram['sum_cluster'];
                array_push($percent_histograms,$percent_histogram);
            }
            
        }
        
        foreach ($histograms as $key => $histogram) {
            foreach ($percent_histograms as $percent_histogram) {
                if ($histogram['question_id'] == $percent_histogram['question_id'])  {
                    $histograms[$key]['percentage'] =  ( $histograms[$key]['sum_cluster'] /  $percent_histogram['total'] ) * 100;
                    break;
                }
            }
        }
        
        return $histograms;
        
        
    }
}