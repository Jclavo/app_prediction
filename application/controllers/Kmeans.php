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
                                 'alternative_model',
                                 'test_model'
        ));
        $this->load->library('K_means');
    }
    
    public function index()
    {
        
        $data = null;
        $this->load->view('kmeans/kmeans',$data);
    }
    
    public  function execute_kmeans() {
        
        $test_id = $this->input->get('test_id');
        
        $data_course = $this->exam_model->get_exambytest($test_id);
        $course_id  = $data_course[0]['course_id'];
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $students = $this->course_model->get_avegareByCourse($course_id);
        
        $DATA = $this->k_means->start_kmeans($students,2); //CALL Kmeans
        
        
        $clusters = $DATA['clusters'][count($DATA['clusters'])-1]; //Assign the last cluster 
        
        
        // Add Students' name and Cluster's letter
        foreach ($DATA['students'] as $key => $std) {
            
            $DATA['students'][$key] = $this->fill_structure_students($std,$DATA['clusters'][$key],$students); 
 
        }
        
        $students = $DATA['students'][count($DATA['students'])-1]; //Assign the last student
        
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $answers = $this->answer_model->get_gradebytest($test_id);
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $test = $this->test_model->get_test($test_id);
        $DATA['total_alternatives'] = $test[0]['total_alternative']; //Get Total alternatives by Answer
        
        
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
        
        $DATA['histograms']  = $histograms;
        
        //Get questions and their correct answers
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $questions = $this->question_model->get_questionbytest($test_id);
        
       
        foreach ($questions as $key => $question) {
            $flag_first_question = 0;
            $correct_answer = 0;
            foreach ($histograms as $histogram) {
                if ($question['question_id'] == $histogram['question_id']) {
                    if ($flag_first_question == 0) {
                        $highest_percentage = $histogram['percentage'];
                        $correct_answer     = $flag_first_question + 1;
                    }
                    
                    if ($highest_percentage < $histogram['percentage']) {
                        $highest_percentage = $histogram['percentage'];
                        $correct_answer     = $flag_first_question + 1;
                    }
                    $flag_first_question =  $flag_first_question + 1;
                }
            }
            $questions[$key]['predict'] = $correct_answer;
            
            if ($questions[$key]['predict'] == $questions[$key]['correct']) {
                $questions[$key]['matched'] = 1;
            }
            else {
                $questions[$key]['matched'] = 0;
            }
            
           
         }
         
         $DATA['answers']  = $questions;
        
        
        echo json_encode($DATA);
          
    }
    
    
    private function fill_structure_students($students,$clusters,$students_names){
        
        $new_students = array();
        
        foreach ($students as $key => $student) {
            
            // Assign Cluster's letter
            foreach ($clusters as $cluster) {
                if ($student['cluster_value'] == $cluster['value']) {
                    $students[$key]['cluster'] = $cluster['letter'];
                    break;
                }
            }
            
                        
           
            
            foreach ($students_names as $key => $student_name) {
                if ($student['id'] == $student_name['student_id']) {
                    //$new_student['name'] = $student_name['name'] . " " . $student_name['lastname'] ;
                    //$new_student['name'] = $student_name['name'];
                    $students[$key]['name'] = $student_name['name'] . " " . $student_name['lastname'] ;
                    break;
                }
            }
                        
            

        }
        
        foreach ($students as $key => $student) {
            //create a new Student's structure
            $new_student['id']              = $student['id'];
            $new_student['name']            = $student['name'];
            $new_student['average']         = $student['average'];
            $new_student['cluster']         = $student['cluster'];
            $new_student['cluster_value']   = $student['cluster_value'];
            array_push($new_students,$new_student);
        }
        
        return $new_students;
        
        
    }
}