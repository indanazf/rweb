<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get_involved extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Get_involved_model');
        $this->load->model('Faq_question_model');
        $this->load->model('Join_us_model');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
        // $this->load->library('user_agent');
    }

    

    public function index()
    {
        $content_main = $this->Get_involved_model->get_by_category('get_involved');
        $join_us = $this->Join_us_model->get_by_category('join_us');
        $faq = $this->Faq_question_model->get_all();
        $data = array(
            'content_main' => $content_main,
            'join_us' => $join_us,
            'faq' => $faq,
            'judul' => 'Get Involved'
        );

        print_r($data);
    }

    public function faq(){
        $faq = $this->Faq_question_model->get_all();
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/faq', $array = array('faq'=>$faq));
        $this->load->view('layouts/footer');
    }

    public function join_us(){
        $join_us = $this->Join_us_model->get_by_category_type('join_us');
        $join_list = $this->Get_involved_model->get_by_category_type('join_us','list');

        if ($this->agent->is_mobile()){
            $this->load->view('layouts/header_mobile');
            $this->load->view('layouts/mobile/join_us', $array = array('join_us'=>$join_us, 'join_list'=>$join_list));
            $this->load->view('layouts/footer_mobile');
        }else{
            $this->load->view('layouts/header');
            $this->load->view('layouts/index/join_us', $array = array('join_us'=>$join_us, 'join_list'=>$join_list));
            $this->load->view('layouts/footer');
        }
    }

    public function admin(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content = $this->Get_involved_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Get Involved',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }

    public function images(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content_image = $this->Content_image_model->get_by_menu('Our Works');
    
        $data = array(
            'content_image_data' => $content_image,
            'judul' => 'CONTENT_IMAGE',
            'subjudul' =>'',
        );

        $this->template->load('template','content_image_list', $data);
    }

   
   

}
