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
		'id_category' => $row->id_category,
		'category' => $row->category,
		'created_date' => $row->created_date,
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
	    'id_category' => set_value('id_category'),
	    'category' => set_value('category'),
	    'created_date' => set_value('created_date'),
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
		'category' => $this->input->post('category',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
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
		'id_category' => set_value('id_category', $row->id_category),
		'category' => set_value('category', $row->category),
		'created_date' => set_value('created_date', $row->created_date),
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
            $this->update($this->input->post('id_category', TRUE));
        } else {
            $data = array(
		'category' => $this->input->post('category',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Content_category_model->update($this->input->post('id_category', TRUE), $data);
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
	$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');

	$this->form_validation->set_rules('id_category', 'id_category', 'trim');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Category");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

	foreach ($this->Content_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->category);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

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
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-25 16:46:29 */
/* http://harviacode.com */