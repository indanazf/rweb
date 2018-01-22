<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_impact extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Our_impact_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $background = $this->Our_impact_model->get_by_category('background', 'list');
        $bg = $this->Our_impact_model->get_by_category('box');
        $box = $this->Our_impact_model->get_by_category('box','list');
        $box_chart1 = $this->Our_impact_model->get_by_category('box', 'sector_chart');
        $box_chart2 = $this->Our_impact_model->get_by_category('box', 'geography_chart');
        $annual_report = $this->Our_impact_model->get_by_category('annual report');
        $success_stories = $this->Our_impact_model->get_by_category('success stories');
        $count_stories = $this->Our_impact_model->count_stories('success stories');
        $data = array(
            'background' => $background,
            'box' => $box,
            'box_chart1' => $box_chart1,
            'box_chart2' => $box_chart2,
            'annual_report' => $annual_report,
            'success_stories' => $success_stories,
            'judul' => 'Our Impact'
            );

        $this->load->view('layouts/header');
        $this->load->view('layouts/index/start_slider');
        $this->load->view('layouts/index/our_impact_map_detail', $array = array('bg'=>$bg,'detail'=>$box, 'chart1'=>$box_chart1, 'chart2'=>$box_chart2));
        $this->load->view('layouts/index/annual_report', $array = array('annual' => $annual_report));
        $this->load->view('layouts/index/success_stories', $array = array('success' => $success_stories, 'counter'=>$count_stories,'judul' => 'Success Stories'));
        $this->load->view('layouts/index/end_slider');
        $this->load->view('layouts/footer');
    }

    public function admin(){
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $content = $this->Our_impact_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Our Impact',
            'subjudul' =>'',
            );
        

        $this->template->load('template','content_list', $data);
    }

    public function readmore(){
        $id = $this->input->post('id', TRUE);

        $data['konten'] = $this->Our_impact_model->get_by_id($id);
        echo json_encode($data);
    }

}
