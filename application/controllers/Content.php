<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $content = $this->Content_model->get_all();

        $data = array(
            'content_data' => $content,
			'judul' => 'CONTENT',
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

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "content.xls";
        $judul = "content";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ID TYPE");
	xlsWriteLabel($tablehead, $kolomhead++, "ID CATEGORY");
	xlsWriteLabel($tablehead, $kolomhead++, "SUBJECT");
	xlsWriteLabel($tablehead, $kolomhead++, "CONTENT");
	xlsWriteLabel($tablehead, $kolomhead++, "CONTENT NUMMBER");
	xlsWriteLabel($tablehead, $kolomhead++, "TAGS");
	xlsWriteLabel($tablehead, $kolomhead++, "CREATED BY");
	xlsWriteLabel($tablehead, $kolomhead++, "CREATED DATE");
	xlsWriteLabel($tablehead, $kolomhead++, "UPDATE BY");
	xlsWriteLabel($tablehead, $kolomhead++, "LAST UPDATE");
	xlsWriteLabel($tablehead, $kolomhead++, "ICON TYPE");
	xlsWriteLabel($tablehead, $kolomhead++, "IMG");

	foreach ($this->Content_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_TYPE);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_CATEGORY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SUBJECT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CONTENT);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CONTENT_NUMMBER);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TAGS);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CREATED_BY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CREATED_DATE);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UPDATE_BY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LAST_UPDATE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ICON_TYPE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IMG);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=content.doc");

        $data = array(
            'content_data' => $this->Content_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('content_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'content_data' => $this->Content_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('content_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('content.pdf', 'D'); 
    }

}

/* End of file Content.php */
/* Location: ./application/controllers/Content.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:15:09 */
/* http://harviacode.com */