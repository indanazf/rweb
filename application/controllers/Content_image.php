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
		'NAME_CONTACT' => $row->NAME_CONTACT,
		'judul' => 'CONTENT_IMAGE',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','content_image_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_image'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content_image/create_action'),
	    'ID_IMAGE' => set_value('ID_IMAGE'),
	    'ID_CONTENT' => set_value('ID_CONTENT'),
	    'IMAGE' => set_value('IMAGE'),
	    'THUMBNAIL' => set_value('THUMBNAIL'),
	    'NAME_CONTACT' => set_value('NAME_CONTACT'),
		'judul' => 'CONTENT_IMAGE',
		'subjudul' =>'Create',
	);
        $this->template->load('template','content_image_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
		'IMAGE' => $this->input->post('IMAGE',TRUE),
		'THUMBNAIL' => $this->input->post('THUMBNAIL',TRUE),
		'NAME_CONTACT' => $this->input->post('NAME_CONTACT',TRUE),
	    );

            $this->Content_image_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content_image'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_image_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content_image/update_action'),
		'ID_IMAGE' => set_value('ID_IMAGE', $row->ID_IMAGE),
		'ID_CONTENT' => set_value('ID_CONTENT', $row->ID_CONTENT),
		'IMAGE' => set_value('IMAGE', $row->IMAGE),
		'THUMBNAIL' => set_value('THUMBNAIL', $row->THUMBNAIL),
		'NAME_CONTACT' => set_value('NAME_CONTACT', $row->NAME_CONTACT),
		'judul' => 'CONTENT_IMAGE',
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

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_IMAGE', TRUE));
        } else {
            $data = array(
		'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
		'IMAGE' => $this->input->post('IMAGE',TRUE),
		'THUMBNAIL' => $this->input->post('THUMBNAIL',TRUE),
		'NAME_CONTACT' => $this->input->post('NAME_CONTACT',TRUE),
	    );

            $this->Content_image_model->update($this->input->post('ID_IMAGE', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content_image'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_image_model->get_by_id($id);

        if ($row) {
            $this->Content_image_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('content_image'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_image'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_CONTENT', 'id content', 'trim|required');
	$this->form_validation->set_rules('IMAGE', 'image', 'trim|required');
	$this->form_validation->set_rules('THUMBNAIL', 'thumbnail', 'trim|required');
	$this->form_validation->set_rules('NAME_CONTACT', 'name contact', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "NAME CONTACT");

	foreach ($this->Content_image_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_CONTENT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IMAGE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->THUMBNAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAME_CONTACT);

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
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:15:25 */
/* http://harviacode.com */