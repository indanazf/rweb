<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsroom extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Newsroom_model');
        $this->load->model('Our_impact_model');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content_press_release = $this->Newsroom_model->get_by_category('press_release');
        $content_in_news = $this->Newsroom_model->get_by_category('in_news');

        $data = array(
            'content_press_release' => $content_press_release,
            'content_in_news' => $content_in_news,
            'judul' => 'Newsroom'
            );

        print_r($data);
    }

    public function admin(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content = $this->Newsroom_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Newsroom',
            'subjudul' =>'',
            );
        

        $this->template->load('template','content_list', $data);
    }

    public function press_release(){
        $success_stories = $this->Newsroom_model->get_by_category('press release');
        $count_stories = $this->Newsroom_model->count_stories('press release');

        $this->load->view('layouts/header');
        $this->load->view('layouts/index/press_release', $array = array('success' => $success_stories, 'counter'=>$count_stories,'judul' => 'Press Release'));
        $this->load->view('layouts/footer'); 
    }

    public function detail_press_release(){
       

        $this->load->view('layouts/header');
        $this->load->view('layouts/index/detail_press_release');
        $this->load->view('layouts/footer'); 
    }

     public function news(){
        $success_stories = $this->Newsroom_model->get_by_category('news');
        $count_stories = $this->Newsroom_model->count_stories('news');

        $this->load->view('layouts/header');
        $this->load->view('layouts/index/news', $array = array('success' => $success_stories, 'counter'=>$count_stories,'judul' => 'SC in News'));
        $this->load->view('layouts/footer'); 
    }


}
