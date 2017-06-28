<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_past extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Our_past_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $our_past = $this->Our_past_model->get_all();

        $data = array(
            'our_past_data' => $our_past,
			'judul' => 'OUR_PAST',
			'subjudul' =>'',
        );

        $this->template->load('template','our_past_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Our_past_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'ID_CONTENT' => $row->ID_CONTENT,
		'JUDUL' => $row->JUDUL,
		'OBJECTIVE' => $row->OBJECTIVE,
		'MARGIN_X' => $row->MARGIN_X,
		'MARGIN_Y' => $row->MARGIN_Y,
		'LOCATION' => $row->LOCATION,
		'SECTOR' => $row->SECTOR,
		'BENEFICIARIES' => $row->BENEFICIARIES,
		'VALUE' => $row->VALUE,
		'PARTNER' => $row->PARTNER,
		'YEAR_AWARDED' => $row->YEAR_AWARDED,
		'YEAR_COMPLETED' => $row->YEAR_COMPLETED,
		'judul' => 'OUR_PAST',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','our_past_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('our_past'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('our_past/create_action'),
	    'ID' => set_value('ID'),
	    'ID_CONTENT' => set_value('ID_CONTENT'),
	    'JUDUL' => set_value('JUDUL'),
	    'OBJECTIVE' => set_value('OBJECTIVE'),
	    'MARGIN_X' => set_value('MARGIN_X'),
	    'MARGIN_Y' => set_value('MARGIN_Y'),
	    'LOCATION' => set_value('LOCATION'),
	    'SECTOR' => set_value('SECTOR'),
	    'BENEFICIARIES' => set_value('BENEFICIARIES'),
	    'VALUE' => set_value('VALUE'),
	    'PARTNER' => set_value('PARTNER'),
	    'YEAR_AWARDED' => set_value('YEAR_AWARDED'),
	    'YEAR_COMPLETED' => set_value('YEAR_COMPLETED'),
		'judul' => 'OUR_PAST',
		'subjudul' =>'Create',
	);
        $this->template->load('template','our_past_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
		'JUDUL' => $this->input->post('JUDUL',TRUE),
		'OBJECTIVE' => $this->input->post('OBJECTIVE',TRUE),
		'MARGIN_X' => $this->input->post('MARGIN_X',TRUE),
		'MARGIN_Y' => $this->input->post('MARGIN_Y',TRUE),
		'LOCATION' => $this->input->post('LOCATION',TRUE),
		'SECTOR' => $this->input->post('SECTOR',TRUE),
		'BENEFICIARIES' => $this->input->post('BENEFICIARIES',TRUE),
		'VALUE' => $this->input->post('VALUE',TRUE),
		'PARTNER' => $this->input->post('PARTNER',TRUE),
		'YEAR_AWARDED' => $this->input->post('YEAR_AWARDED',TRUE),
		'YEAR_COMPLETED' => $this->input->post('YEAR_COMPLETED',TRUE),
	    );

            $this->Our_past_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('our_past'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Our_past_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('our_past/update_action'),
		'ID' => set_value('ID', $row->ID),
		'ID_CONTENT' => set_value('ID_CONTENT', $row->ID_CONTENT),
		'JUDUL' => set_value('JUDUL', $row->JUDUL),
		'OBJECTIVE' => set_value('OBJECTIVE', $row->OBJECTIVE),
		'MARGIN_X' => set_value('MARGIN_X', $row->MARGIN_X),
		'MARGIN_Y' => set_value('MARGIN_Y', $row->MARGIN_Y),
		'LOCATION' => set_value('LOCATION', $row->LOCATION),
		'SECTOR' => set_value('SECTOR', $row->SECTOR),
		'BENEFICIARIES' => set_value('BENEFICIARIES', $row->BENEFICIARIES),
		'VALUE' => set_value('VALUE', $row->VALUE),
		'PARTNER' => set_value('PARTNER', $row->PARTNER),
		'YEAR_AWARDED' => set_value('YEAR_AWARDED', $row->YEAR_AWARDED),
		'YEAR_COMPLETED' => set_value('YEAR_COMPLETED', $row->YEAR_COMPLETED),
		'judul' => 'OUR_PAST',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','our_past_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('our_past'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'ID_CONTENT' => $this->input->post('ID_CONTENT',TRUE),
		'JUDUL' => $this->input->post('JUDUL',TRUE),
		'OBJECTIVE' => $this->input->post('OBJECTIVE',TRUE),
		'MARGIN_X' => $this->input->post('MARGIN_X',TRUE),
		'MARGIN_Y' => $this->input->post('MARGIN_Y',TRUE),
		'LOCATION' => $this->input->post('LOCATION',TRUE),
		'SECTOR' => $this->input->post('SECTOR',TRUE),
		'BENEFICIARIES' => $this->input->post('BENEFICIARIES',TRUE),
		'VALUE' => $this->input->post('VALUE',TRUE),
		'PARTNER' => $this->input->post('PARTNER',TRUE),
		'YEAR_AWARDED' => $this->input->post('YEAR_AWARDED',TRUE),
		'YEAR_COMPLETED' => $this->input->post('YEAR_COMPLETED',TRUE),
	    );

            $this->Our_past_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('our_past'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Our_past_model->get_by_id($id);

        if ($row) {
            $this->Our_past_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('our_past'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('our_past'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_CONTENT', 'id content', 'trim|required');
	$this->form_validation->set_rules('JUDUL', 'judul', 'trim|required');
	$this->form_validation->set_rules('OBJECTIVE', 'objective', 'trim|required');
	$this->form_validation->set_rules('MARGIN_X', 'margin x', 'trim|required');
	$this->form_validation->set_rules('MARGIN_Y', 'margin y', 'trim|required');
	$this->form_validation->set_rules('LOCATION', 'location', 'trim|required');
	$this->form_validation->set_rules('SECTOR', 'sector', 'trim|required');
	$this->form_validation->set_rules('BENEFICIARIES', 'beneficiaries', 'trim|required');
	$this->form_validation->set_rules('VALUE', 'value', 'trim|required');
	$this->form_validation->set_rules('PARTNER', 'partner', 'trim|required');
	$this->form_validation->set_rules('YEAR_AWARDED', 'year awarded', 'trim|required');
	$this->form_validation->set_rules('YEAR_COMPLETED', 'year completed', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "our_past.xls";
        $judul = "our_past";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ID CONTENT");
	xlsWriteLabel($tablehead, $kolomhead++, "JUDUL");
	xlsWriteLabel($tablehead, $kolomhead++, "OBJECTIVE");
	xlsWriteLabel($tablehead, $kolomhead++, "MARGIN X");
	xlsWriteLabel($tablehead, $kolomhead++, "MARGIN Y");
	xlsWriteLabel($tablehead, $kolomhead++, "LOCATION");
	xlsWriteLabel($tablehead, $kolomhead++, "SECTOR");
	xlsWriteLabel($tablehead, $kolomhead++, "BENEFICIARIES");
	xlsWriteLabel($tablehead, $kolomhead++, "VALUE");
	xlsWriteLabel($tablehead, $kolomhead++, "PARTNER");
	xlsWriteLabel($tablehead, $kolomhead++, "YEAR AWARDED");
	xlsWriteLabel($tablehead, $kolomhead++, "YEAR COMPLETED");

	foreach ($this->Our_past_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_CONTENT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JUDUL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->OBJECTIVE);
	    xlsWriteNumber($tablebody, $kolombody++, $data->MARGIN_X);
	    xlsWriteNumber($tablebody, $kolombody++, $data->MARGIN_Y);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LOCATION);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SECTOR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->BENEFICIARIES);
	    xlsWriteLabel($tablebody, $kolombody++, $data->VALUE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PARTNER);
	    xlsWriteLabel($tablebody, $kolombody++, $data->YEAR_AWARDED);
	    xlsWriteLabel($tablebody, $kolombody++, $data->YEAR_COMPLETED);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=our_past.doc");

        $data = array(
            'our_past_data' => $this->Our_past_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('our_past_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'our_past_data' => $this->Our_past_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('our_past_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('our_past.pdf', 'D'); 
    }

}

/* End of file Our_past.php */
/* Location: ./application/controllers/Our_past.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-28 06:58:22 */
/* http://harviacode.com */