<?php
// namespace application\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class Message
{
    public function success($message = null) {
        $data['type']    = 'success';
        
        switch ($message) {
            case 'C':
                $data['message'] = 'Record created';
                break;
            case 'R':
                $data['message'] = 'Records got successfully';
                break;
            case 'U':
                $data['message'] = 'Record updated';
                break;
            case 'D':
                $data['message'] = 'Record deleted';
                break;
            case '':
                $data['message'] = 'OK';
                break;
            default:
                $data['message'] = $message;
            break;
        }
        
        return $data;
                    
    }
    
    public function info($message = null) {
        $data['type']    = 'info';
        $data['message'] = $message;
        return $data;
    }
    
    public function warning($message = null) {
        $data['type']    = 'warn';
        $data['message'] = $message;
        return $data;
    }
    
    public function error($message = null) {
        $data['type']    = 'error';
        if ($message == null) {
            $data['message'] = 'Error';
        }
        else
        {
            $data['message'] = $message;
        }
        return $data;
    }
} 