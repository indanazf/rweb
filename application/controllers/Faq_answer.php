<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq_answer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_answer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faq_answer = $this->Faq_answer_model->get_all();

        $data = array(
            'faq_answer_data' => $faq_answer,
			'judul' => 'FAQ_ANSWER',
			'subjudul' =>'',
        );

        $this->template->load('template','faq_answer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Faq_answer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_ANSWER' => $row->ID_ANSWER,
		'ANSWER' => $row->ANSWER,
		'judul' => 'FAQ_ANSWER',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','faq_answer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_answer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faq_answer/create_action'),
	    'ID_ANSWER' => set_value('ID_ANSWER'),
	    'ANSWER' => set_value('ANSWER'),
		'judul' => 'FAQ_ANSWER',
		'subjudul' =>'Create',
	);
        $this->template->load('template','faq_answer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ANSWER' => $this->input->post('ANSWER',TRUE),
	    );

            $this->Faq_answer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faq_answer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faq_answer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faq_answer/update_action'),
		'ID_ANSWER' => set_value('ID_ANSWER', $row->ID_ANSWER),
		'ANSWER' => set_value('ANSWER', $row->ANSWER),
		'judul' => 'FAQ_ANSWER',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','faq_answer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_answer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_ANSWER', TRUE));
        } else {
            $data = array(
		'ANSWER' => $this->input->post('ANSWER',TRUE),
	    );

            $this->Faq_answer_model->update($this->input->post('ID_ANSWER', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faq_answer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faq_answer_model->get_by_id($id);

        if ($row) {
            $this->Faq_answer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faq_answer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_answer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ANSWER', 'answer', 'trim|required');

	$this->form_validation->set_rules('ID_ANSWER', 'ID_ANSWER', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "faq_answer.xls";
        $judul = "faq_answer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ANSWER");

	foreach ($this->Faq_answer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ANSWER);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=faq_answer.doc");

        $data = array(
            'faq_answer_data' => $this->Faq_answer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('faq_answer_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'faq_answer_data' => $this->Faq_answer_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('faq_answer_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('faq_answer.pdf', 'D'); 
    }

}

/* End of file Faq_answer.php */
/* Location: ./application/controllers/Faq_answer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:16:01 */
/* http://harviacode.com */