<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_type extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_type_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $content_type = $this->Content_type_model->get_all();

        $data = array(
            'content_type_data' => $content_type,
			'judul' => 'CONTENT_TYPE',
			'subjudul' =>'',
        );

        $this->template->load('template','content_type_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Content_type_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_type' => $row->id_type,
		'content_type' => $row->content_type,
		'created_date' => $row->created_date,
		'judul' => 'CONTENT_TYPE',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','content_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content_type/create_action'),
	    'id_type' => set_value('id_type'),
	    'content_type' => set_value('content_type'),
	    'created_date' => set_value('created_date'),
		'judul' => 'CONTENT_TYPE',
		'subjudul' =>'Create',
	);
        $this->template->load('template','content_type_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'content_type' => $this->input->post('content_type',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Content_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content_type/update_action'),
		'id_type' => set_value('id_type', $row->id_type),
		'content_type' => set_value('content_type', $row->content_type),
		'created_date' => set_value('created_date', $row->created_date),
		'judul' => 'CONTENT_TYPE',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','content_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_type', TRUE));
        } else {
            $data = array(
		'content_type' => $this->input->post('content_type',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Content_type_model->update($this->input->post('id_type', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_type_model->get_by_id($id);

        if ($row) {
            $this->Content_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('content_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('content_type', 'content type', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');

	$this->form_validation->set_rules('id_type', 'id_type', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "content_type.xls";
        $judul = "content_type";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Content Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

	foreach ($this->Content_type_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->content_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=content_type.doc");

        $data = array(
            'content_type_data' => $this->Content_type_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('content_type_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'content_type_data' => $this->Content_type_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('content_type_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('content_type.pdf', 'D'); 
    }

}

/* End of file Content_type.php */
/* Location: ./application/controllers/Content_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-25 16:46:37 */
/* http://harviacode.com */