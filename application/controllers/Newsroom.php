<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsroom extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Newsroom_model');
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
        $content = $this->Newsroom_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Newsroom',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }


}
