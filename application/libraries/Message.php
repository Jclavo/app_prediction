<?php
// namespace application\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class Message
{
    public function success($message = null) {
        $data['type']    = 'success';
        if ($message == null) {
            $data['message'] = 'OK';
        }
        else
        {
            $data['message'] = $this->set_message($message);
        }
        return $data;
                    
    }
    
    public function info($message = null) {
        $data['type']    = 'info';
        $data['message'] = $this->set_message($message);
        return $data;
    }
    
    public function warning($message = null) {
        $data['type']    = 'warn';
        $data['message'] = $this->set_message($message);
        return $data;
    }
    
    public function error($message = null) {
        $data['type']    = 'error';
        if ($message == null) {
            $data['message'] = 'Error';
        }
        else
        {
            $data['message'] = $this->set_message($message);
        }
        return $data;
    }
    
    function set_message($message) {
        
        switch ($message) {
            case 'C':
                $message = 'Record created';
                break;
            case 'R':
                $message = 'Records got successfully';
                break;
            case 'U':
                $message = 'Records updated';
                break;
            case 'D':
                $message = 'Records deleted';
                break;
            case 'N':
                
                break;
                
            /*
            default:
                break;
            */
        }
        return $message;
    }
    
    function array_isEmpty($array,$name)
    {
        if (count($array) == 0) {
            $data['type']    = 'error';
            if ($name != null) {
                $data['message'] = $name . ' records not found';
            }
            else{
                $data['message'] = 'Records not found';
            }
            
        }
        else{
            $data['type']    = 'success';
            $data['message'] = 'Records got successfully';
        }
        
        
        return $data;
    }
} 