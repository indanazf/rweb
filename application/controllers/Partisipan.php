<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Partisipan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect("auth/login");
        }
        $this->load->model('Partisipan_model');
        $this->load->model('Company_model');
        $this->load->model('Company_type_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $partisipan = $this->Partisipan_model->get_all();
        $company = $this->Company_model->get_all();
        //$company_type = $this->Company_type_model->get_all();

        $data = array(
            'partisipan_data' => $partisipan,
            'judul' => "Peserta",
            'subjudul' => "List peserta",
        );

        $this->template->load('template', 'partisipan_list', $data);
    }

    public function read($id) {
        $row = $this->Partisipan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_partisipan' => $row->id_partisipan,
                'nik' => $row->nik,
                'nama' => $row->nama,
                'company' => $row->company,
                'company_type' => $row->company_type,
                'is_deleted' => $row->is_deleted,
                'judul' => "Peserta",
                'subjudul' => "List peserta",
            );
            $this->template->load('template', 'partisipan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partisipan'));
        }
    }

    public function create() {
        $company = $this->Company_model->get_all();
        //$company_type = $this->Company_type_model->get_all();
        $data = array(
            'company' => $company,
            'button' => 'Create',
            'action' => site_url('partisipan/create_action'),
            'id_partisipan' => set_value('id_partisipan'),
            'nik' => set_value('nik'),
            'nama' => set_value('nama'),
            'is_deleted' => 0,
            'id_company' => set_value('id_company'),
            'judul' => "Peserta",
            'subjudul' => "Tambah peserta",
        );
        $this->template->load('template', 'partisipan_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nik' => $this->input->post('nik', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'id_company' => $this->input->post('id_company', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Partisipan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('partisipan'));
        }
    }

    public function update($id) {
        $row = $this->Partisipan_model->get_by_id($id);
        $company = $this->Company_model->get_all();
        //$company_type = $this->Company_type_model->get_all();

        if ($row) {
            $data = array(
                'company' => $company,
                'button' => 'Update',
                'action' => site_url('partisipan/update_action'),
                'id_partisipan' => set_value('id_partisipan', $row->id_partisipan),
                'nik' => set_value('nik', $row->nik),
                'nama' => set_value('nama', $row->nama),
                'id_company' => set_value('id_company', $row->id_company),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Peserta",
                'subjudul' => "Edit peserta",
            );
            $this->template->load('template', 'partisipan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partisipan'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_partisipan', TRUE));
        } else {
            $data = array(
                'nik' => $this->input->post('nik', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'id_company' => $this->input->post('id_company', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Partisipan_model->update($this->input->post('id_partisipan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('partisipan'));
        }
    }

    public function delete($id) {
        $row = $this->Partisipan_model->get_by_id($id);

        if ($row) {
            $this->Partisipan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('partisipan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partisipan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_partisipan', 'id_partisipan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "partisipan.xls";
        $judul = "partisipan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nik");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Company Type");
        xlsWriteLabel($tablehead, $kolomhead++, "Company");

        foreach ($this->Partisipan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nik);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->company_type);
            xlsWriteLabel($tablebody, $kolombody++, $data->company);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=partisipan.doc");

        $data = array(
            'partisipan_data' => $this->Partisipan_model->get_all(),
            'start' => 0
        );

        $this->load->view('partisipan_doc', $data);
    }

    function pdf() {
        $data = array(
            'partisipan_data' => $this->Partisipan_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('partisipan_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('partisipan.pdf', 'D');
    }

}

/* End of file Partisipan.php */
/* Location: ./application/controllers/Partisipan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-28 09:05:46 */
/* http://harviacode.com */