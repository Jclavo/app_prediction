<?php

class student_course_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_student_course($id = '')
    {
        if ($id === '') {
            $query = $this->db->query('CALL usp_student_course_get');
        } else {
            $sql = 'CALL usp_student_course_getbyid(?)';
            $query = $this->db->query($sql, array(
                $id
            ));
        }
        return $query->result_array();
    }

    public function create_student_course($student_id,$course_id)
    {
        $sql = 'CALL usp_student_course_add(?,?)';
        return $this->db->query($sql, array(
            $student_id,
            $course_id
        ));
        
    }

    public function delete_student_course($id)
    {
        $sql = 'CALL usp_student_course_delete(?)';
        return $this->db->query($sql, array(
            $id
        ));
    }

}