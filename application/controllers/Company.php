<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect("auth/login");
        }
        $this->load->model('Company_model');
        $this->load->model('Company_type_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $company = $this->Company_model->get_all();

        $data = array(
            'company_data' => $company,
            'judul' => "Company",
            'subjudul' => "List company",
        );

        $this->template->load('template', 'company_list', $data);
    }

    public function read($id) {
        $row = $this->Company_model->get_by_id($id);
        $company_type = $this->Company_type_model->get_all();
        if ($row) {
            $data = array(
                'id_company' => $row->id_company,
                'id_company_type' => $row->id_company_type,
                'company' => $row->company,
                'is_deleted' => $row->is_deleted,
                'judul' => "Company",
                'subjudul' => "Detail company",
            );
            $this->template->load('template', 'company_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }

    public function create() {
        $company_type = $this->Company_type_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('company/create_action'),
            'id_company' => set_value('id_company'),
            'id_company_type' => set_value('id_company_type'),
            'company' => set_value('company'),
            'is_deleted' => 0,
            'judul' => "Company",
            'subjudul' => "Tambah company",
            'company_type' => $company_type,
        );
        $this->template->load('template', 'company_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_company_type' => $this->input->post('id_company_type', TRUE),
                'company' => $this->input->post('company', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('company'));
        }
    }

    public function update($id) {
        $company_type = $this->Company_type_model->get_all();
        $row = $this->Company_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('company/update_action'),
                'id_company' => set_value('id_company', $row->id_company),
                'id_company_type' => set_value('id_company_type', $row->id_company_type),
                'company' => set_value('company', $row->company),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Company",
                'subjudul' => "Edit company",
                'company_type' => $company_type,
            );
            $this->template->load('template', 'company_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_company', TRUE));
        } else {
            $data = array(
                'id_company_type' => $this->input->post('id_company_type', TRUE),
                'company' => $this->input->post('company', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_model->update($this->input->post('id_company', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('company'));
        }
    }

    public function delete($id) {
        $row = $this->Company_model->get_by_id($id);

        if ($row) {
            $this->Company_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('company'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id_company_type', 'id company type', 'trim|required');
        $this->form_validation->set_rules('company', 'company', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_company', 'id_company', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "company.xls";
        $judul = "company";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Company");

        foreach ($this->Company_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
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
        header("Content-Disposition: attachment;Filename=company.doc");

        $data = array(
            'company_data' => $this->Company_model->get_all(),
            'start' => 0
        );

        $this->load->view('company_doc', $data);
    }
    
    function pdf() {
        $data = array(
            'company_data' => $this->Company_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('company_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('company.pdf', 'D');
    }

}

/* End of file Company.php */
/* Location: ./application/controllers/Company.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-31 08:06:15 */
/* http://harviacode.com */