<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmeans_graph extends CI_Controller
{

    public function index()
    {
        
        $data = null;
        $this->load->view('kmeans_graph/kmeans_graph',$data);
    }
    
}