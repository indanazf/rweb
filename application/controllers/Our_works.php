<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_works extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Our_Works_model');
        $this->load->model('Content_model');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $our_works = $this->Our_Works_model->get_by_category('main');
        $this->load->view('layouts/header');
        $this->load->view('layouts/about_us/section2', $array = array('our_works'=>$our_works));
        $this->load->view('layouts/footer');
    }

    public function past_going_projects(){
        $bg = $this->Our_Works_model->get_by_category_type('past_going_projects','background');
        $data = $this->Our_Works_model->get_by_category_type('past_going_projects','content_peta_header');
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/our_past', $array = array('bg'=>$bg, 'content'=>$data));
        $this->load->view('layouts/footer');

    }

    public function project_highlights(){
        $bg = $this->Our_Works_model->get_by_category('project_highlights');
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/project_highlight', $array = array('bg' => $bg));
        $this->load->view('layouts/footer');
    }

    public function partner(){
        $bg = $this->Our_Works_model->get_by_category('partners');
        $image = $this->Our_Works_model->get_by_category_image('partners');
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/our_partners',  $array = array('bg' => $bg, 'image'=> $image));
        $this->load->view('layouts/footer');
    }

    public function admin(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content = $this->Our_Works_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Our Works',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }

    public function images(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content_image = $this->Content_image_model->get_by_menu('Our Works');
        $id = $this->Content_model->get_by_subject('partners');
        $id = $id[0]->ID_CONTENT;
    
        $data = array(
            'content_image_data' => $content_image,
            'ID_CONTENT' => $id,
            'page' => 'our_works',
            'judul' => 'Our Client',
            'subjudul' =>'',
        );

        $this->template->load('template','content_image_list', $data);
    }

   
   

}
