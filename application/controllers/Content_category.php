<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_category extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $content_category = $this->Content_category_model->get_all();

        $data = array(
            'content_category_data' => $content_category,
			'judul' => 'CONTENT_CATEGORY',
			'subjudul' =>'',
        );

        $this->template->load('template','content_category_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Content_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_CATEGORY' => $row->ID_CATEGORY,
		'CATEGORY' => $row->CATEGORY,
		'INFORMATION_CATEGORY' => $row->INFORMATION_CATEGORY,
		'ICON_CATEGORY' => $row->ICON_CATEGORY,
		'judul' => 'CONTENT_CATEGORY',
		'subjudul' =>'Read',
	    );
            $this->template->load('template','content_category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content_category/create_action'),
	    'ID_CATEGORY' => set_value('ID_CATEGORY'),
	    'CATEGORY' => set_value('CATEGORY'),
	    'INFORMATION_CATEGORY' => set_value('INFORMATION_CATEGORY'),
	    'ICON_CATEGORY' => set_value('ICON_CATEGORY'),
		'judul' => 'CONTENT_CATEGORY',
		'subjudul' =>'Create',
	);
        $this->template->load('template','content_category_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'CATEGORY' => $this->input->post('CATEGORY',TRUE),
		'INFORMATION_CATEGORY' => $this->input->post('INFORMATION_CATEGORY',TRUE),
		'ICON_CATEGORY' => $this->input->post('ICON_CATEGORY',TRUE),
	    );

            $this->Content_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content_category/update_action'),
		'ID_CATEGORY' => set_value('ID_CATEGORY', $row->ID_CATEGORY),
		'CATEGORY' => set_value('CATEGORY', $row->CATEGORY),
		'INFORMATION_CATEGORY' => set_value('INFORMATION_CATEGORY', $row->INFORMATION_CATEGORY),
		'ICON_CATEGORY' => set_value('ICON_CATEGORY', $row->ICON_CATEGORY),
		'judul' => 'CONTENT_CATEGORY',
		'subjudul' =>'Update',
	    );
            $this->template->load('template','content_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_CATEGORY', TRUE));
        } else {
            $data = array(
		'CATEGORY' => $this->input->post('CATEGORY',TRUE),
		'INFORMATION_CATEGORY' => $this->input->post('INFORMATION_CATEGORY',TRUE),
		'ICON_CATEGORY' => $this->input->post('ICON_CATEGORY',TRUE),
	    );

            $this->Content_category_model->update($this->input->post('ID_CATEGORY', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_category_model->get_by_id($id);

        if ($row) {
            $this->Content_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('content_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('CATEGORY', 'category', 'trim|required');
	$this->form_validation->set_rules('INFORMATION_CATEGORY', 'information category', 'trim|required');
	$this->form_validation->set_rules('ICON_CATEGORY', 'icon category', 'trim|required');

	$this->form_validation->set_rules('ID_CATEGORY', 'ID_CATEGORY', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "content_category.xls";
        $judul = "content_category";
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
	xlsWriteLabel($tablehead, $kolomhead++, "CATEGORY");
	xlsWriteLabel($tablehead, $kolomhead++, "INFORMATION CATEGORY");
	xlsWriteLabel($tablehead, $kolomhead++, "ICON CATEGORY");

	foreach ($this->Content_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CATEGORY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->INFORMATION_CATEGORY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ICON_CATEGORY);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=content_category.doc");

        $data = array(
            'content_category_data' => $this->Content_category_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('content_category_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'content_category_data' => $this->Content_category_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('content_category_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('content_category.pdf', 'D'); 
    }

}

/* End of file Content_category.php */
/* Location: ./application/controllers/Content_category.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-27 05:15:18 */
/* http://harviacode.com */