<?php
class Course_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_course($id = '')
    {
        if ($id === '') {
            $query = $this->db->query('CALL usp_course_get');
            
        } else {
                $sql = 'CALL usp_course_getbyid(?)';
                $query = $this->db->query($sql,array($id));
        }
        return $query->result_array();

    }

    public function create_course($name, $started_date)
    {
        $sql = 'CALL usp_course_add(?,?)';
        $query = $this->db->query($sql,array($name, $started_date));   
        return $query->result_array();
    }

    public function delete_course($id)
    {
           $sql = 'CALL usp_course_delete(?)';
           return $this->db->query($sql,array($id)); 
    }
    
    public function update_course($id, $name, $started_date)
    {
        
        $sql = 'CALL usp_course_update(?,?,?)';
        return $this->db->query($sql,array($id,$name,$started_date)); 
        
    }
    
    public function get_avegareByCourse($course_id) {
        $sql = 'CALL usp_grade_getAvegareByCourse(?)';
        $query = $this->db->query($sql,array($course_id)); 
        return $query->result_array();
    }
}