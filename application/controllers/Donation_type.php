<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donation_type extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donation_type_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $donation_type = $this->Donation_type_model->get_all();

        $data = array(
            'donation_type_data' => $donation_type,
			'judul' => 'DONATION_TYPE',
			'subjudul' =>'',
        );

        $this->template->load('template','donation_type_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Donation_type_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_DONATION_TYPE' => $row->ID_DONATION_TYPE,
		'TYPE' => $row->TYPE,
		'judul' => 'DONATION_TYPE',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','donation_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('donation_type/create_action'),
	    'ID_DONATION_TYPE' => set_value('ID_DONATION_TYPE'),
	    'TYPE' => set_value('TYPE'),
		'judul' => 'DONATION_TYPE',
		'subjudul' =>'Create',
	);
        $this->template->load('template','donation_type_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'TYPE' => $this->input->post('TYPE',TRUE),
	    );

            $this->Donation_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('donation_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Donation_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('donation_type/update_action'),
		'ID_DONATION_TYPE' => set_value('ID_DONATION_TYPE', $row->ID_DONATION_TYPE),
		'TYPE' => set_value('TYPE', $row->TYPE),
		'judul' => 'DONATION_TYPE',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','donation_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_DONATION_TYPE', TRUE));
        } else {
            $data = array(
		'TYPE' => $this->input->post('TYPE',TRUE),
	    );

            $this->Donation_type_model->update($this->input->post('ID_DONATION_TYPE', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('donation_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Donation_type_model->get_by_id($id);

        if ($row) {
            $this->Donation_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('donation_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donation_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('TYPE', 'type', 'trim|required');

	$this->form_validation->set_rules('ID_DONATION_TYPE', 'ID_DONATION_TYPE', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "donation_type.xls";
        $judul = "donation_type";
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
	xlsWriteLabel($tablehead, $kolomhead++, "TYPE");

	foreach ($this->Donation_type_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TYPE);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=donation_type.doc");

        $data = array(
            'donation_type_data' => $this->Donation_type_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('donation_type_doc',$data);
    }

}

/* End of file Donation_type.php */
/* Location: ./application/controllers/Donation_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-28 11:45:26 */
/* http://harviacode.com */