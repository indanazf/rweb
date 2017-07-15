<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Position_volunteer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Position_volunteer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $position_volunteer = $this->Position_volunteer_model->get_all();

        $data = array(
            'position_volunteer_data' => $position_volunteer,
			'judul' => 'POSITION_VOLUNTEER',
			'subjudul' =>'',
        );

        $this->template->load('template','position_volunteer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Position_volunteer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_position' => $row->id_position,
		'position' => $row->position,
		'judul' => 'POSITION_VOLUNTEER',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','position_volunteer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_volunteer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('position_volunteer/create_action'),
	    'id_position' => set_value('id_position'),
	    'position' => set_value('position'),
		'judul' => 'POSITION_VOLUNTEER',
		'subjudul' =>'Create',
	);
        $this->template->load('template','position_volunteer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'position' => $this->input->post('position',TRUE),
	    );

            $this->Position_volunteer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('position_volunteer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Position_volunteer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('position_volunteer/update_action'),
		'id_position' => set_value('id_position', $row->id_position),
		'position' => set_value('position', $row->position),
		'judul' => 'POSITION_VOLUNTEER',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','position_volunteer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_volunteer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_position', TRUE));
        } else {
            $data = array(
		'position' => $this->input->post('position',TRUE),
	    );

            $this->Position_volunteer_model->update($this->input->post('id_position', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('position_volunteer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Position_volunteer_model->get_by_id($id);

        if ($row) {
            $this->Position_volunteer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('position_volunteer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_volunteer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('position', 'position', 'trim|required');

	$this->form_validation->set_rules('id_position', 'id_position', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "position_volunteer.xls";
        $judul = "position_volunteer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Position");

	foreach ($this->Position_volunteer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->position);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=position_volunteer.doc");

        $data = array(
            'position_volunteer_data' => $this->Position_volunteer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('position_volunteer_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'position_volunteer_data' => $this->Position_volunteer_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('position_volunteer_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('position_volunteer.pdf', 'D'); 
    }

}

/* End of file Position_volunteer.php */
/* Location: ./application/controllers/Position_volunteer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-15 10:30:08 */
/* http://harviacode.com */