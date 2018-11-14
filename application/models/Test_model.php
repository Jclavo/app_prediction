<?php
class Test_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_test($id = '')
    {
        if ($id === '') {
            $query = $this->db->query('CALL usp_test_get');
            
        } else {
                $sql = 'CALL usp_test_getbyid(?)';
                $query = $this->db->query($sql,array($id));
        }
        return $query->result_array();

    }

    public function create_test($description,$total_question,$total_option)
    {
        $sql = 'CALL usp_test_add(?,?,?)';
        $query = $this->db->query($sql,array($description,$total_question,$total_option)); 
        return $query->result_array();
    }

    public function delete_test($id)
    {
           $sql = 'CALL usp_test_delete(?)';
           return $this->db->query($sql,array($id)); 
    }
    
    public function update_test($id, $description)
    {
        
        $sql = 'CALL usp_test_update(?,?)';
        return $this->db->query($sql,array($id, $description)); 
        
    }
        
}