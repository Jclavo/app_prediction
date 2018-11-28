<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Answer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('alternative_model','student_model','test_model'));
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
        
        $data['test_alternative'] = $this->alternative_model->getbytest($test_id);
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $data['student'] = $this->student_model->get_student($student_id);
        mysqli_next_result( $this->db->conn_id ); // Free BDD
        $data['test'] = $this->test_model->get_test($test_id);
        
        echo json_encode($data);
    }

    
/* 
    public function create_answer()
    {
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $cellphone = $this->input->get('cellphone');

        $data['status'] = $this->answer_model->create_answer($name, $lastname, $cellphone);
        echo json_encode($data);
    }

    public function delete_answer()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->answer_model->delete_answer($id);
        echo json_encode($data);
    }
    
    public function update_answer()
    {
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $cellphone = $this->input->get('cellphone');

        $data['status'] = $this->answer_model->update_answer($id, $name, $lastname, $cellphone);
        echo json_encode($data);
    }
    
    public function get_answerbycourse()
    {
        $test_id = $this->input->get('test_id');
        $data['answer'] = $this->answer_model->get_answerbycourse($test_id);
        echo json_encode($data);
    }
    */
}