<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Become_partner extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/become_partner');
         $this->load->view('layouts/footer');
    }

}
