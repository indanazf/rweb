<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get_involved extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Get_involved_model');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content_main = $this->Get_involved_model->get_by_category('get_involved');
        $data = array(
            'content_main' => $content_main,
            'judul' => 'Get Involved'
        );

        print_r($data);
    }

    public function admin(){
        $content = $this->Get_involved_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Get Involved',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }

    public function images(){
        $content_image = $this->Content_image_model->get_by_menu('Our Works');
    
        $data = array(
            'content_image_data' => $content_image,
            'judul' => 'CONTENT_IMAGE',
            'subjudul' =>'',
        );

        $this->template->load('template','content_image_list', $data);
    }

   
   

}
