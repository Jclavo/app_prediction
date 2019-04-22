<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Answer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('question_model','student_model','test_model','answer_model'));
    }

    public function index($student_id,$test_id)
    {
        $data['student_id'] = $student_id;
        $data['test_id'] = $test_id;
                
        $this->load->view('answer/answer', $data);
    }

   public function get_initial_data()
    {
        $student_id = $this->input->get('student_id');
        $test_id = $this->input->get('test_id');
        
//         $this->db->trans_start();// start Tx 

        $data['student'] = $this->student_model->get_student($student_id);
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $data['test'] = $this->test_model->get_test($test_id);
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        $list_questions = $this->question_model->get_questionbytest($test_id);
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        foreach ($list_questions as $question) {
            $this->answer_model->create_answer($student_id,$test_id,$question['question_id']);
        }
        
        $data['answer'] = $this->answer_model->get_answerbystudentbytest($student_id,$test_id);
        
//         $this->db->trans_complete();// End Tx, if there is any error, there is a ROLL BACK, otherwise a COMMIT
        $data['status']  = $this->message->array_isEmpty($data['answer'],'Answers');
        echo json_encode($data);
    }


    public function update_answer()
    {
        // Unescape the string values in the JSON array
        $answers = stripcslashes($this->input->get('answer'));
        
        // Decode the JSON array
        $answers = json_decode($answers,TRUE);
        
        foreach ($answers as $answer) {
            $data['status'] = $this->answer_model->update_answer($answer['answer_id'],$answer['selected_option']);
        }
        
        $data['status'] = $this->message->warning('U');
        echo json_encode($data);
    }
    

  


}