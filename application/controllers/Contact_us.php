<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['username']){
            redirect(site_url('auth/login'));
        }
        $this->load->model('Contact_us_model');
        $this->load->library('form_validation');
    }

    
    public function index()
    {
        $contact_us = $this->Contact_us_model->get_all();

        $data = array(
            'contact_us_data' => $contact_us,
			'judul' => 'CONTACT_US',
			'subjudul' =>'',
        );

        $this->template->load('template','contact_us_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Contact_us_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_CONTACT' => $row->ID_CONTACT,
		'NAME_CONTACT' => $row->NAME_CONTACT,
		'NO_CONTACT' => $row->NO_CONTACT,
		'EMAIL' => $row->EMAIL,
		'TEXT' => $row->TEXT,
		'judul' => 'CONTACT_US',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','contact_us_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contact_us/create_action'),
	    'ID_CONTACT' => set_value('ID_CONTACT'),
	    'NAME_CONTACT' => set_value('NAME_CONTACT'),
	    'NO_CONTACT' => set_value('NO_CONTACT'),
	    'EMAIL' => set_value('EMAIL'),
	    'TEXT' => set_value('TEXT'),
		'judul' => 'CONTACT_US',
		'subjudul' =>'Create',
	);
        $this->template->load('template','contact_us_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAME_CONTACT' => $this->input->post('NAME_CONTACT',TRUE),
		'NO_CONTACT' => $this->input->post('NO_CONTACT',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'TEXT' => $this->input->post('TEXT',TRUE),
	    );

            $this->Contact_us_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contact_us'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Contact_us_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contact_us/update_action'),
		'ID_CONTACT' => set_value('ID_CONTACT', $row->ID_CONTACT),
		'NAME_CONTACT' => set_value('NAME_CONTACT', $row->NAME_CONTACT),
		'NO_CONTACT' => set_value('NO_CONTACT', $row->NO_CONTACT),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'TEXT' => set_value('TEXT', $row->TEXT),
		'judul' => 'CONTACT_US',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','contact_us_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_CONTACT', TRUE));
        } else {
            $data = array(
		'NAME_CONTACT' => $this->input->post('NAME_CONTACT',TRUE),
		'NO_CONTACT' => $this->input->post('NO_CONTACT',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'TEXT' => $this->input->post('TEXT',TRUE),
	    );

            $this->Contact_us_model->update($this->input->post('ID_CONTACT', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contact_us'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contact_us_model->get_by_id($id);

        if ($row) {
            $this->Contact_us_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contact_us'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NAME_CONTACT', 'name contact', 'trim|required');
	$this->form_validation->set_rules('NO_CONTACT', 'no contact', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('TEXT', 'text', 'trim|required');

	$this->form_validation->set_rules('ID_CONTACT', 'ID_CONTACT', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "contact_us.xls";
        $judul = "contact_us";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NAME CONTACT");
	xlsWriteLabel($tablehead, $kolomhead++, "NO CONTACT");
	xlsWriteLabel($tablehead, $kolomhead++, "EMAIL");
	xlsWriteLabel($tablehead, $kolomhead++, "TEXT");

	foreach ($this->Contact_us_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAME_CONTACT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NO_CONTACT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TEXT);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=contact_us.doc");

        $data = array(
            'contact_us_data' => $this->Contact_us_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('contact_us_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'contact_us_data' => $this->Contact_us_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('contact_us_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('contact_us.pdf', 'D'); 
    }

}

/* End of file Contact_us.php */
/* Location: ./application/controllers/Contact_us.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:15:02 */
/* http://harviacode.com */