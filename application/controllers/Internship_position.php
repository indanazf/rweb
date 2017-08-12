<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_position extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Internship_position_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $internship_position = $this->Internship_position_model->get_all();

        $data = array(
            'internship_position_data' => $internship_position,
			'judul' => 'INTERNSHIP_POSITION',
			'subjudul' =>'',
        );

        $this->template->load('template2','internship_position_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Internship_position_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'ID_TYPE' => $row->ID_TYPE,
		'TITLE' => $row->TITLE,
		'DETAIL' => $row->DETAIL,
		'judul' => 'INTERNSHIP_POSITION',
		'subjudul' =>'Read',
	    );
            $this->template->load('template2','internship_position_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_position'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('internship_position/create_action'),
	    'ID' => set_value('ID'),
	    'ID_TYPE' => set_value('ID_TYPE'),
	    'TITLE' => set_value('TITLE'),
	    'DETAIL' => set_value('DETAIL'),
		'judul' => 'INTERNSHIP_POSITION',
		'subjudul' =>'Create',
	);
        $this->template->load('template2','internship_position_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
		'TITLE' => $this->input->post('TITLE',TRUE),
		'DETAIL' => $this->input->post('DETAIL',TRUE),
	    );

            $this->Internship_position_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('internship_position'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Internship_position_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('internship_position/update_action'),
		'ID' => set_value('ID', $row->ID),
		'ID_TYPE' => set_value('ID_TYPE', $row->ID_TYPE),
		'TITLE' => set_value('TITLE', $row->TITLE),
		'DETAIL' => set_value('DETAIL', $row->DETAIL),
		'judul' => 'INTERNSHIP_POSITION',
		'subjudul' =>'Update',
	    );
            $this->template->load('template2','internship_position_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_position'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
		'TITLE' => $this->input->post('TITLE',TRUE),
		'DETAIL' => $this->input->post('DETAIL',TRUE),
	    );

            $this->Internship_position_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('internship_position'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Internship_position_model->get_by_id($id);

        if ($row) {
            $this->Internship_position_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('internship_position'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship_position'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_TYPE', 'id type', 'trim|required');
	$this->form_validation->set_rules('TITLE', 'title', 'trim|required');
	$this->form_validation->set_rules('DETAIL', 'detail', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "internship_position.xls";
        $judul = "internship_position";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ID TYPE");
	xlsWriteLabel($tablehead, $kolomhead++, "TITLE");
	xlsWriteLabel($tablehead, $kolomhead++, "DETAIL");

	foreach ($this->Internship_position_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_TYPE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TITLE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DETAIL);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=internship_position.doc");

        $data = array(
            'internship_position_data' => $this->Internship_position_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('internship_position_doc',$data);
    }

}

/* End of file Internship_position.php */
/* Location: ./application/controllers/Internship_position.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 06:10:37 */
/* http://harviacode.com */