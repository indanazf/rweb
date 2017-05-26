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
		'id_content' => $row->id_content,
		'id_type' => $row->id_type,
		'id_category' => $row->id_category,
		'subject' => $row->subject,
		'content' => $row->content,
		'tags' => $row->tags,
		'created_date' => $row->created_date,
		'created_by' => $row->created_by,
		'last_update' => $row->last_update,
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
	    'id_content' => set_value('id_content'),
	    'id_type' => set_value('id_type'),
	    'id_category' => set_value('id_category'),
	    'subject' => set_value('subject'),
	    'content' => set_value('content'),
	    'tags' => set_value('tags'),
	    'created_date' => set_value('created_date'),
	    'created_by' => set_value('created_by'),
	    'last_update' => set_value('last_update'),
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
		'id_type' => $this->input->post('id_type',TRUE),
		'id_category' => $this->input->post('id_category',TRUE),
		'subject' => $this->input->post('subject',TRUE),
		'content' => $this->input->post('content',TRUE),
		'tags' => $this->input->post('tags',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'last_update' => $this->input->post('last_update',TRUE),
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
		'id_content' => set_value('id_content', $row->id_content),
		'id_type' => set_value('id_type', $row->id_type),
		'id_category' => set_value('id_category', $row->id_category),
		'subject' => set_value('subject', $row->subject),
		'content' => set_value('content', $row->content),
		'tags' => set_value('tags', $row->tags),
		'created_date' => set_value('created_date', $row->created_date),
		'created_by' => set_value('created_by', $row->created_by),
		'last_update' => set_value('last_update', $row->last_update),
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
            $this->update($this->input->post('id_content', TRUE));
        } else {
            $data = array(
		'id_type' => $this->input->post('id_type',TRUE),
		'id_category' => $this->input->post('id_category',TRUE),
		'subject' => $this->input->post('subject',TRUE),
		'content' => $this->input->post('content',TRUE),
		'tags' => $this->input->post('tags',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'last_update' => $this->input->post('last_update',TRUE),
	    );

            $this->Content_model->update($this->input->post('id_content', TRUE), $data);
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
	$this->form_validation->set_rules('id_type', 'id type', 'trim|required');
	$this->form_validation->set_rules('id_category', 'id category', 'trim|required');
	$this->form_validation->set_rules('subject', 'subject', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('tags', 'tags', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('last_update', 'last update', 'trim|required');

	$this->form_validation->set_rules('id_content', 'id_content', 'trim');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Category");
	xlsWriteLabel($tablehead, $kolomhead++, "Subject");
	xlsWriteLabel($tablehead, $kolomhead++, "Content");
	xlsWriteLabel($tablehead, $kolomhead++, "Tags");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Update");

	foreach ($this->Content_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_category);
	    xlsWriteLabel($tablebody, $kolombody++, $data->subject);
	    xlsWriteLabel($tablebody, $kolombody++, $data->content);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tags);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_update);

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
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-25 16:46:21 */
/* http://harviacode.com */