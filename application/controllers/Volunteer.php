<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Volunteer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Volunteer_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/volunteer');
        $this->load->view('layouts/footer');

    }

    public function admin()
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $volunteer = $this->Volunteer_model->get_all();

        $data = array(
            'volunteer_data' => $volunteer,
			'judul' => 'VOLUNTEER',
			'subjudul' =>'',
        );

        $this->template->load('template2','volunteer_list', $data);
    }

    public function read($id) 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $row = $this->Volunteer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_volunteer' => $row->id_volunteer,
		'id_position' => $row->id_position,
		'name' => $row->name,
		'activity' => $row->activity,
		'email' => $row->email,
		'phone' => $row->phone,
		'motivation' => $row->motivation,
		'judul' => 'VOLUNTEER',
		'subjudul' =>'Read',
	    );
            $this->template->load('template2','volunteer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('volunteer'));
        }
    }

    public function create() 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('volunteer/create_action'),
	    'id_volunteer' => set_value('id_volunteer'),
	    'id_position' => set_value('id_position'),
	    'name' => set_value('name'),
	    'activity' => set_value('activity'),
	    'email' => set_value('email'),
	    'phone' => set_value('phone'),
	    'motivation' => set_value('motivation'),
		'judul' => 'VOLUNTEER',
		'subjudul' =>'Create',
	);
        $this->template->load('template2','volunteer_form', $data);
    }
    
    public function create_action() 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_position' => $this->input->post('id_position',TRUE),
		'name' => $this->input->post('name',TRUE),
		'activity' => $this->input->post('activity',TRUE),
		'email' => $this->input->post('email',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'motivation' => $this->input->post('motivation',TRUE),
	    );

            $this->Volunteer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('volunteer'));
        }
    }
    
    public function update($id) 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $row = $this->Volunteer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('volunteer/update_action'),
		'id_volunteer' => set_value('id_volunteer', $row->id_volunteer),
		'id_position' => set_value('id_position', $row->id_position),
		'name' => set_value('name', $row->name),
		'activity' => set_value('activity', $row->activity),
		'email' => set_value('email', $row->email),
		'phone' => set_value('phone', $row->phone),
		'motivation' => set_value('motivation', $row->motivation),
		'judul' => 'VOLUNTEER',
		'subjudul' =>'Update',
	    );
            $this->template->load('template2','volunteer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('volunteer'));
        }
    }
    
    public function update_action() 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_volunteer', TRUE));
        } else {
            $data = array(
		'id_position' => $this->input->post('id_position',TRUE),
		'name' => $this->input->post('name',TRUE),
		'activity' => $this->input->post('activity',TRUE),
		'email' => $this->input->post('email',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'motivation' => $this->input->post('motivation',TRUE),
	    );

            $this->Volunteer_model->update($this->input->post('id_volunteer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('volunteer'));
        }
    }
    
    public function delete($id) 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $row = $this->Volunteer_model->get_by_id($id);

        if ($row) {
            $this->Volunteer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('volunteer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('volunteer'));
        }
    }

    public function _rules() 
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
	$this->form_validation->set_rules('id_position', 'id position', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('activity', 'activity', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('motivation', 'motivation', 'trim|required');

	$this->form_validation->set_rules('id_volunteer', 'id_volunteer', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $this->load->helper('exportexcel');
        $namaFile = "volunteer.xls";
        $judul = "volunteer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Position");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Activity");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Motivation");

	foreach ($this->Volunteer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_position);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activity);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->motivation);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=volunteer.doc");

        $data = array(
            'volunteer_data' => $this->Volunteer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('volunteer_doc',$data);
    }

    function pdf()
    {
        if(!isset($this->session->userdata['username'])){
            redirect(site_url('auth/login'));
        }
        $data = array(
            'volunteer_data' => $this->Volunteer_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('volunteer_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('volunteer.pdf', 'D'); 
    }

}

/* End of file Volunteer.php */
/* Location: ./application/controllers/Volunteer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-15 10:30:20 */
/* http://harviacode.com */