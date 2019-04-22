<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('question_model','test_model'));
    }

    public function index($test_id)
    {
        $data['test_id']  = $test_id;
        
        $this->load->view('question/question', $data);
    }
    
    public function get_questions() {
        
        $id = $this->input->get('test_id');
        
        $data['test'] = $this->test_model->get_test($id);
        
        mysqli_next_result( $this->db->conn_id );//Free BDD

        $data['questions'] = $this->question_model->get_questionbytest($id);
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $data['test'] = $this->test_model->get_test($id);
        
        $data['status']  = $this->message->success('R');
        
        
        echo json_encode($data);
    }
    
    public function update_question() {
        
        // Unescape the string values in the JSON array
        $questions = stripcslashes($this->input->get('questions'));
        
        // Decode the JSON array
        $questions = json_decode($questions,TRUE);
        
        foreach ($questions as $question) {
            $data['status'] = $this->question_model->update_correct_answer($question['question_id'],$question['correct_answer']);
            //mysqli_next_result( $this->db->conn_id );//Free BDD
        }
        
        return $data['status'];
        echo json_encode($data);
    }
    
    public function correct_question() {
        $this->load->view('correct_question/correct_question', null);
    }
    
    public function update_correct_answer() {
        
        
        // Unescape the string values in the JSON array
        $questions = stripcslashes($this->input->get('questions'));
        
        // Decode the JSON array
        $questions = json_decode($questions,TRUE);
        
        foreach ($questions as $question) {
            $data['status'] = $this->question_model->update_correct_answer($question['question_id'],$question['correct']);
            //mysqli_next_result( $this->db->conn_id );//Free BDD
        }
        
        //return $data['status'];
        $data['status'] = $this->message->warning('U');
        echo json_encode($data);
        
    }
}