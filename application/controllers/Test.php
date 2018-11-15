<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('test_model','question_model','alternative_model'));
    }

    public function index()
    {
        $this->load->view('test/test');
    }

    public function get_test()
    {
        $id = $this->input->get('id');
        $data['test'] = $this->test_model->get_test($id);
        echo json_encode($data);
    }

    public function create_test()
    {
        $alphabet = range('A', 'Z');
                
        $description  = $this->input->get('description');
        $total_question = $this->input->get('total_question');
        $total_alternative = $this->input->get('total_alternative');
        
        $this->db->trans_start();// start Tx 
        
        $data_test = $this->test_model->create_test($description,$total_question,$total_alternative);
        $test_new_id = $data_test[0]['last_test_id'];
        
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        
        // ADD Questions
        for ($i = 1; $i <= $total_question; $i++) {
            $data_question = $this->question_model->create_question('Question '.$i,$test_new_id);
            $question_new_id = $data_question[0]['last_question_id'];
            
            mysqli_next_result( $this->db->conn_id ); // Free BDD
            
            //ADD Options
            for ($j = 1; $j <= $total_alternative; $j++) {
                $this->alternative_model->create_alternative($alphabet[$j-1],'Option '.$j,$question_new_id);
            }
            
        }
        
        $this->db->trans_complete();// End Tx, if there is any error, there is a ROLL BACK, otherwise a COMMIT 

        $data['status'] =  $data_test;
        echo json_encode($data);
    }

    public function delete_test()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->test_model->delete_test($id);
        echo json_encode($data);
    }
    
    public function update_test()
    {
        $id = $this->input->get('id');
        $description  = $this->input->get('description');

        $data['status'] = $this->test_model->update_test($id, $description);
        echo json_encode($data);
    }
    
    public function test_student() {
        $this->load->view('test_student/test_student');
    }
 
}