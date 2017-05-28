<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_works extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Our_Works_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        
    }

    public function admin(){
        $content = $this->Our_Works_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Our Works',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }

   
   

}
