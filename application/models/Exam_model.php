<?php
class Exam_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_exam($id = '')
    {
        if ($id === '') {
            $query = $this->db->query('CALL usp_exam_get');
            
        } else {
                $sql = 'CALL usp_exam_getbyid(?)';
                $query = $this->db->query($sql,array($id));
        }
        return $query->result_array();

    }

    public function create_exam($description,$course_id)
    {
        $sql = 'CALL usp_exam_add(?,?)';
        return $this->db->query($sql,array($description,$course_id));        
    }

    public function delete_exam($id)
    {
           $sql = 'CALL usp_exam_delete(?)';
           return $this->db->query($sql,array($id)); 
    }
    
    public function update_exam($id, $description)
    {
        
        $sql = 'CALL usp_exam_update(?,?)';
        return $this->db->query($sql,array($id, $description)); 
        
    }
}