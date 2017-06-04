<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_image extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_image_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $content_image = $this->Content_image_model->get_all();

        $data = array(
            'content_image_data' => $content_image,
            'judul' => 'CONTENT_IMAGE',
            'subjudul' =>'',
            );

        $this->template->load('template','content_image_list', $data);
    }

    

    public function read($id) 
    {
        $row = $this->Content_image_model->get_by_id($id);
        if ($row) {
            $data = array(
              'ID_IMAGE' => $row->ID_IMAGE,
              'ID_CONTENT' => $row->ID_CONTENT,
              'IMAGE' => $row->IMAGE,
              'THUMBNAIL' => $row->THUMBNAIL,
              'NAME_IMAGE' => $row->NAME_IMAGE,
              'INFO' => $row->INFO,
              'judul' => 'CONTENT_IMAGE',
              'subjudul' =>'Read',
              );
            $this->template->load('template','content_image_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url());
        }
    }

    public function create() 
    {
        $page = $this->input->get('p',TRUE);
        $id = $this->input->get('i',TRUE);
        $data = array(
            'button' => 'Create',
            'action' => site_url('content_image/create_action'),
            'ID_IMAGE' => set_value('ID_IMAGE'),
            'ID_CONTENT' => $id,
            'PAGE' => $page,
            'IMAGE' => set_value('IMAGE'),
            'THUMBNAIL' => set_value('THUMBNAIL'),
            'NAME_IMAGE' => set_value('NAME_IMAGE'),
            'INFO' => set_value('INFO'),
            'judul' => 'CONTENT_IMAGE',
            'subjudul' =>'Create',
            );
        $this->template->load('template','content_image_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $page =  $this->input->post('PAGE',TRUE);

        if ($this->form_validation->run() == FALSE) {
            if($page == "our_works"){
                redirect(site_url('our_works/images'));
            }else if($page == "our_team"){
                redirect(site_url('about_us/images'));
            }
        } else {
            if(isset($_FILES['IMG']) && $_FILES['IMG']['error'] > 0){
                $data = array(
                    'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
                    'NAME_IMAGE' => $this->input->post('NAME_IMAGE',TRUE),
                    'INFO' => $this->input->post('INFO',TRUE),
                    );
                $this->Content_image_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                if($page == "our_works"){
                    redirect(site_url('our_works/images'));
                }else if($page == "our_team"){
                    redirect(site_url('about_us/images'));
                }
            }else{
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('IMAGE')){
                    $error = array('error' => $this->upload->display_errors());
                    echo $error;
                    $this->create();
                }else{
                    $data_img = array('upload_data' => $this->upload->data());
                    $filename = $data_img['upload_data']['file_name'];
                    $this->gallery_path = realpath(APPPATH . '../uploads');//fetching path


                    $config1 = array(
                      'source_image' => $data_img['upload_data']['full_path'], //get original image
                      'new_image' => $this->gallery_path.'/thumbs', //save as new image //need to create thumbs first
                      'maintain_ratio' => true,
                      'width' => 150,
                      'height' => 100

                      );
                    $this->load->library('image_lib', $config1); //load library
                    $thumb = $this->image_lib->resize(); //generating thumb

                    $data = array(
                        'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
                        'NAME_IMAGE' => $this->input->post('NAME_IMAGE',TRUE),
                        'INFO' => $this->input->post('INFO',TRUE),
                        'IMAGE' => $filename,
                        'THUMBNAIL' => $filename
                        );

                    $this->Content_image_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    if($page == "our_works"){
                        redirect(site_url('our_works/images'));
                    }else if($page == "our_team"){
                        redirect(site_url('about_us/images'));
                    }
                }
            }
            
        }
    }
    
    public function update() 
    {
        $page = $this->input->get('p',TRUE);
        $id = $this->input->get('i',TRUE);
        $row = $this->Content_image_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content_image/update_action'),
                'ID_IMAGE' => set_value('ID_IMAGE', $row->ID_IMAGE),
                'ID_CONTENT' => set_value('ID_CONTENT', $row->ID_CONTENT),
                'IMAGE' => set_value('IMAGE', $row->IMAGE),
                'THUMBNAIL' => set_value('THUMBNAIL', $row->THUMBNAIL),
                'NAME_IMAGE' => set_value('NAME_IMAGE', $row->NAME_IMAGE),
                'INFO' => set_value('INFO', $row->INFO),
                'judul' => 'CONTENT_IMAGE',
                'PAGE' => $page,
                'subjudul' =>'Update',
                );
            $this->template->load('template','content_image_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_image'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $page =  $this->input->post('PAGE',TRUE);

        if ($this->form_validation->run() == FALSE) {
            if($page == "our_works"){
                redirect(site_url('our_works/images'));
            }else if($page == "our_team"){
                redirect(site_url('about_us/images'));
            }
        } else {
            if(isset($_FILES['IMG']) && $_FILES['IMG']['error'] > 0){
                $data = array(
                    'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
                    'NAME_IMAGE' => $this->input->post('NAME_IMAGE',TRUE),
                    'INFO' => $this->input->post('INFO',TRUE),
                    );
                $this->Content_image_model->update($this->input->post('ID_IMAGE', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                if($page == "our_works"){
                    redirect(site_url('our_works/images'));
                }else if($page == "our_team"){
                    redirect(site_url('about_us/images'));
                }
            }else{
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('IMAGE')){
                    $data = array(
                        'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
                        'NAME_IMAGE' => $this->input->post('NAME_IMAGE',TRUE),
                        'INFO' => $this->input->post('INFO',TRUE),
                        );

                    $this->Content_image_model->update($this->input->post('ID_IMAGE', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    $page =  $this->input->post('PAGE',TRUE);
                    if($page == "our_works"){
                        redirect(site_url('our_works/images'));
                    }else if($page == "our_team"){
                        redirect(site_url('about_us/images'));
                    }
                }else{
                    $data_img = array('upload_data' => $this->upload->data());
                    $filename = $data_img['upload_data']['file_name'];
                    $this->gallery_path = realpath(APPPATH . '../uploads');//fetching path


                    $config1 = array(
                      'source_image' => $data_img['upload_data']['full_path'], //get original image
                      'new_image' => $this->gallery_path.'/thumbs', //save as new image //need to create thumbs first
                      'maintain_ratio' => true,
                      'width' => 150,
                      'height' => 100

                      );
                    $this->load->library('image_lib', $config1); //load library
                    $thumb = $this->image_lib->resize(); //generating thumb

                    $data = array(
                        'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
                        'NAME_IMAGE' => $this->input->post('NAME_IMAGE',TRUE),
                        'INFO' => $this->input->post('INFO',TRUE),
                        'IMAGE' => $filename,
                        'THUMBNAIL' => $filename
                        );

                    $this->Content_image_model->update($this->input->post('ID_IMAGE', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    if($page == "our_works"){
                        redirect(site_url('our_works/images'));
                    }else if($page == "our_team"){
                        redirect(site_url('about_us/images'));
                    }
                }
            }
        }
    }
    
    public function delete() 
    {
        $page =  $this->input->get('p',TRUE);
        $id =  $this->input->get('i',TRUE);
        $row = $this->Content_image_model->get_by_id($id);

        if ($row) {
            $this->Content_image_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            if($page == "our_works"){
                    redirect(site_url('our_works/images'));
                }else if($page == "our_team"){
                    redirect(site_url('about_us/images'));
                }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            if($page == "our_works"){
                    redirect(site_url('our_works/images'));
                }else if($page == "our_team"){
                    redirect(site_url('about_us/images'));
                }
        }
    }

    public function _rules() 
    {
     $this->form_validation->set_rules('ID_CONTENT', 'id content', 'trim|required');
	//$this->form_validation->set_rules('IMAGE', 'image', 'trim|required');
	//$this->form_validation->set_rules('THUMBNAIL', 'thumbnail', 'trim|required');
	//$this->form_validation->set_rules('NAME_IMAGE', 'name image', 'trim|required');
	//$this->form_validation->set_rules('INFO', 'info', 'trim|required');

     $this->form_validation->set_rules('ID_IMAGE', 'ID_IMAGE', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

 public function excel()
 {
    $this->load->helper('exportexcel');
    $namaFile = "content_image.xls";
    $judul = "content_image";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
        //penulisan header
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    xlsBOF();

    $kolomhead = 0;
    xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "ID CONTENT");
    xlsWriteLabel($tablehead, $kolomhead++, "IMAGE");
    xlsWriteLabel($tablehead, $kolomhead++, "THUMBNAIL");
    xlsWriteLabel($tablehead, $kolomhead++, "NAME IMAGE");
    xlsWriteLabel($tablehead, $kolomhead++, "INFO");

    foreach ($this->Content_image_model->get_all() as $data) {
        $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->ID_CONTENT);
        xlsWriteLabel($tablebody, $kolombody++, $data->IMAGE);
        xlsWriteLabel($tablebody, $kolombody++, $data->THUMBNAIL);
        xlsWriteLabel($tablebody, $kolombody++, $data->NAME_IMAGE);
        xlsWriteLabel($tablebody, $kolombody++, $data->INFO);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=content_image.doc");

    $data = array(
        'content_image_data' => $this->Content_image_model->get_all(),
        'start' => 0
        );

    $this->load->view('content_image_doc',$data);
}

function pdf()
{
    $data = array(
        'content_image_data' => $this->Content_image_model->get_all(),
        'start' => 0
        );

    ini_set('memory_limit', '32M');
    $html = $this->load->view('content_image_pdf', $data, true);
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    $pdf->WriteHTML($html);
    $pdf->Output('content_image.pdf', 'D'); 
}

}

/* End of file Content_image.php */
/* Location: ./application/controllers/Content_image.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-28 12:32:02 */
/* http://harviacode.com */