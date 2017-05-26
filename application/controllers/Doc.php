<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doc extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect("auth/login");
        }
        $this->load->model('Doc_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Jenis_doc_model');
        $this->load->model('Company_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $doc = $this->Doc_model->get_all();
        $jenis = $this->Jenis_doc_model->get_all();
        $company = $this->Company_model->get_all();

        if ($this->input->post('search', TRUE)) {
            $doc = $this->Doc_model->get_search($this->input->post('nik', TRUE), $this->input->post('nama', TRUE), $this->input->post('id_company', TRUE), $this->input->post('id_jenis_doc', TRUE));
        }
        $data = array(
            'doc_data' => $doc,
            'id_partisipan' => null,
            'jenis' => $jenis,
            'company' => $company,
            'judul' => "Dokumen",
            'subjudul' => "List dokumen",
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'id_company_type' => $this->input->post('id_company_type', TRUE),
            'id_company' => $this->input->post('id_company', TRUE),
            'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
        );

        $this->template->load('template', 'doc_list', $data);
    }

    public function read($id) {
        $row = $this->Doc_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_doc' => $row->id_doc,
                'id_jenis_doc' => $row->id_jenis_doc,
                'jenis_doc' => $row->jenis_doc,
                'id_partisipan' => $row->id_partisipan,
                'nama' => $row->nama,
                'path' => $row->path,
                'date' => $row->date,
                'created_date' => $row->created_date,
                'is_deleted' => $row->is_deleted,
                'judul' => "Dokumen",
                'subjudul' => "Detail dokumen",
            );
            $this->template->load('template', 'doc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('doc'));
        }
    }

    public function partisipan($id) {
        $doc = $this->Doc_model->get_all($id);
        $jenis = $this->Jenis_doc_model->get_all();
        $company = $this->Company_model->get_all();

        if ($this->input->post('search', TRUE)) {
            $doc = $this->Doc_model->get_search($this->input->post('nik', TRUE), $this->input->post('nama', TRUE), $this->input->post('id_company', TRUE), $this->input->post('id_jenis_doc', TRUE));
        }
        $data = array(
            'doc_data' => $doc,
            'id_partisipan' => $id,
            'jenis' => $jenis,
            'company' => $company,
            'judul' => "Dokumen",
            'subjudul' => "List dokumen",
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'id_company_type' => $this->input->post('id_company_type', TRUE),
            'id_company' => $this->input->post('id_company', TRUE),
            'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
        );

        $this->template->load('template', 'doc_list', $data);
    }

    public function jenis_doc($id) {
        $doc = $this->Doc_model->get_all_by_jenis($id);
        $jenis = $this->Jenis_doc_model->get_all();
        $company = $this->Company_model->get_all();

        if ($this->input->post('search', TRUE)) {
            $doc = $this->Doc_model->get_search($this->input->post('nik', TRUE), $this->input->post('nama', TRUE), $this->input->post('id_company', TRUE), $this->input->post('id_jenis_doc', TRUE));
        }
        $data = array(
            'doc_data' => $doc,
            'id_partisipan' => null,
            'jenis' => $jenis,
            'company' => $company,
            'judul' => "Dokumen",
            'subjudul' => "List dokumen",
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'id_company_type' => $this->input->post('id_company_type', TRUE),
            'id_company' => $this->input->post('id_company', TRUE),
            'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
        );

        $this->template->load('template', 'doc_list', $data);
    }

    public function company($id) {
        $doc = $this->Doc_model->get_all_by_company($id);
        $jenis = $this->Jenis_doc_model->get_all();
        $company = $this->Company_model->get_all();

        if ($this->input->post('search', TRUE)) {
            $doc = $this->Doc_model->get_search($this->input->post('nik', TRUE), $this->input->post('nama', TRUE), $this->input->post('id_company', TRUE), $this->input->post('id_jenis_doc', TRUE));
        }
        $data = array(
            'doc_data' => $doc,
            'id_partisipan' => null,
            'jenis' => $jenis,
            'company' => $company,
            'judul' => "Dokumen",
            'subjudul' => "List dokumen",
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'id_company_type' => $this->input->post('id_company_type', TRUE),
            'id_company' => $this->input->post('id_company', TRUE),
            'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
        );

        $this->template->load('template', 'doc_list', $data);
    }

    public function company_type($id) {
        $doc = $this->Doc_model->get_all_by_company_type($id);
        $jenis = $this->Jenis_doc_model->get_all();
        $company = $this->Company_model->get_all();

        if ($this->input->post('search', TRUE)) {
            $doc = $this->Doc_model->get_search($this->input->post('nik', TRUE), $this->input->post('nama', TRUE), $this->input->post('id_company', TRUE), $this->input->post('id_jenis_doc', TRUE));
        }
        $data = array(
            'doc_data' => $doc,
            'id_partisipan' => null,
            'jenis' => $jenis,
            'company' => $company,
            'judul' => "Dokumen",
            'subjudul' => "List dokumen",
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'id_company_type' => $this->input->post('id_company_type', TRUE),
            'id_company' => $this->input->post('id_company', TRUE),
            'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
        );

        $this->template->load('template', 'doc_list', $data);
    }

    public function create($id = null) {
        $jenis = $this->Jenis_doc_model->get_all();
        $data = array(
            'jenis' => $jenis,
            'button' => 'Create',
            'action' => site_url('doc/create_action'),
            'id_doc' => set_value('id_doc'),
            'id_jenis_doc' => set_value('id_jenis_doc'),
            'id_partisipan' => $id,
            'path' => set_value('path'),
            'date' => set_value('date'),
            'created_date' => set_value('created_date'),
            'is_deleted' => 0,
            'judul' => "Dokumen",
            'subjudul' => "Tambah dokumen",
        );
        $this->template->load('template', 'doc_form', $data);
    }

    public function create_action() {

        $config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|pdf|csv|txt';
        $config['upload_path'] = 'uploads/doc/';
        $config['max_size'] = 100000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('path')) {
            $error = array('error' => $this->upload->display_errors());
            redirect(site_url('doc'));
        } else {
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date("Y-m-d H:i:s");
            $data = array(
                'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
                'id_partisipan' => $this->input->post('id_partisipan', TRUE),
                'path' => $file_name,
                'date' => $this->input->post('date', TRUE),
                'created_date' => $tanggal,
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );
            $this->Doc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('doc'));
        }
        $this->Doc_model->insert($data);
        $this->session->
                set_flashdata('message', 'Create Record Success');
        redirect(site_url('doc'));
    }

    public function update($id) {
        $row = $this->Doc_model->get_by_id($id);
        $jenis = $this->Jenis_doc_model->get_all();

        if ($row) {
            $data = array(
                'jenis' => $jenis,
                'button' => 'Update',
                'action' => site_url('doc/update_action'),
                'id_doc' => set_value('id_doc', $row->id_doc),
                'id_jenis_doc' => set_value('id_jenis_doc', $row->id_jenis_doc),
                'id_partisipan' => set_value('id_partisipan', $row->id_partisipan),
                'path' => set_value('path', $row->path),
                'date' => set_value('date', $row->date),
                'created_date' => set_value('created_date', $row->created_date),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Dokumen",
                'subjudul' => "Edit dokumen",
            );
            $this->template->load('template', 'doc_form', $data);
        } else {
            $this->session->set_flashdata(
                    'message', 'Record Not Found');
            redirect(site_url('doc'));
        }
    }

    public function update_action() {
        $this->_rules();

        $config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|pdf|csv|txt';
        $config['upload_path'] = 'uploads/doc/';
        $config['max_size'] = 100000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d H:i:s");
        if (!$this->upload->do_upload('path')) {
            $error = array('error' => $this->upload->display_errors());

            $data = array(
                'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
                'id_partisipan' => $this->input->post('id_partisipan', TRUE),
                'date' => $this->input->post('date', TRUE),
                'created_date' => $tanggal,
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );
            $this->Doc_model->update($this->input->post('id_doc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');

            redirect(site_url('doc'));
        } else {
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            $data = array(
                'id_jenis_doc' => $this->input->post('id_jenis_doc', TRUE),
                'id_partisipan' => $this->input->post('id_partisipan', TRUE),
                'path' => $file_name,
                'date' => $this->input->post('date', TRUE),
                'created_date' => $tanggal,
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );
            $this->Doc_model->update($this->input->post('id_doc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('doc'));
        }
    }

    public function delete($id) {
        $row = $this->Doc_model->get_by_id($id);

        if ($row) {
            $this->Doc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('doc'));
        } else {
            $this->session->set_flashdata(
                    'message', 'Record Not Found');
            redirect(site_url('doc'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_jenis_doc', 'id jenis doc', 'trim|required');
        $this->form_validation->set_rules('id_partisipan', 'id partisipan', 'trim|required');
        //$this->form_validation->set_rules('path', 'path', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_doc', 'id_doc', 'trim');
        $this->
        form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "doc.xls";
        $judul = "doc";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Company Type");
        xlsWriteLabel($tablehead, $kolomhead++, "Company");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Dokumen");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama File");
        xlsWriteLabel($tablehead, $kolomhead++, "Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

        foreach ($this->Doc_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->company_type);
            xlsWriteLabel($tablebody, $kolombody++, $data->company);
            xlsWriteLabel($tablebody, $kolombody++, $data->jenis_doc);
            xlsWriteLabel($tablebody, $kolombody++, $data->path);
            xlsWriteLabel($tablebody, $kolombody++, $data->date);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=doc.doc");

        $data = array(
            'doc_data' => $this->Doc_model->get_all(),
            'start' => 0
        );

        $this->load->view('doc_doc', $data);
    }

    function pdf() {
        $data = array(
            'doc_data' => $this->Doc_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('doc_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('doc.pdf', 'D');
    }

    function download($filename = null) {
        $this->load->helper('download');
        $data = file_get_contents(base_url('/uploads/doc/' . $filename));
        force_download($filename, $data);
    }

}

/* End of file Doc.php */
/* Location: ./application/controllers/Doc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-28 09:05:17 */
/* http://harviacode.com */