<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_doc extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect("auth/login");
        }
        $this->load->model('Jenis_doc_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $jenis_doc = $this->Jenis_doc_model->get_all();

        $data = array(
            'jenis_doc_data' => $jenis_doc,
            'judul' => "Jenis Dokumen",
            'subjudul' => "List jenis dokumen",
        );

        $this->template->load('template', 'jenis_doc_list', $data);
    }

    public function read($id) {
        $row = $this->Jenis_doc_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jenis_doc' => $row->id_jenis_doc,
                'jenis_doc' => $row->jenis_doc,
                'is_deleted' => $row->is_deleted,
                'judul' => "Jenis Dokumen",
                'subjudul' => "Detail jenis dokumen",
            );
            $this->template->load('template', 'jenis_doc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_doc'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_doc/create_action'),
            'id_jenis_doc' => set_value('id_jenis_doc'),
            'jenis_doc' => set_value('jenis_doc'),
            'is_deleted' => 0,
            'judul' => "Jenis Dokumen",
            'subjudul' => "Tambah jenis dokumen",
        );
        $this->template->load('template', 'jenis_doc_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'jenis_doc' => $this->input->post('jenis_doc', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Jenis_doc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_doc'));
        }
    }

    public function update($id) {
        $row = $this->Jenis_doc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_doc/update_action'),
                'id_jenis_doc' => set_value('id_jenis_doc', $row->id_jenis_doc),
                'jenis_doc' => set_value('jenis_doc', $row->jenis_doc),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Jenis Dokumen",
                'subjudul' => "Edit jenis dokumen",
            );
            $this->template->load('template', 'jenis_doc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_doc'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_doc', TRUE));
        } else {
            $data = array(
                'jenis_doc' => $this->input->post('jenis_doc', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Jenis_doc_model->update($this->input->post('id_jenis_doc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_doc'));
        }
    }

    public function delete($id) {
        $row = $this->Jenis_doc_model->get_by_id($id);

        if ($row) {
            $this->Jenis_doc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_doc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_doc'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('jenis_doc', 'jenis doc', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_jenis_doc', 'id_jenis_doc', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_doc.xls";
        $judul = "jenis_doc";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Doc");

        foreach ($this->Jenis_doc_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->jenis_doc);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_doc.doc");

        $data = array(
            'jenis_doc_data' => $this->Jenis_doc_model->get_all(),
            'start' => 0
        );

        $this->load->view('jenis_doc_doc', $data);
    }

    function pdf() {
        $data = array(
            'jenis_doc_data' => $this->Jenis_doc_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('jenis_doc_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('jenis_doc.pdf', 'D');
    }

}

/* End of file Jenis_doc.php */
/* Location: ./application/controllers/Jenis_doc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-28 09:05:37 */
/* http://harviacode.com */