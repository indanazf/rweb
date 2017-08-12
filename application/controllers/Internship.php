<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Internship_model');
        $this->load->model('Internship_position_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/internship');
        $this->load->view('layouts/footer');
    }

    public function form(){
        $id_type =  $this->input->post('id_type',TRUE);
        $c = $this->Internship_position_model->get_by_id_type($id_type);
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/internship_form',$array = array('position'=>$c));
        $this->load->view('layouts/footer');
    }

    public function create_action_depan() 
    {
        $data = array(
        'ID' => $this->input->post('ID',TRUE),
        'ID_TYPE' => $this->input->post('ID_TYPE',TRUE),
        'NAME' => $this->input->post('NAME',TRUE),
        'UNIVERSITY' => $this->input->post('UNIVERSITY',TRUE),
        'SKILL' => $this->input->post('SKILL',TRUE),
        'EMAIL' => $this->input->post('EMAIL',TRUE),
        'PHONE' => $this->input->post('PHONE',TRUE),
        'MOTIVATION' => $this->input->post('MOTIVATION',TRUE),
        'ID_POSITION' => $this->input->post('ID_POSITION',TRUE),
        );

        $this->Internship_model->insert($data);
        redirect(site_url('internship'));
    }

    public function admin()
    {
        $internship = $this->Internship_model->get_all();

        $data = array(
            'internship_data' => $internship,
			'judul' => 'INTERNSHIP',
			'subjudul' =>'',
        );

        $this->template->load('template','internship_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Internship_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'NAME' => $row->NAME,
		'UNIVERSITY' => $row->UNIVERSITY,
		'SKILL' => $row->SKILL,
		'EMAIL' => $row->EMAIL,
		'PHONE' => $row->PHONE,
		'MOTIVATION' => $row->MOTIVATION,
		'ID_POSITION' => $row->ID_POSITION,
		'judul' => 'INTERNSHIP',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','internship_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('internship/create_action'),
	    'ID' => set_value('ID'),
	    'NAME' => set_value('NAME'),
	    'UNIVERSITY' => set_value('UNIVERSITY'),
	    'SKILL' => set_value('SKILL'),
	    'EMAIL' => set_value('EMAIL'),
	    'PHONE' => set_value('PHONE'),
	    'MOTIVATION' => set_value('MOTIVATION'),
	    'ID_POSITION' => set_value('ID_POSITION'),
		'judul' => 'INTERNSHIP',
		'subjudul' =>'Create',
	);
        $this->template->load('template','internship_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID' => $this->input->post('ID',TRUE),
		'NAME' => $this->input->post('NAME',TRUE),
		'UNIVERSITY' => $this->input->post('UNIVERSITY',TRUE),
		'SKILL' => $this->input->post('SKILL',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'MOTIVATION' => $this->input->post('MOTIVATION',TRUE),
		'ID_POSITION' => $this->input->post('ID_POSITION',TRUE),
	    );

            $this->Internship_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('internship'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Internship_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('internship/update_action'),
		'ID' => set_value('ID', $row->ID),
		'NAME' => set_value('NAME', $row->NAME),
		'UNIVERSITY' => set_value('UNIVERSITY', $row->UNIVERSITY),
		'SKILL' => set_value('SKILL', $row->SKILL),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'PHONE' => set_value('PHONE', $row->PHONE),
		'MOTIVATION' => set_value('MOTIVATION', $row->MOTIVATION),
		'ID_POSITION' => set_value('ID_POSITION', $row->ID_POSITION),
		'judul' => 'INTERNSHIP',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','internship_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'ID' => $this->input->post('ID',TRUE),
		'NAME' => $this->input->post('NAME',TRUE),
		'UNIVERSITY' => $this->input->post('UNIVERSITY',TRUE),
		'SKILL' => $this->input->post('SKILL',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'MOTIVATION' => $this->input->post('MOTIVATION',TRUE),
		'ID_POSITION' => $this->input->post('ID_POSITION',TRUE),
	    );

            $this->Internship_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('internship'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Internship_model->get_by_id($id);

        if ($row) {
            $this->Internship_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('internship'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('internship'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID', 'id', 'trim|required');
	$this->form_validation->set_rules('NAME', 'name', 'trim|required');
	$this->form_validation->set_rules('UNIVERSITY', 'university', 'trim|required');
	$this->form_validation->set_rules('SKILL', 'skill', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('PHONE', 'phone', 'trim|required');
	$this->form_validation->set_rules('MOTIVATION', 'motivation', 'trim|required');
	$this->form_validation->set_rules('ID_POSITION', 'id position', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "internship.xls";
        $judul = "internship";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ID");
	xlsWriteLabel($tablehead, $kolomhead++, "NAME");
	xlsWriteLabel($tablehead, $kolomhead++, "UNIVERSITY");
	xlsWriteLabel($tablehead, $kolomhead++, "SKILL");
	xlsWriteLabel($tablehead, $kolomhead++, "EMAIL");
	xlsWriteLabel($tablehead, $kolomhead++, "PHONE");
	xlsWriteLabel($tablehead, $kolomhead++, "MOTIVATION");
	xlsWriteLabel($tablehead, $kolomhead++, "ID POSITION");

	foreach ($this->Internship_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAME);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UNIVERSITY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SKILL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PHONE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MOTIVATION);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_POSITION);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=internship.doc");

        $data = array(
            'internship_data' => $this->Internship_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('internship_doc',$data);
    }

}

/* End of file Internship.php */
/* Location: ./application/controllers/Internship.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 06:42:39 */
/* http://harviacode.com */