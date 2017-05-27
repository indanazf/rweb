<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq_question extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Faq_question_model');
        $this->load->model('Faq_answer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faq_question = $this->Faq_question_model->get_all();

        $data = array(
            'faq_question_data' => $faq_question,
            'judul' => 'FAQ_QUESTION',
            'subjudul' =>'',
            );

        $this->template->load('template','faq_question_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Faq_question_model->get_by_id($id);
        if ($row) {
            $data = array(
              'ID_QUESTION' => $row->ID_QUESTION,
              'ANSWER' => $row->ANSWER,
              'QUESTION' => $row->QUESTION,
              'judul' => 'FAQ_QUESTION',
              'subjudul' =>'Read',
              );
            $this->template->load('template','faq_question_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_question'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faq_question/create_action'),
            'ID_QUESTION' => set_value('ID_QUESTION'),
            'ID_ANSWER' => set_value('ID_ANSWER'),
            'ANSWER' => set_value('ANSWER'),
            'QUESTION' => set_value('QUESTION'),
            'judul' => 'FAQ_QUESTION',
            'subjudul' =>'Create',
            );
        $this->template->load('template','faq_question_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data1 = array(
                'ANSWER' => $this->input->post('ANSWER',TRUE),
            );

            $last_id_answer=$this->Faq_answer_model->insert($data1);

            $data = array(
              'ID_ANSWER' => $last_id_answer,
              'QUESTION' => $this->input->post('QUESTION',TRUE),
            );

            $this->Faq_question_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faq_question'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faq_question_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faq_question/update_action'),
                'ID_QUESTION' => set_value('ID_QUESTION', $row->ID_QUESTION),
                'ID_ANSWER' => set_value('ID_ANSWER', $row->ID_ANSWER),
                'ANSWER' => set_value('ANSWER', $row->ANSWER),
                'QUESTION' => set_value('QUESTION', $row->QUESTION),
                'judul' => 'FAQ_QUESTION',
                'subjudul' =>'Update',
                );
            $this->template->load('template','faq_question_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_question'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_QUESTION', TRUE));
        } else {
            $data = array(
              'ANSWER' => $this->input->post('ANSWER',TRUE),
              );
            $this->Faq_answer_model->update($this->input->post('ID_ANSWER', TRUE), $data);

            $data = array(
              'ID_ANSWER' => $this->input->post('ID_ANSWER',TRUE),
              'QUESTION' => $this->input->post('QUESTION',TRUE),
              );

            $this->Faq_question_model->update($this->input->post('ID_QUESTION', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faq_question'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faq_question_model->get_by_id($id);

        if ($row) {
            $this->Faq_question_model->delete($id);
            $this->Faq_answer_model->delete($row->ID_ANSWER);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faq_question'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq_question'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('ANSWER', 'xanswer', 'trim|required');
       $this->form_validation->set_rules('QUESTION', 'question', 'trim|required');

       $this->form_validation->set_rules('ID_QUESTION', 'ID_QUESTION', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "faq_question.xls";
    $judul = "faq_question";
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
    xlsWriteLabel($tablehead, $kolomhead++, "ID ANSWER");
    xlsWriteLabel($tablehead, $kolomhead++, "QUESTION");

    foreach ($this->Faq_question_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->ID_ANSWER);
        xlsWriteLabel($tablebody, $kolombody++, $data->QUESTION);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=faq_question.doc");

    $data = array(
        'faq_question_data' => $this->Faq_question_model->get_all(),
        'start' => 0
        );

    $this->load->view('faq_question_doc',$data);
}

function pdf()
{
    $data = array(
        'faq_question_data' => $this->Faq_question_model->get_all(),
        'start' => 0
        );

    ini_set('memory_limit', '32M');
    $html = $this->load->view('faq_question_pdf', $data, true);
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    $pdf->WriteHTML($html);
    $pdf->Output('faq_question.pdf', 'D'); 
}

}

/* End of file Faq_question.php */
/* Location: ./application/controllers/Faq_question.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:16:08 */
/* http://harviacode.com */