<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/career');
        $this->load->view('layouts/footer');
    }

    public function detail()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/career_detail');
        $this->load->view('layouts/footer');
    }

}
