<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('About_Us_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content_slider = $this->About_Us_model->get_by_category('slider_image');
        $content_introducing = $this->About_Us_model->get_by_category('introducing');
        $content_vision = $this->About_Us_model->get_by_category('vision');
        $data = array(
            'content_slider' => $content_slider,
            'content_introducing' => $content_introducing,
            'content_vision' => $content_vision,
            'judul' => 'About Us'
        );

        print_r($data);
    }

    public function admin(){
        $content = $this->About_Us_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'About Us',
            'subjudul' =>'',
        );
        

         $this->template->load('template','content_list', $data);
    }

   
   

}
