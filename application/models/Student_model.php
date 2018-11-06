<?php
class Student_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_student($id = '')
    {
        if ($id === '') {
            $query = $this->db->query('CALL usp_student_get');
            
        } else {
                $sql = 'CALL usp_student_getbyid(?)';
                $query = $this->db->query($sql,array($id));
        }
        return $query->result_array();

    }

    public function create_student($name, $email)
    {
        $sql = 'CALL usp_student_add(?,?)';
        return $this->db->query($sql,array($name,$email));        
    }

    public function delete_student($id)
    {
           $sql = 'CALL usp_student_delete(?)';
           return $this->db->query($sql,array($id)); 
    }
    
    public function update_student($id, $name, $email)
    {
        
        $sql = 'CALL usp_student_update(?,?,?)';
        return $this->db->query($sql,array($id,$name,$email)); 
        
    }
}