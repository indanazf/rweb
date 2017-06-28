<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('About_Us_model');
        $this->load->model('Our_Works_model');
        $this->load->model('Get_involved_model');
        $this->load->model('Our_impact_model');
        $this->load->model('Newsroom_model');
        $this->load->model('Content_model');
        $this->load->model('Team');
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $about_us = $this->About_Us_model->get_by_category_type('slider_image','background');
        $team = $this->About_Us_model->get_by_category_type('slider_image','team');
        $executive = $this->About_Us_model->get_by_category_type('slider_image','list');
        $our_works = $this->Our_Works_model->get_by_category('main');
        $our_impact = $this->Our_impact_model->get_by_category('background');
        $our_impact_list = $this->Our_impact_model->get_by_category('background', 'list');
        $get_involved = $this->Get_involved_model->get_by_category_type('get_involved','background');
        $content_press_release = $this->Newsroom_model->get_by_category2('press_release');
        $content_in_news = $this->Newsroom_model->get_by_category2('in_news');
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/about_us/section1', $array = array('about_us'=>$about_us,'team'=>$team,'executive'=>$executive));
        $this->load->view('layouts/about_us/section2', $array = array('our_works'=>$our_works));
        $this->load->view('layouts/about_us/section3', $array = array('our_impact'=>$our_impact, 'our_impact_list'=>$our_impact_list));
        $this->load->view('layouts/about_us/section4', $array = array('get_involved'=>$get_involved));
        $this->load->view('layouts/about_us/section5', $array = array('content_press'=>$content_press_release, 'content_news'=>$content_in_news));
        $this->load->view('layouts/about_us/section6');
        $this->load->view('layouts/footer');
    }


}
