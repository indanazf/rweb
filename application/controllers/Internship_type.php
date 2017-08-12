<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_type extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Internship_type_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $internship_type = $this->Internship_type_model->get_all();

        $data = array(
            'internship_type_data' => $internship_type,
			'judul' => 'INTERNSHIP_TYPE',
			'subjudul' =>'',
        );

        $this->template->load('template2','internship_type_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Internship_type_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'POSITION' => $row->POSITION,
		'judul' => 'INTERNSHIP_TYPE',
		'subjudul' =>'Read',
	    );
            $this->template->load('template2','internship_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('internship_type/create_action'),
	    'ID' => set_value('ID'),
	    'POSITION' => set_value('POSITION'),
		'judul' => 'INTERNSHIP_TYPE',
		'subjudul' =>'Create',
	);
        $this->template->load('template2','internship_type_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'POSITION' => $this->input->post('POSITION',TRUE),
	    );

            $this->Internship_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('internship_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Internship_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('internship_type/update_action'),
		'ID' => set_value('ID', $row->ID),
		'POSITION' => set_value('POSITION', $row->POSITION),
		'judul' => 'INTERNSHIP_TYPE',
		'subjudul' =>'Update',
	    );
            $this->template->load('template2','internship_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'POSITION' => $this->input->post('POSITION',TRUE),
	    );

            $this->Internship_type_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('internship_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Internship_type_model->get_by_id($id);

        if ($row) {
            $this->Internship_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('internship_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('POSITION', 'position', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "internship_type.xls";
        $judul = "internship_type";
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
	xlsWriteLabel($tablehead, $kolomhead++, "POSITION");

	foreach ($this->Internship_type_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->POSITION);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=internship_type.doc");

        $data = array(
            'internship_type_data' => $this->Internship_type_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('internship_type_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'internship_type_data' => $this->Internship_type_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('internship_type_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('internship_type.pdf', 'D'); 
    }

}

/* End of file Internship_type.php */
/* Location: ./application/controllers/Internship_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 05:44:30 */
/* http://harviacode.com */