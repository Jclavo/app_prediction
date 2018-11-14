<?php
class Question_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_question($description,$test_id)
    {
        $sql = 'CALL usp_question_add(?,?)';
        $query = $this->db->query($sql,array($description,$test_id));
        return $query->result_array();
    }


}