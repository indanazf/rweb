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
        $this->load->model('Content_model');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $content_main = $this->Our_Works_model->get_by_category('main');
        $content_past_going_projects = $this->Our_Works_model->get_by_category('past_going_projects');
        $content_project_highlights = $this->Our_Works_model->get_by_category('project_highlights');
        $content_partners = $this->Our_Works_model->get_by_category_image('partners');
        $data = array(
            'content_main' => $content_main,
            'content_past_going_projects' => $content_past_going_projects,
            'content_project_highlights' => $content_project_highlights,
            'content_partners' => $content_partners,
            'judul' => 'Newsroom'
        );

        print_r($data);
    }

    public function admin(){
        $content = $this->Our_Works_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Newsroom',
            'subjudul' =>'',
        );
        

        $this->template->load('template','content_list', $data);
    }

    public function images(){
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
