<?php
class Alternative_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_alternative($letter,$description,$question_id)
    {
        $sql = 'CALL usp_alternative_add(?,?,?)';
        return $this->db->query($sql,array($letter,$description,$question_id));        
    }


}