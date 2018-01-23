<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('About_Us_model');
        $this->load->model('Content_model');
        $this->load->model('Team');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
    }

    

    public function index()
    {
        $about_us = $this->About_Us_model->get_by_category_type('slider_image','background');
        $team = $this->About_Us_model->get_by_category_type('slider_image','team');
        $executive = $this->About_Us_model->get_by_category_type('slider_image','list');

        $this->load->view('layouts/header');
        $this->load->view('layouts/about_us/section1', $array = array('about_us'=>$about_us));
        $this->load->view('layouts/index/our_team', $array = array('team'=>$team));
        $this->load->view('layouts/index/our_executive', $array = array('executive'=>$executive));
         $this->load->view('layouts/footer');
    }

    public function introducing(){
        $content_introducing = $this->About_Us_model->get_by_category('introducing');

        if ($this->agent->is_mobile()){
          $this->load->view('layouts/header_mobile');
          $this->load->view('layouts/mobile/introducing', $array = array('content_introducing'=>$content_introducing));
          $this->load->view('layouts/footer_mobile');
        }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/index/introducing', $array = array('content_introducing'=>$content_introducing));
            $this->load->view('layouts/footer');
        }
    }

    public function vision(){
        $vision = $this->About_Us_model->get_by_category('vision');

        if ($this->agent->is_mobile()){
          $this->load->view('layouts/header_mobile');
          $this->load->view('layouts/mobile/solutions', $array = array('vision'=>$vision));
          $this->load->view('layouts/footer_mobile');
        }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/index/solutions', $array = array('vision'=>$vision));
            $this->load->view('layouts/footer');
        }
    }

    public function mission(){
        $mission = $this->About_Us_model->get_by_category_type('keys_role','background');
        $mission_list = $this->About_Us_model->get_by_category_type('keys_role','list');

        if ($this->agent->is_mobile()){
          $this->load->view('layouts/header_mobile');
          $this->load->view('layouts/mobile/keys_role', $array = array('mission'=>$mission, 'list'=>$mission_list));
          $this->load->view('layouts/footer_mobile');
        }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/index/keys_role', $array = array('mission'=>$mission, 'list'=>$mission_list));
            $this->load->view('layouts/footer');
        }
    }

    public function team(){
        $team = $this->Team->get_by_category('team');
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/team', $array = array('team'=>$team));
        $this->load->view('layouts/footer');
    }

    public function director(){
        $director = $this->About_Us_model->get_by_category('director');
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/director', $array = array('director'=>$director));
        $this->load->view('layouts/footer');
    }

    public function volunteer(){
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/volunteer');
        $this->load->view('layouts/footer');
    }

    public function admin(){
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
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
