<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Career_model');
        $this->load->library('form_validation');
    }

    public function detail($id){
        $row = $this->Career_model->get_by_id($id);
        $this->load->view('layouts/header');
        $this->load->view('layouts/index/career_detail', $array = array('career'=>$row));
        $this->load->view('layouts/footer');

    }

    public function admin()
    {
        $career = $this->Career_model->get_all();

        $data = array(
            'career_data' => $career,
			'judul' => 'CAREER',
			'subjudul' =>'',
        );

        $this->template->load('template2','career_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Career_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'subtitle' => $row->subtitle,
		'descriptions' => $row->descriptions,
		'jobdesc' => $row->jobdesc,
		'benefits' => $row->benefits,
		'requirements' => $row->requirements,
		'positions_available' => $row->positions_available,
		'deadline' => $row->deadline,
		'image' => $row->image,
		'judul' => 'CAREER',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','career_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('career/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'subtitle' => set_value('subtitle'),
	    'descriptions' => set_value('descriptions'),
	    'jobdesc' => set_value('jobdesc'),
	    'benefits' => set_value('benefits'),
	    'requirements' => set_value('requirements'),
	    'positions_available' => set_value('positions_available'),
	    'deadline' => set_value('deadline'),
	    'image' => set_value('image'),
		'judul' => 'CAREER',
		'subjudul' =>'Create',
	);
        $this->template->load('template','career_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'subtitle' => $this->input->post('subtitle',TRUE),
		'descriptions' => $this->input->post('descriptions',TRUE),
		'jobdesc' => $this->input->post('jobdesc',TRUE),
		'benefits' => $this->input->post('benefits',TRUE),
		'requirements' => $this->input->post('requirements',TRUE),
		'positions_available' => $this->input->post('positions_available',TRUE),
		'deadline' => $this->input->post('deadline',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->Career_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('career'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Career_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('career/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'subtitle' => set_value('subtitle', $row->subtitle),
		'descriptions' => set_value('descriptions', $row->descriptions),
		'jobdesc' => set_value('jobdesc', $row->jobdesc),
		'benefits' => set_value('benefits', $row->benefits),
		'requirements' => set_value('requirements', $row->requirements),
		'positions_available' => set_value('positions_available', $row->positions_available),
		'deadline' => set_value('deadline', $row->deadline),
		'image' => set_value('image', $row->image),
		'judul' => 'CAREER',
		'subjudul' =>'Update',
	    );
            $this->template->load('template2','career_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'subtitle' => $this->input->post('subtitle',TRUE),
		'descriptions' => $this->input->post('descriptions',TRUE),
		'jobdesc' => $this->input->post('jobdesc',TRUE),
		'benefits' => $this->input->post('benefits',TRUE),
		'requirements' => $this->input->post('requirements',TRUE),
		'positions_available' => $this->input->post('positions_available',TRUE),
		'deadline' => $this->input->post('deadline',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->Career_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('career'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Career_model->get_by_id($id);

        if ($row) {
            $this->Career_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('career/admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career/admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('subtitle', 'subtitle', 'trim|required');
	$this->form_validation->set_rules('descriptions', 'descriptions', 'trim|required');
	$this->form_validation->set_rules('jobdesc', 'jobdesc', 'trim|required');
	$this->form_validation->set_rules('benefits', 'benefits', 'trim|required');
	$this->form_validation->set_rules('requirements', 'requirements', 'trim|required');
	$this->form_validation->set_rules('positions_available', 'positions available', 'trim|required');
	$this->form_validation->set_rules('deadline', 'deadline', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "career.xls";
        $judul = "career";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Title");
	xlsWriteLabel($tablehead, $kolomhead++, "Subtitle");
	xlsWriteLabel($tablehead, $kolomhead++, "Descriptions");
	xlsWriteLabel($tablehead, $kolomhead++, "Jobdesc");
	xlsWriteLabel($tablehead, $kolomhead++, "Benefits");
	xlsWriteLabel($tablehead, $kolomhead++, "Requirements");
	xlsWriteLabel($tablehead, $kolomhead++, "Positions Available");
	xlsWriteLabel($tablehead, $kolomhead++, "Deadline");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");

	foreach ($this->Career_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->title);
	    xlsWriteLabel($tablebody, $kolombody++, $data->subtitle);
	    xlsWriteLabel($tablebody, $kolombody++, $data->descriptions);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jobdesc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->benefits);
	    xlsWriteLabel($tablebody, $kolombody++, $data->requirements);
	    xlsWriteNumber($tablebody, $kolombody++, $data->positions_available);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deadline);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=career.doc");

        $data = array(
            'career_data' => $this->Career_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('career_doc',$data);
    }

}

/* End of file Career.php */
/* Location: ./application/controllers/Career.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 05:27:37 */
/* http://harviacode.com */