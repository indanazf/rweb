<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SCAdmin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Content_image_model');
        $this->load->model('Admin_model');
        $this->load->model('Content_model');
        $this->load->model('Content_category_model');
        $this->load->library('form_validation');
    }

    

    public function index()
    {
        redirect("scadmin/news");
    }

    public function read() 
    {
        $page = $this->input->get('p',TRUE);
        $id = $this->input->get('i',TRUE);
        $row = $this->Content_model->get_by_id($id);
        if ($row) {
            $data = array(
              'ID_CONTENT' => $row->ID_CONTENT,
              'ID_TYPE' => $row->ID_TYPE,
              'ID_CATEGORY' => $row->ID_CATEGORY,
              'SUBJECT' => $row->SUBJECT,
              'SUBTITLE' => $row->SUBTITLE,
              'CONTENT' => $row->CONTENT,
              'CONTENT_NUMMBER' => $row->CONTENT_NUMMBER,
              'TAGS' => $row->TAGS,
              'CREATED_BY' => $row->CREATED_BY,
              'CREATED_DATE' => $row->CREATED_DATE,
              'UPDATE_BY' => $row->UPDATE_BY,
              'LAST_UPDATE' => $row->LAST_UPDATE,
              'ICON_TYPE' => $row->ICON_TYPE,
              'IMG' => $row->IMG,
              'TYPE' => $row->TYPE,
              'CATEGORY' => $row->CATEGORY,
              'judul' => 'CONTENT',
              'subjudul' =>'Read',
              'page' => $page,
              );
            $this->template->load('template','scadmin/content_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url($page.'/admin'));
        }
    }

    public function create($page) 
    {
        $menu = str_replace('_', ' ', $page);
        $category = $this->Content_category_model->get_by_menu($menu);
        $data = array(
            'button' => 'Create',
            'action' => site_url('scadmin/create_action'),
            'ID_CONTENT' => set_value('ID_CONTENT'),
            'ID_TYPE' => set_value('ID_TYPE'),
            'ID_CATEGORY' => set_value('ID_CATEGORY'),
            'CATEGORY' => $category,
            'SUBJECT' => set_value('SUBJECT'),
            'SUBTITLE' => set_value('SUBTITLE'),
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
            'page' => $page,
            'type' => 'create',
            'subjudul' =>'Create',
            );
        $this->template->load('template2','scadmin/news_form', $data);
    }

    public function create_action() 
    {
        $page = $this->input->post('page',TRUE); 
        $dt = date("Y-m-d H:i:s");

        if(isset($_FILES['IMG']) && $_FILES['IMG']['error'] > 0){
            $data = array(
                'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
                'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
                'SUBJECT' => $this->input->post('SUBJECT',TRUE),
                'SUBTITLE' => $this->input->post('SUBTITLE',TRUE),
                'CONTENT' => $this->input->post('CONTENT',TRUE),
                'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
                'TAGS' => $this->input->post('TAGS',TRUE),
                'CREATED_BY' => $this->session->userdata['user_id'],
                'CREATED_DATE' => $dt,
                'UPDATE_BY' => $this->session->userdata['user_id'],
                'LAST_UPDATE' => $dt,
                'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE)
                );
            $this->Content_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('scadmin/'.$page));
                // redirect(site_url('content'));

        }else{
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('IMG')){
                $error = array('error' => $this->upload->display_errors());
                $this->create();
            }else{
                $data_img = array('upload_data' => $this->upload->data());
                $filename = $data_img['upload_data']['file_name'];

                $data = array(
                    'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
                    'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
                    'SUBJECT' => $this->input->post('SUBJECT',TRUE),
                    'SUBTITLE' => $this->input->post('SUBTITLE',TRUE),
                    'CONTENT' => $this->input->post('CONTENT',TRUE),
                    'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
                    'TAGS' => $this->input->post('TAGS',TRUE),
                    'CREATED_BY' => $this->session->userdata['user_id'],
                    'CREATED_DATE' => $dt,
                    'UPDATE_BY' => $this->session->userdata['user_id'],
                    'LAST_UPDATE' => $dt,
                    'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE),
                    'IMG' => $filename
                    );
                $this->Content_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('scadmin/'.$page));
            }
        }
            
    }

    public function update() 
    {
        $page = $this->input->get('p',TRUE);
        $id = $this->input->get('i',TRUE);
        $row = $this->Content_model->get_by_id($id);
        $menu = str_replace('_', ' ', $page);
        $category = $this->Content_category_model->get_by_menu($menu);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('scadmin/update_action'),
                'ID_CONTENT' =>set_value('TYPE', $row->ID_CONTENT),
                'CATEGORY' => $category,
                'TYPE' => set_value('TYPE', $row->TYPE),
                'ID_TYPE' => set_value('ID_TYPE', $row->ID_TYPE),
                'ID_CATEGORY' => set_value('ID_CATEGORY', $row->ID_CATEGORY),
                'SUBJECT' => set_value('SUBJECT', $row->SUBJECT),
                'SUBTITLE' => set_value('SUBTITLE', $row->SUBJECT),
                'CONTENT' => set_value('CONTENT', $row->CONTENT),
                'CONTENT_NUMMBER' => set_value('CONTENT_NUMMBER', $row->CONTENT_NUMMBER),
                'TAGS' => set_value('TAGS', $row->TAGS),
                'ICON_TYPE' => set_value('ICON_TYPE', $row->ICON_TYPE),
                'IMG' => set_value('IMG', $row->IMG),
                'page' => $page,
                'type' => 'update',
                'judul' => 'CONTENT',
                'subjudul' =>'Update',
                );
            if($page == "scadmin/news"){
                $this->template->load('template2','scadmin/news_form', $data);
            }
            $this->template->load('template2','scadmin/news_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url($page.'/admin'));
        }
    }

    public function update_action() 
    {
        $this->_rules();
        $dt = date("Y-m-d H:i:s");

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_CONTENT', TRUE));
        } else {
            $page = $this->input->post('page',TRUE); 
            if(isset($_FILES['IMG']) && $_FILES['IMG']['error'] > 0){
                $data = array(
                    'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
                    'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
                    'SUBJECT' => $this->input->post('SUBJECT',TRUE),
                    'SUBTITLE' => $this->input->post('SUBTITLE',TRUE),
                    'CONTENT' => $this->input->post('CONTENT',TRUE),
                    'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
                    'TAGS' => $this->input->post('TAGS',TRUE),
                    'UPDATE_BY' => $this->session->userdata['user_id'],
                    'LAST_UPDATE' => $dt,
                    'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE)
                    );

                $this->Content_model->update($this->input->post('ID_CONTENT', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('scadmin/'.$page));
            }else{
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('IMG')){
                    $error = array('error' => $this->upload->display_errors());
                    $this->update($this->input->post('ID_CONTENT', TRUE));
                }else{
                    $data_img = array('upload_data' => $this->upload->data());
                    $filename = $data_img['upload_data']['file_name'];

                    $data = array(
                        'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
                        'ID_CATEGORY' => $this->input->post('ID_CATEGORY',TRUE),
                        'SUBJECT' => $this->input->post('SUBJECT',TRUE),
                        'SUBTITLE' => $this->input->post('SUBTITLE',TRUE),
                        'CONTENT' => $this->input->post('CONTENT',TRUE),
                        'CONTENT_NUMMBER' => $this->input->post('CONTENT_NUMMBER',TRUE),
                        'TAGS' => $this->input->post('TAGS',TRUE),
                        'UPDATE_BY' => $this->session->userdata['user_id'],
                        'LAST_UPDATE' => $dt,
                        'ICON_TYPE' => $this->input->post('ICON_TYPE',TRUE),
                        'IMG' => $filename
                        );

                    $this->Content_model->update($this->input->post('ID_CONTENT', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('scadmin/'.$page));
                }
            }

        }
    }
    
    public function delete() 
    {

        $page = $this->input->get('p',TRUE);
        $id = $this->input->get('i',TRUE);
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $this->Content_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url("scadmin/".$page));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url("scadmin/".$page));
        }
    }

    public function _rules() 
    {
    // //$this->form_validation->set_rules('ID_TYPE', 'id type', 'trim|required');
    //  $this->form_validation->set_rules('ID_CATEGORY', 'id category', 'trim|required');
     $this->form_validation->set_rules('SUBJECT', 'subject', 'trim|required');
    //  $this->form_validation->set_rules('CONTENT', 'content', 'trim|required');
    // //$this->form_validation->set_rules('CONTENT_NUMMBER', 'content nummber', 'trim|required|numeric');
    // //$this->form_validation->set_rules('TAGS', 'tags', 'trim|required');
    // //$this->form_validation->set_rules('CREATED_BY', 'created by', 'trim|required');
    // //$this->form_validation->set_rules('CREATED_DATE', 'created date', 'trim|required');
    // //$this->form_validation->set_rules('UPDATE_BY', 'update by', 'trim|required');
    // //$this->form_validation->set_rules('LAST_UPDATE', 'last update', 'trim|required');
    // //$this->form_validation->set_rules('ICON_TYPE', 'icon type', 'trim|required');
    // //$this->form_validation->set_rules('IMG', 'img', 'trim|required');

    //  $this->form_validation->set_rules('ID_CONTENT', 'ID_CONTENT', 'trim');
       // $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

    public function news(){
        $content = $this->Admin_model->get_all("in_news","list");

        $data = array(
            'content_data' => $content,
            'judul' => 'News',
            'subjudul' =>'',
            'redirect' =>'news',
            );

        $this->template->load('template2','scadmin/news_list', $data);
    }

    public function press_release(){
        $content = $this->Admin_model->get_all("press_release","list");

        $data = array(
            'content_data' => $content,
            'judul' => 'Press Release',
            'subjudul' =>'',
            'redirect' =>'press_release',
            );

        $this->template->load('template2','scadmin/news_list', $data);
    }

    public function success_stories(){
        $content = $this->Admin_model->get_all("success stories");

        $data = array(
            'content_data' => $content,
            'judul' => 'Success Stories',
            'subjudul' =>'',
            'redirect' =>'success_stories',
            );

        $this->template->load('template2','scadmin/news_list', $data);
    }
}
