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
        $this->load->model('Content_model');
        $this->load->model('Team');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content_slider = $this->About_Us_model->get_by_category('slider_image');
        $content_introducing = $this->About_Us_model->get_by_category('introducing');
        $content_vision = $this->About_Us_model->get_by_category('vision');
        $content_keys_role = $this->About_Us_model->get_by_category('keys_role');
        $content_team = $this->Team->get_by_category('team');
        $content_director = $this->About_Us_model->get_by_category('director');
        $data = array(
            'content_slider' => $content_slider,
            'content_introducing' => $content_introducing,
            'content_vision' => $content_vision,
            'content_keys_role' => $content_keys_role,
            'content_team' => $content_team,
            'content_director' => $content_director,
            'judul' => 'About Us'
        );

        //print_r($data);
        $this->load->view('layouts/header');
        $this->load->view('layouts/about_us/section1', $array = array('content_slider'=>$content_slider));
        $this->load->view('layouts/about_us/section2', $array = array('content_introducing'=>$content_introducing));
        $this->load->view('layouts/about_us/section3', $array = array('content_vision'=>$content_vision));
        $this->load->view('layouts/about_us/section4', $array = array('content_keys_role'=>$content_keys_role));
        $this->load->view('layouts/about_us/section5', $array = array('content_team'=>$content_team));
        $this->load->view('layouts/about_us/section6', $array = array('content_director'=>$content_director));
        $this->load->view('layouts/footer');
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

   
   public function images(){
        $content_image = $this->Content_image_model->get_by_menu('About Us');
        $id = $this->Content_model->get_by_subject('Introduce Team');
        $id = $id[0]->ID_CONTENT;
    
        $data = array(
            'content_image_data' => $content_image,
            'ID_CONTENT' => $id,
            'page' => 'our_team',
            'judul' => 'Our Team',
            'subjudul' =>'',
        );

        $this->template->load('template','content_image_list', $data);
    }

}
