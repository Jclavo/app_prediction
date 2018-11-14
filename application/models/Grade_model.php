<?php
class Grade_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function set_grade($student_id,$exam_id)
    {
        $sql = 'CALL usp_grade_add(?,?)';
        return $this->db->query($sql,array($student_id,$exam_id));        
    }

    public function get_gradebyexam($exam_id)
    {
           $sql = 'CALL usp_grade_getbyexam(?)';
           $query = $this->db->query($sql,array($exam_id));
           return $query->result_array();
    }
    
    public function update_grade($grade,$student_id,$exam_id)
    {
        $sql = 'CALL usp_grade_update(?,?,?)';
        return $this->db->query($sql,array($grade,$student_id,$exam_id));
//         return $query->result_array();
    }
}