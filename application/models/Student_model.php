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
            $query = $this->db->query($sql, array(
                $id
            ));
        }
        return $query->result_array();
    }

    public function create_student($name, $lastname, $cellphone, $course_id)
    {
        $sql = 'CALL usp_student_add(?,?,?)';
        $xx = '';
            
        $this->db->trans_start();// start Tx 

        $student_query = $this->db->query($sql, array(
            $name,
            $lastname,
            $cellphone
        ));

        $student_id = $student_query->row()->last_student_id;
        
        //free db connection to another query
        mysqli_next_result( $this->db->conn_id );

        
        $sql = 'CALL usp_student_course_add(?,?)';
        $query = $this->db->query($sql, array(
            $student_id,
            $course_id
        ));

        $this->db->trans_complete();// End Tx, if there is any error, there is a ROLL BACK, otherwise a COMMIT 
        
        return $query;

    }

    public function delete_student($id)
    {
        $sql = 'CALL usp_student_delete(?)';
        return $this->db->query($sql, array(
            $id
        ));
    }

    public function update_student($id, $name, $lastname, $cellphone)
    {
        $sql = 'CALL usp_student_update(?,?,?,?)';
        return $this->db->query($sql, array(
            $id,
            $name,
            $lastname,
            $cellphone
        ));
    }
}