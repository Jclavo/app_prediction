<?php
class Answer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_answer($student_id,$test_id,$question_id)
    {
        $sql = 'CALL usp_answer_add(?,?,?)';
        return $this->db->query($sql,array($student_id,$test_id,$question_id));        
    }
    
    public function get_answerbystudentbytest($student_id,$test_id)
    {
        $sql = 'CALL usp_answer_getbystudentbytest(?,?)';
        $query = $this->db->query($sql,array($student_id,$test_id));
        return $query->result_array();
    }
    
    public function update_answer($answer_id,$selected_option)
    {
        $sql = 'CALL usp_answer_update(?,?)';
        return $this->db->query($sql,array($answer_id,$selected_option));

    }
    
    public function get_gradebytest($test_id) {
        
        $sql = 'CALL usp_answer_getbytest(?)';
        $query = $this->db->query($sql,array($test_id));
        return $query->result_array();
        
    }
    
}