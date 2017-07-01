<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donation extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donation_model');
        $this->load->model('Donation_type_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $donation_type = $this->Donation_type_model->get_all();
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/donation', $array = array('DONATION_TYPE'=>$donation_type, 'action' => site_url('donation/create_action')));
        $this->load->view('layouts/about_us/section6');
        $this->load->view('layouts/footer');
    }

    public function admin()
    {
        $donation = $this->Donation_model->get_all();

        $data = array(
            'donation_data' => $donation,
			'judul' => 'DONATION',
			'subjudul' =>'',
        );

        $this->template->load('template','donation_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Donation_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_DONATION' => $row->ID_DONATION,
		'NAME' => $row->NAME,
		'ACTIVITY' => $row->ACTIVITY,
		'EMAIL' => $row->EMAIL,
		'PHONE' => $row->PHONE,
		'ADDRESS' => $row->ADDRESS,
		'PAYMENT' => $row->PAYMENT,
		'ID_DONATION_TYPE' => $row->ID_DONATION_TYPE,
		'NUMBER_OF_DONATION' => $row->NUMBER_OF_DONATION,
		'NOTES' => $row->NOTES,
		'judul' => 'DONATION',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','donation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation/admin'));
        }
    }

    public function create() 
    {
        $donation_type = $this->Donation_type_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('donation/create_action'),
	    'ID_DONATION' => set_value('ID_DONATION'),
	    'NAME' => set_value('NAME'),
	    'ACTIVITY' => set_value('ACTIVITY'),
	    'EMAIL' => set_value('EMAIL'),
	    'PHONE' => set_value('PHONE'),
	    'ADDRESS' => set_value('ADDRESS'),
	    'PAYMENT' => set_value('PAYMENT'),
	    'ID_DONATION_TYPE' => set_value('ID_DONATION_TYPE'),
	    'NUMBER_OF_DONATION' => set_value('NUMBER_OF_DONATION'),
	    'NOTES' => set_value('NOTES'),
		'judul' => 'DONATION',
		'subjudul' =>'Create',
        'DONATION_TYPE' => $donation_type
	);
        $this->template->load('template','donation_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAME' => $this->input->post('NAME',TRUE),
		'ACTIVITY' => $this->input->post('ACTIVITY',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'ADDRESS' => $this->input->post('ADDRESS',TRUE),
		'PAYMENT' => $this->input->post('PAYMENT',TRUE),
		'ID_DONATION_TYPE' => $this->input->post('ID_DONATION_TYPE',TRUE),
		'NUMBER_OF_DONATION' => $this->input->post('NUMBER_OF_DONATION',TRUE),
		'NOTES' => $this->input->post('NOTES',TRUE),
	    );

            $this->Donation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect($_SERVER['HTTP_REFERER']);
            //redirect(site_url('donation/admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Donation_model->get_by_id($id);
        $donation_type = $this->Donation_type_model->get_all();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('donation/update_action'),
		'ID_DONATION' => set_value('ID_DONATION', $row->ID_DONATION),
		'NAME' => set_value('NAME', $row->NAME),
		'ACTIVITY' => set_value('ACTIVITY', $row->ACTIVITY),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'PHONE' => set_value('PHONE', $row->PHONE),
		'ADDRESS' => set_value('ADDRESS', $row->ADDRESS),
		'PAYMENT' => set_value('PAYMENT', $row->PAYMENT),
		'ID_DONATION_TYPE' => set_value('ID_DONATION_TYPE', $row->ID_DONATION_TYPE),
		'NUMBER_OF_DONATION' => set_value('NUMBER_OF_DONATION', $row->NUMBER_OF_DONATION),
		'NOTES' => set_value('NOTES', $row->NOTES),
		'judul' => 'DONATION',
		'subjudul' =>'Update',
        'DONATION_TYPE' => $donation_type
	    );
            $this->template->load('template','donation_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation/admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_DONATION', TRUE));
        } else {
            $data = array(
		'NAME' => $this->input->post('NAME',TRUE),
		'ACTIVITY' => $this->input->post('ACTIVITY',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'ADDRESS' => $this->input->post('ADDRESS',TRUE),
		'PAYMENT' => $this->input->post('PAYMENT',TRUE),
		'ID_DONATION_TYPE' => $this->input->post('ID_DONATION_TYPE',TRUE),
		'NUMBER_OF_DONATION' => $this->input->post('NUMBER_OF_DONATION',TRUE),
		'NOTES' => $this->input->post('NOTES',TRUE),
	    );

            $this->Donation_model->update($this->input->post('ID_DONATION', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('donation/admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Donation_model->get_by_id($id);

        if ($row) {
            $this->Donation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('donation/admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation/admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NAME', 'name', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('PHONE', 'phone', 'trim|required');
	$this->form_validation->set_rules('ADDRESS', 'address', 'trim|required');
	$this->form_validation->set_rules('PAYMENT', 'payment', 'trim|required');
	$this->form_validation->set_rules('ID_DONATION_TYPE', 'id donation type', 'trim|required');
	$this->form_validation->set_rules('NUMBER_OF_DONATION', 'number of donation', 'trim|required|numeric');

	//$this->form_validation->set_rules('ID_DONATION', 'ID_DONATION', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "donation.xls";
        $judul = "donation";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NAME");
	xlsWriteLabel($tablehead, $kolomhead++, "ACTIVITY");
	xlsWriteLabel($tablehead, $kolomhead++, "EMAIL");
	xlsWriteLabel($tablehead, $kolomhead++, "PHONE");
	xlsWriteLabel($tablehead, $kolomhead++, "ADDRESS");
	xlsWriteLabel($tablehead, $kolomhead++, "PAYMENT");
	xlsWriteLabel($tablehead, $kolomhead++, "ID DONATION TYPE");
	xlsWriteLabel($tablehead, $kolomhead++, "NUMBER OF DONATION");
	xlsWriteLabel($tablehead, $kolomhead++, "NOTES");

	foreach ($this->Donation_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAME);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ACTIVITY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PHONE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ADDRESS);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PAYMENT);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_DONATION_TYPE);
	    xlsWriteNumber($tablebody, $kolombody++, $data->NUMBER_OF_DONATION);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NOTES);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=donation.doc");

        $data = array(
            'donation_data' => $this->Donation_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('donation_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'donation_data' => $this->Donation_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('donation_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('donation.pdf', 'D'); 
    }

}

/* End of file Donation.php */
/* Location: ./application/controllers/Donation.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-28 11:42:02 */
/* http://harviacode.com */