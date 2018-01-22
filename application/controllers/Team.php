<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content = $this->Team_model->get_limit_data('');
        $data = array(
            'content' => $content,
            'judul' => 'Team'
            );

        print_r($data);
    }

    public function admin(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content = $this->Team_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Team',
            'subjudul' =>'',
            );
        

        $this->template->load('template','content_list', $data);
    }
}
