<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_type extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect("auth/login");
        }
        $this->load->model('Company_type_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $company_type = $this->Company_type_model->get_all();

        $data = array(
            'company_type_data' => $company_type,
            'judul' => "Company Type",
            'subjudul' => "List company type",
        );

        $this->template->load('template', 'company_type_list', $data);
    }

    public function read($id) {
        $row = $this->Company_type_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_company_type' => $row->id_company_type,
                'company_type' => $row->company_type,
                'is_deleted' => $row->is_deleted,
                'judul' => "Company Type",
                'subjudul' => "Detail company type",
            );
            $this->template->load('template', 'company_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('company_type/create_action'),
            'id_company_type' => set_value('id_company_type'),
            'company_type' => set_value('company_type'),
            'is_deleted' => 0,
            'judul' => "Company Type",
            'subjudul' => "Tambah company type",
        );
        $this->template->load('template', 'company_type_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'company_type' => $this->input->post('company_type', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('company_type'));
        }
    }

    public function update($id) {
        $row = $this->Company_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('company_type/update_action'),
                'id_company_type' => set_value('id_company_type', $row->id_company_type),
                'company_type' => set_value('company_type', $row->company_type),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Company Type",
                'subjudul' => "Edit company type",
            );
            $this->template->load('template', 'company_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_company_type', TRUE));
        } else {
            $data = array(
                'company_type' => $this->input->post('company_type', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_type_model->update($this->input->post('id_company_type', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('company_type'));
        }
    }

    public function delete($id) {
        $row = $this->Company_type_model->get_by_id($id);

        if ($row) {
            $this->Company_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('company_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('company_type', 'company type', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_company_type', 'id_company_type', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "company_type.xls";
        $judul = "company_type";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Company Type");

        foreach ($this->Company_type_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->company_type);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=company_type.doc");

        $data = array(
            'company_type_data' => $this->Company_type_model->get_all(),
            'start' => 0
        );

        $this->load->view('company_type_doc', $data);
    }
    
    function pdf() {
        $data = array(
            'company_type_data' => $this->Company_type_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('company_type_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('company_type.pdf', 'D');
    }

}

/* End of file Company_type.php */
/* Location: ./application/controllers/Company_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-31 08:06:21 */
/* http://harviacode.com */