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
                $message = 'Record updated';
                break;
            case 'D':
                $message = 'Record deleted';
                break;
            /*
            default:
                break;
            */
        }
        return $message;
    }
} 