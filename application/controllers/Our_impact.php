<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_impact extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Our_impact_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        $background = $this->Our_impact_model->get_by_category('background', 'list');
        $box = $this->Our_impact_model->get_by_category('box','list');
        $box_chart1 = $this->Our_impact_model->get_by_category('box', 'sector_chart');
        $box_chart2 = $this->Our_impact_model->get_by_category('box', 'geography_chart');
        $annual_report = $this->Our_impact_model->get_by_category('annual report');
        $success_stories = $this->Our_impact_model->get_by_category('success stories');
        $data = array(
            'background' => $background,
            'box' => $box,
            'box_chart1' => $box_chart1,
            'box_chart2' => $box_chart2,
            'annual_report' => $annual_report,
            'success_stories' => $success_stories,
            'judul' => 'Our Impact'
            );

        print_r($data);
    }

    public function admin(){
        $content = $this->Our_impact_model->get_all();

        $data = array(
            'content_data' => $content,
            'judul' => 'Our Impact',
            'subjudul' =>'',
            );
        

        $this->template->load('template','content_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Content_model->get_by_id($id);
        if ($row) {
            $data = array(
              'ID_CONTENT' => $row->ID_CONTENT,
              'ID_TYPE' => $row->ID_TYPE,
              'ID_CATEGORY' => $row->ID_CATEGORY,
              'SUBJECT' => $row->SUBJECT,
              'CONTENT' => $row->CONTENT,
              'CONTENT_NUMMBER' => $row->CONTENT_NUMMBER,
              'TAGS' => $row->TAGS,
              'CREATED_BY' => $row->CREATED_BY,
              'CREATED_DATE' => $row->CREATED_DATE,
              'UPDATE_BY' => $row->UPDATE_BY,
              'LAST_UPDATE' => $row->LAST_UPDATE,
              'ICON_TYPE' => $row->ICON_TYPE,
              'IMG' => $row->IMG,
              'judul' => 'CONTENT',
              'subjudul' =>'Read',
              );
            $this->template->load('template','content_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content/create_action'),
            'ID_CONTENT' => set_value('ID_CONTENT'),
            'ID_TYPE' => set_value('ID_TYPE'),
            'ID_CATEGORY' => set_value('ID_CATEGORY'),
            'SUBJECT' => set_value('SUBJECT'),
            'CONTENT' => set_value('CONTENT'),
            'CONTENT_NUMMBER' => set_value('CONTENT_NUMMBER'),
            'TAGS' => set_value('TAGS'),
            'CREATED_BY' => set_value('CREATED_BY'),
            'CREATED_DATE' => set_value('CREATED_DATE'),
            'UPDATE_BY' => set_value('UPDATE_BY'),
            'LAST_UPDATE' => set_value('LAST_UPDATE'),
            'ICON_TYPE' => set_value('ICON_TYPE'),
            'IMG' => set_value('IMG'),
            'judul' => 'CONTENT',
            'subjudul' =>'Create',
            );
        $this->template->load('template','content_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
              'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
              'SUBJECT' => $this->input->post('SUBJECT',TRUE),
              'CONTENT' => $this->input->post('CONTENT',TRUE),
              'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
              'TAGS' => $this->input->post('TAGS',TRUE),
              'CREATED_BY' => $this->input->post('CREATED_BY',TRUE),
              'CREATED_DATE' => $this->input->post('CREATED_DATE',TRUE),
              'UPDATE_BY' => $this->input->post('UPDATE_BY',TRUE),
              'LAST_UPDATE' => $this->input->post('LAST_UPDATE',TRUE),
              'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE),
              'IMG' => $this->input->post('IMG',TRUE),
              );

            $this->Content_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content/update_action'),
                'ID_CONTENT' => set_value('ID_CONTENT', $row->ID_CONTENT),
                'ID_TYPE' => set_value('ID_TYPE', $row->ID_TYPE),
                'ID_CATEGORY' => set_value('ID_CATEGORY', $row->ID_CATEGORY),
                'SUBJECT' => set_value('SUBJECT', $row->SUBJECT),
                'CONTENT' => set_value('CONTENT', $row->CONTENT),
                'CONTENT_NUMMBER' => set_value('CONTENT_NUMMBER', $row->CONTENT_NUMMBER),
                'TAGS' => set_value('TAGS', $row->TAGS),
                'CREATED_BY' => set_value('CREATED_BY', $row->CREATED_BY),
                'CREATED_DATE' => set_value('CREATED_DATE', $row->CREATED_DATE),
                'UPDATE_BY' => set_value('UPDATE_BY', $row->UPDATE_BY),
                'LAST_UPDATE' => set_value('LAST_UPDATE', $row->LAST_UPDATE),
                'ICON_TYPE' => set_value('ICON_TYPE', $row->ICON_TYPE),
                'IMG' => set_value('IMG', $row->IMG),
                'judul' => 'CONTENT',
                'subjudul' =>'Update',
                );
            $this->template->load('template','content_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_CONTENT', TRUE));
        } else {
            $data = array(
              'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
              'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
              'SUBJECT' => $this->input->post('SUBJECT',TRUE),
              'CONTENT' => $this->input->post('CONTENT',TRUE),
              'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
              'TAGS' => $this->input->post('TAGS',TRUE),
              'CREATED_BY' => $this->input->post('CREATED_BY',TRUE),
              'CREATED_DATE' => $this->input->post('CREATED_DATE',TRUE),
              'UPDATE_BY' => $this->input->post('UPDATE_BY',TRUE),
              'LAST_UPDATE' => $this->input->post('LAST_UPDATE',TRUE),
              'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE),
              'IMG' => $this->input->post('IMG',TRUE),
              );

            $this->Content_model->update($this->input->post('ID_CONTENT', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $this->Content_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('content'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('ID_TYPE', 'id type', 'trim|required');
       $this->form_validation->set_rules('ID_CATEGORY', 'id category', 'trim|required');
       $this->form_validation->set_rules('SUBJECT', 'subject', 'trim|required');
       $this->form_validation->set_rules('CONTENT', 'content', 'trim|required');
       $this->form_validation->set_rules('CONTENT_NUMMBER', 'content nummber', 'trim|required|numeric');
       $this->form_validation->set_rules('TAGS', 'tags', 'trim|required');
       $this->form_validation->set_rules('CREATED_BY', 'created by', 'trim|required');
       $this->form_validation->set_rules('CREATED_DATE', 'created date', 'trim|required');
       $this->form_validation->set_rules('UPDATE_BY', 'update by', 'trim|required');
       $this->form_validation->set_rules('LAST_UPDATE', 'last update', 'trim|required');
       $this->form_validation->set_rules('ICON_TYPE', 'icon type', 'trim|required');
       $this->form_validation->set_rules('IMG', 'img', 'trim|required');

       $this->form_validation->set_rules('ID_CONTENT', 'ID_CONTENT', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   

}
