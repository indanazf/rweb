<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportAM extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata['username']) {
            redirect("auth/login");
        }
        $this->load->model('Company_type_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {


        $company_type = $this->Company_type_model->get_all();

        $data = array(
            'company_type_data' => $company_type,
            'judul' => "Report",
            'subjudul' => "report infomedia",
            'rekap' => ""
        );

        $this->template->load('template', 'reportam_list', $data);
    }

    public function import() {

        $config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|pdf|csv|txt';
        $config['upload_path'] = 'uploads/rekap/';
        $config['max_size'] = 100000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('rekap')) {
            
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $file = 'uploads/rekap/' . $file_name;
            $this->load->library('excel');

            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            //extract to a PHP readable array format
            $header = array();
            $arr_data = array();
            $rating = array();
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row < 7) {
                    $header[$row][$column] = $data_value;
                } else {
                    if ($column == "E") {
                        $data_value = ($data_value - 25569) * 86400;
                        $data_value = gmdate("d-m-Y", $data_value);
                    }
                    if ($column > "E") {
                        $rating[$row][$column] = $data_value;
                    }
                    $arr_data[$row][$column] = $data_value;
                }
            }

            //logic rekomendasi
            $count_mandat_platinum_strength = 0;
            $count_mandat_platinum_2 = 0;
            $count_mandat_platinum_1 = 0;

            $count_mandat_gold_strength = 0;
            $count_mandat_gold_2 = 0;
            $count_mandat_gold_1 = 0;

            $count_mandat_silver_strength = 0;
            $count_mandat_silver_2 = 0;
            $count_mandat_silver_1 = 0;

            $count_mandat_bronze_strength = 0;
            $count_mandat_bronze_2 = 0;
            $count_mandat_bronze_1 = 0;

            $count_mandat_busol_strength = 0;
            $count_mandat_busol_2 = 0;
            $count_mandat_busol_1 = 0;

            $count_strength = 0;
            $count_2 = 0;
            $count_1 = 0;

            $count_busol_strength = 0;
            $count_busol_2 = 0;
            $count_busol_1 = 0;

            $col = "F";
            for ($j = 7; $j < sizeof($rating) + 7; $j++) {
                $col = "F";
                $count_mandat_platinum_strength = 0;
                $count_mandat_platinum_2 = 0;
                $count_mandat_platinum_1 = 0;

                $count_mandat_gold_strength = 0;
                $count_mandat_gold_2 = 0;
                $count_mandat_gold_1 = 0;

                $count_mandat_silver_strength = 0;
                $count_mandat_silver_2 = 0;
                $count_mandat_silver_1 = 0;

                $count_mandat_bronze_strength = 0;
                $count_mandat_bronze_2 = 0;
                $count_mandat_bronze_1 = 0;

                $count_mandat_busol_strength = 0;
                $count_mandat_busol_2 = 0;
                $count_mandat_busol_1 = 0;

                $count_strength = 0;
                $count_2 = 0;
                $count_1 = 0;

                $count_busol_strength = 0;
                $count_busol_2 = 0;
                $count_busol_1 = 0;
                for ($i = 0; $i <= 12; $i++) {
                    if ($rating[$j][$col] >= 3) {
                        //platinum
                        if ($i != 10 && $i != 12) {
                            $count_mandat_platinum_strength++;
                        }
                        //gold
                        if ($i <= 8) {
                            $count_mandat_gold_strength++;
                        }
                        //silver
                        if ($i <= 6 || $i == 8) {
                            $count_mandat_silver_strength++;
                        }
                        //bronze
                        if ($i == 0 || $i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 8) {
                            $count_mandat_bronze_strength++;
                        }
                        //busol
                        if ($i == 2 || $i == 7 || $i == 10 || $i == 12) {
                            $count_mandat_busol_strength++;
                        }

                        //busol
                        if ($i != 0 && $i != 3 && $i != 6 && $i != 8 && $i != 11) {
                            $count_busol_strength++;
                        }
                        $count_strength++;
                    } else if ($rating[$j][$col] == 2) {
                        //platinum
                        if ($i != 10 && $i != 12) {
                            $count_mandat_platinum_2++;
                        }
                        //gold
                        if ($i <= 8) {
                            $count_mandat_gold_2++;
                        }
                        //silver
                        if ($i <= 6 || $i == 8) {
                            $count_mandat_silver_2++;
                        }
                        //bronze
                        if ($i == 0 || $i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 8) {
                            $count_mandat_bronze_2++;
                        }
                        //busol
                        if ($i == 2 || $i == 7 || $i == 10 || $i == 12) {
                            $count_mandat_busol_2++;
                        }

                        //busol
                        if ($i != 0 && $i != 3 && $i != 6 && $i != 8 && $i != 11) {
                            $count_busol_2++;
                        }
                        $count_2++;
                    } else if ($rating[$j][$col] == 1) {
                        //platinum
                        if ($i != 10 && $i != 12) {
                            $count_mandat_platinum_1++;
                        }
                        //gold
                        if ($i <= 8) {
                            $count_mandat_gold_1++;
                        }
                        //silver
                        if ($i <= 8 || $i == 8) {
                            $count_mandat_silver_1++;
                        }
                        //bronze
                        if ($i == 0 || $i == 1 || $i == 2 || $i == 4 || $i == 5 || $i == 8) {
                            $count_mandat_bronze_1++;
                        }
                        //busol
                        if ($i == 2 || $i == 7 || $i == 10 || $i == 12) {
                            $count_mandat_busol_1++;
                        }

                        //busol
                        if ($i != 0 && $i != 3 && $i != 6 && $i != 8 && $i != 11) {
                            $count_busol_1++;
                        }

                        $count_1++;
                    }
                    $col++;
                }

                $hats_am = "";
                $hats_busol = "";
                if ($rating[$j]["S"] <= 60) {
                    $hats_am = "UNLIKELY FIT";
                } else if ($rating[$j]["S"] >= 61 && $rating[$j]["S"] <= 74) {
                    $hats_am = "POSSIBLE FIT";
                } else if ($rating[$j]["S"] >= 75) {
                    $hats_am = "PROBABLE FIT";
                }

                if ($rating[$j]["T"] <= 60) {
                    $hats_busol = "UNLIKELY FIT";
                } else if ($rating[$j]["T"] >= 61 && $rating[$j]["T"] <= 74) {
                    $hats_busol = "POSSIBLE FIT";
                } else if ($rating[$j]["T"] >= 75) {
                    $hats_busol = "PROBABLE FIT";
                }

                $hats_platinum = $hats_am;
                $hats_gold = $hats_am;
                $hats_silver = $hats_am;
                $hats_bronze = $hats_am;
                $hats_busol = $hats_busol;

                //platinum
                $recom_platinum = "";
                $recom_gold = "";
                $recom_silver = "";
                $recom_bronze = "";
                $recom_busol = "";
                if ($count_1 >= 2) {
                    $recom_platinum = "NOT READY";
                    $recom_gold = "NOT READY";
                    $recom_silver = "NOT READY";
                    $recom_bronze = "NOT READY";
                    $recom_busol = "NOT READY";
                } else {
                    //PLATINUM
                    if ($count_strength >= 11 && $count_1 == 0) {
                        if ($count_mandat_platinum_2 <= 1 && $count_2 <= 2) {
                            $recom_platinum = "READY NOW";
                        } else {
                            $recom_platinum = "READY WITH DEVELOPMENT";
                        }
                    } else if ($count_strength >= 9 && $count_strength <= 10 && $count_1 == 0) {
                        if ($count_mandat_platinum_2 <= 3 && $count_2 <= 4) {
                            $recom_platinum = "READY WITH DEVELOPMENT";
                        } else {
                            $recom_platinum = "NOT READY";
                        }
                    } else {
                        $recom_platinum = "NOT READY";
                    }

                    //GOLD
                    if ($count_strength >= 9 && $count_1 == 0) {
                        if ($count_mandat_gold_2 <= 3 && $count_2 <= 4) {
                            $recom_gold = "READY NOW";
                        } else {
                            $recom_gold = "READY WITH DEVELOPMENT";
                        }
                    } else if ($count_strength >= 7 && $count_strength <= 8 && $count_1 == 0) {
                        if ($count_mandat_gold_2 <= 3 && $count_2 <= 6) {
                            $recom_gold = "READY WITH DEVELOPMENT";
                        } else {
                            $recom_gold = "NOT READY";
                        }
                    } else {
                        $recom_gold = "NOT READY";
                    }

                    //SILVER
                    if ($count_strength >= 7 && $count_1 == 0) {
                        if ($count_mandat_silver_2 <= 3 && $count_2 <= 6 && $count_1 == 0) {
                            $recom_silver = "READY NOW";
                        } else {
                            $recom_silver = "READY WITH DEVELOPMENT";
                        }
                    } else if ($count_strength == 6 && $count_1 == 0) {
                        if ($count_mandat_silver_2 <= 3 && $count_2 <= 7) {
                            $recom_silver = "READY WITH DEVELOPMENT";
                        } else {
                            $recom_silver = "NOT READY";
                        }
                    } else {
                        $recom_silver = "NOT READY";
                    }

                    //BRONZE
                    if ($count_strength >= 6 && $count_1 == 0) {
                        if ($count_mandat_bronze_2 <= 3 && $count_2 <= 7) {
                            $recom_bronze = "READY NOW";
                        } else {
                            $recom_bronze = "READY WITH DEVELOPMENT";
                        }
                        //} else if ($count_strength == 5 && $count_1 <= 1) {
                    } else if ($count_strength >= 5 && $count_1 <= 1) {
                        if ($count_mandat_bronze_2 <= 4 && $count_2 <= 8 && $count_mandat_bronze_1 == 0) {
                            $recom_bronze = "READY WITH DEVELOPMENT";
                        } else {
                            $recom_bronze = "NOT READY";
                        }
                    } else {
                        $recom_bronze = "NOT READY";
                    }

                    //BUSOL
//                    if ($count_busol_strength >= 8) {
//                        if ($count_mandat_busol_2 <= 2 && $count_busol_2 <= 2) {
//                            $recom_busol = "READY NOW";
//                        } else {
//                            $recom_busol = "READY WITH DEVELOPMENT";
//                        }
//                    } else if ($count_busol_strength >= 5 && $count_busol_strength <= 7) {
//                        if ($count_mandat_busol_2 <= 1 && $count_busol_2 >= 2 && $count_busol_2 <= 3) {
//                            $recom_busol = "READY WITH DEVELOPMENT";
//                        } else {
//                            $recom_busol = "NOT READY";
//                        }
//                    } else {
//                        $recom_busol = "NOT READY";
//                    }
                    if ($count_busol_strength >= 7 && $count_busol_strength <= 8) {
                        if ($count_mandat_busol_2 <= 1 && $count_busol_2 <= 1) {
                            $recom_busol = "READY NOW";
                        } else {
                            $recom_busol = "READY WITH DEVELOPMENT";
                        }
                    } else if ($count_busol_strength >= 4 && $count_busol_strength <= 6) {
                        if ($count_busol_2 >= 2 && $count_busol_2 <= 4) {
                            $recom_busol = "READY WITH DEVELOPMENT";
                        } else {
                            $recom_busol = "NOT READY";
                        }
                    } else {
                        $recom_busol = "NOT READY";
                    }
                }

                $final_platinum = "";
                $final_gold = "";
                $final_silver = "";
                $final_bronze = "";
                $final_busol = "";

                //PLATINUM
                if ($recom_platinum == "READY NOW") {
                    if ($hats_platinum == "PROBABLE FIT") {
                        $final_platinum = "READY NOW";
                    } else if ($hats_platinum == "POSSIBLE FIT") {
                        $final_platinum = "READY WITH DEVELOPMENT (2)";
                    } else if ($hats_platinum == "UNLIKELY FIT") {
                        $final_platinum = "READY WITH COUNSELING (1)";
                    }
                } else if ($recom_platinum == "READY WITH DEVELOPMENT") {
                    if ($hats_platinum == "PROBABLE FIT") {
                        $final_platinum = "READY WITH DEVELOPMENT (1)";
                    } else if ($hats_platinum == "POSSIBLE FIT") {
                        $final_platinum = "READY WITH DEVELOPMENT (3)";
                    } else if ($hats_platinum == "UNLIKELY FIT") {
                        $final_platinum = "READY WITH COUNSELING (2)";
                    }
                } else if ($recom_platinum == "NOT READY") {
                    $final_platinum = "NOT READY AT THIS TIME";
                }

                //gold
                if ($recom_gold == "READY NOW") {
                    if ($hats_gold == "PROBABLE FIT") {
                        $final_gold = "READY NOW";
                    } else if ($hats_gold == "POSSIBLE FIT") {
                        $final_gold = "READY WITH DEVELOPMENT (2)";
                    } else if ($hats_gold == "UNLIKELY FIT") {
                        $final_gold = "READY WITH COUNSELING (1)";
                    }
                } else if ($recom_gold == "READY WITH DEVELOPMENT") {
                    if ($hats_gold == "PROBABLE FIT") {
                        $final_gold = "READY WITH DEVELOPMENT (1)";
                    } else if ($hats_gold == "POSSIBLE FIT") {
                        $final_gold = "READY WITH DEVELOPMENT (3)";
                    } else if ($hats_gold == "UNLIKELY FIT") {
                        $final_gold = "READY WITH COUNSELING (2)";
                    }
                } else if ($recom_gold == "NOT READY") {
                    $final_gold = "NOT READY AT THIS TIME";
                }

                //silver
                if ($recom_silver == "READY NOW") {
                    if ($hats_silver == "PROBABLE FIT") {
                        $final_silver = "READY NOW";
                    } else if ($hats_silver == "POSSIBLE FIT") {
                        $final_silver = "READY WITH DEVELOPMENT (2)";
                    } else if ($hats_silver == "UNLIKELY FIT") {
                        $final_silver = "READY WITH COUNSELING (1)";
                    }
                } else if ($recom_silver == "READY WITH DEVELOPMENT") {
                    if ($hats_silver == "PROBABLE FIT") {
                        $final_silver = "READY WITH DEVELOPMENT (1)";
                    } else if ($hats_silver == "POSSIBLE FIT") {
                        $final_silver = "READY WITH DEVELOPMENT (3)";
                    } else if ($hats_silver == "UNLIKELY FIT") {
                        $final_silver = "READY WITH COUNSELING (2)";
                    }
                } else if ($recom_silver == "NOT READY") {
                    $final_silver = "NOT READY AT THIS TIME";
                }

                //bronze
                if ($recom_bronze == "READY NOW") {
                    if ($hats_bronze == "PROBABLE FIT") {
                        $final_bronze = "READY NOW";
                    } else if ($hats_bronze == "POSSIBLE FIT") {
                        $final_bronze = "READY WITH DEVELOPMENT (2)";
                    } else if ($hats_bronze == "UNLIKELY FIT") {
                        $final_bronze = "READY WITH COUNSELING (1)";
                    }
                } else if ($recom_bronze == "READY WITH DEVELOPMENT") {
                    if ($hats_bronze == "PROBABLE FIT") {
                        $final_bronze = "READY WITH DEVELOPMENT (1)";
                    } else if ($hats_bronze == "POSSIBLE FIT") {
                        $final_bronze = "READY WITH DEVELOPMENT (3)";
                    } else if ($hats_bronze == "UNLIKELY FIT") {
                        $final_bronze = "READY WITH COUNSELING (2)";
                    }
                } else if ($recom_bronze == "NOT READY") {
                    $final_bronze = "NOT READY AT THIS TIME";
                }

                //busol
                if ($recom_busol == "READY NOW") {
                    if ($hats_busol == "PROBABLE FIT") {
                        $final_busol = "READY NOW";
                    } else if ($hats_busol == "POSSIBLE FIT") {
                        $final_busol = "READY WITH DEVELOPMENT (2)";
                    } else if ($hats_busol == "UNLIKELY FIT") {
                        $final_busol = "READY WITH COUNSELING (1)";
                    }
                } else if ($recom_busol == "READY WITH DEVELOPMENT") {
                    if ($hats_busol == "PROBABLE FIT") {
                        $final_busol = "READY WITH DEVELOPMENT (1)";
                    } else if ($hats_busol == "POSSIBLE FIT") {
                        $final_busol = "READY WITH DEVELOPMENT (3)";
                    } else if ($hats_busol == "UNLIKELY FIT") {
                        $final_busol = "READY WITH COUNSELING (2)";
                    }
                } else if ($recom_busol == "NOT READY") {
                    $final_busol = "NOT READY AT THIS TIME";
                }

                $arr_data[$j]['U'] = $recom_platinum;
                $arr_data[$j]['V'] = $recom_gold;
                $arr_data[$j]['W'] = $recom_silver;
                $arr_data[$j]['X'] = $recom_bronze;
                $arr_data[$j]['Y'] = $recom_busol;


                $arr_data[$j]['Z'] = $final_platinum;
                $arr_data[$j]['AA'] = $final_gold;
                $arr_data[$j]['AB'] = $final_silver;
                $arr_data[$j]['AC'] = $final_bronze;
                $arr_data[$j]['AD'] = $final_busol;
            }

            $data['header'] = $header;
            $data['values'] = $arr_data;
            $data['rating'] = $rating;
            //exit;
            $data = array(
                'rekap' => $arr_data,
                'judul' => "Company Type",
                'subjudul' => "List company type",
            );

//            exit;
            $this->template->load('template', 'reportam_list', $data);
        }
    }

    public function export_xls() {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('rekap');
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $filename = 'rekap.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function read($id) {
        $row = $this->Company_type_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_company_type' => $row->id_company_type,
                'company_type' => $row->company_type,
                'is_deleted' => $row->is_deleted,
                'judul' => "Company Type",
                'subjudul' => "Detail company type",
            );
            $this->template->load('template', 'company_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('company_type/create_action'),
            'id_company_type' => set_value('id_company_type'),
            'company_type' => set_value('company_type'),
            'is_deleted' => 0,
            'judul' => "Company Type",
            'subjudul' => "Tambah company type",
        );
        $this->template->load('template', 'company_type_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'company_type' => $this->input->post('company_type', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('company_type'));
        }
    }

    public function update($id) {
        $row = $this->Company_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('company_type/update_action'),
                'id_company_type' => set_value('id_company_type', $row->id_company_type),
                'company_type' => set_value('company_type', $row->company_type),
                'is_deleted' => set_value('is_deleted', $row->is_deleted),
                'judul' => "Company Type",
                'subjudul' => "Edit company type",
            );
            $this->template->load('template', 'company_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_company_type', TRUE));
        } else {
            $data = array(
                'company_type' => $this->input->post('company_type', TRUE),
                'is_deleted' => $this->input->post('is_deleted', TRUE),
            );

            $this->Company_type_model->update($this->input->post('id_company_type', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('company_type'));
        }
    }

    public function delete($id) {
        $row = $this->Company_type_model->get_by_id($id);

        if ($row) {
            $this->Company_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('company_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company_type'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('company_type', 'company type', 'trim|required');
        $this->form_validation->set_rules('is_deleted', 'is deleted', 'trim|required');

        $this->form_validation->set_rules('id_company_type', 'id_company_type', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function export() {
        if ($this->input->post('excel')) {
            $data = unserialize($this->input->post('rekap'));
            $this->excel($data);
        } else if ($this->input->post('word')) {
            $data = unserialize($this->input->post('rekap'));
        } else if ($this->input->post('pdf')) {
            $data = unserialize($this->input->post('rekap'));
        }
    }

    public function excel($data) {
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('rekap');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'REKAPITULASI HASIL ASSESSMENT');
        $this->excel->getActiveSheet()->setCellValue('A2', 'JOB TARGET : ');
        $this->excel->getActiveSheet()->setCellValue('A3', 'ANGKATAN : ');
        //change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:W1');
        $this->excel->getActiveSheet()->mergeCells('A2:W2');
        $this->excel->getActiveSheet()->mergeCells('A3:W3');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A5', 'NO');
        $this->excel->getActiveSheet()->mergeCells('A5:A6');
        $this->excel->getActiveSheet()->setCellValue('B5', 'NAMA');
        $this->excel->getActiveSheet()->mergeCells('B5:B6');
        $this->excel->getActiveSheet()->setCellValue('C5', 'NIK');
        $this->excel->getActiveSheet()->mergeCells('C5:C6');
        $this->excel->getActiveSheet()->setCellValue('D5', 'ANGKATAN');
        $this->excel->getActiveSheet()->mergeCells('D5:D6');
        $this->excel->getActiveSheet()->setCellValue('E5', 'TANGGAL');
        $this->excel->getActiveSheet()->mergeCells('E5:E6');
        $this->excel->getActiveSheet()->setCellValue('F5', 'KOMPETENSI');
        $this->excel->getActiveSheet()->mergeCells('F5:R5');
        $this->excel->getActiveSheet()->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->setCellValue('S5', 'HATS');
        $this->excel->getActiveSheet()->mergeCells('S5:T5');
        $this->excel->getActiveSheet()->getStyle('S5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('F6', 'NET');
        $this->excel->getActiveSheet()->setCellValue('G6', 'BAC');
        $this->excel->getActiveSheet()->setCellValue('H6', 'AT');
        $this->excel->getActiveSheet()->setCellValue('I6', 'BP');
        $this->excel->getActiveSheet()->setCellValue('J6', 'AO');
        $this->excel->getActiveSheet()->setCellValue('K6', 'TW');
        $this->excel->getActiveSheet()->setCellValue('L6', 'RT');
        $this->excel->getActiveSheet()->setCellValue('M6', 'CREA');
        $this->excel->getActiveSheet()->setCellValue('N6', 'PRE');
        $this->excel->getActiveSheet()->setCellValue('O6', 'TFS');
        $this->excel->getActiveSheet()->setCellValue('P6', 'CT');
        $this->excel->getActiveSheet()->setCellValue('Q6', 'NEG');
        $this->excel->getActiveSheet()->setCellValue('R6', 'AM');
        $this->excel->getActiveSheet()->setCellValue('S6', 'AM');
        $this->excel->getActiveSheet()->setCellValue('T6', 'BUSOL');

        $this->excel->getActiveSheet()->setCellValue('U5', 'PLATINUM');
        $this->excel->getActiveSheet()->mergeCells('U5:U6');
        $this->excel->getActiveSheet()->setCellValue('V5', 'GOLD');
        $this->excel->getActiveSheet()->mergeCells('V5:V6');
        $this->excel->getActiveSheet()->setCellValue('W5', 'SILVER');
        $this->excel->getActiveSheet()->mergeCells('W5:W6');
        $this->excel->getActiveSheet()->setCellValue('X5', 'BRONZE');
        $this->excel->getActiveSheet()->mergeCells('X5:X6');
        $this->excel->getActiveSheet()->setCellValue('Y5', 'BUSOL');
        $this->excel->getActiveSheet()->mergeCells('Y5:Y6');
        $this->excel->getActiveSheet()->setCellValue('Z5', 'FINAL PLATINUM');
        $this->excel->getActiveSheet()->mergeCells('Z5:Z6');
        $this->excel->getActiveSheet()->setCellValue('AA5', 'FINAL GOLD');
        $this->excel->getActiveSheet()->mergeCells('AA5:AA6');
        $this->excel->getActiveSheet()->setCellValue('AB5', 'FINAL SILVER');
        $this->excel->getActiveSheet()->mergeCells('AB5:AB6');
        $this->excel->getActiveSheet()->setCellValue('AC5', 'FINAL BRONZE');
        $this->excel->getActiveSheet()->mergeCells('AC5:AC6');
        $this->excel->getActiveSheet()->setCellValue('AD5', 'FINAL BUSOL');
        $this->excel->getActiveSheet()->mergeCells('AD5:AD6');

        $urut = 7;
        foreach ($data as $row) {
            $this->excel->getActiveSheet()->setCellValue('A' . $urut, $row['A']);
            $this->excel->getActiveSheet()->setCellValue('B' . $urut, $row['B']);
            $this->excel->getActiveSheet()->setCellValue('C' . $urut, $row['C']);
            $this->excel->getActiveSheet()->setCellValue('D' . $urut, $row['D']);
            $this->excel->getActiveSheet()->setCellValue('E' . $urut, $row['E']);
            $this->excel->getActiveSheet()->setCellValue('F' . $urut, $row['F']);
            $this->excel->getActiveSheet()->setCellValue('G' . $urut, $row['G']);
            $this->excel->getActiveSheet()->setCellValue('H' . $urut, $row['H']);
            $this->excel->getActiveSheet()->setCellValue('I' . $urut, $row['I']);
            $this->excel->getActiveSheet()->setCellValue('J' . $urut, $row['J']);
            $this->excel->getActiveSheet()->setCellValue('K' . $urut, $row['K']);
            $this->excel->getActiveSheet()->setCellValue('L' . $urut, $row['L']);
            $this->excel->getActiveSheet()->setCellValue('M' . $urut, $row['M']);
            $this->excel->getActiveSheet()->setCellValue('N' . $urut, $row['N']);
            $this->excel->getActiveSheet()->setCellValue('O' . $urut, $row['O']);
            $this->excel->getActiveSheet()->setCellValue('P' . $urut, $row['P']);
            $this->excel->getActiveSheet()->setCellValue('Q' . $urut, $row['Q']);
            $this->excel->getActiveSheet()->setCellValue('R' . $urut, $row['R']);
            $this->excel->getActiveSheet()->setCellValue('S' . $urut, $row['S']);
            $this->excel->getActiveSheet()->setCellValue('T' . $urut, $row['T']);
            $this->excel->getActiveSheet()->setCellValue('U' . $urut, $row['U']);
            $this->excel->getActiveSheet()->setCellValue('V' . $urut, $row['V']);
            $this->excel->getActiveSheet()->setCellValue('W' . $urut, $row['W']);
            $this->excel->getActiveSheet()->setCellValue('X' . $urut, $row['X']);
            $this->excel->getActiveSheet()->setCellValue('Y' . $urut, $row['Y']);
            $this->excel->getActiveSheet()->setCellValue('Z' . $urut, $row['Z']);
            $this->excel->getActiveSheet()->setCellValue('AA' . $urut, $row['AA']);
            $this->excel->getActiveSheet()->setCellValue('AB' . $urut, $row['AB']);
            $this->excel->getActiveSheet()->setCellValue('AC' . $urut, $row['AC']);
            $this->excel->getActiveSheet()->setCellValue('AD' . $urut, $row['AD']);

            $urut++;
        }

        $filename = 'rekap.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function excel2($data) {
        $this->load->helper('exportexcel');
        $namaFile = "rekapsss.xls";
        $judul = "company_type";
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
        xlsWriteLabel($tablehead, $kolomhead++, "NO");
        xlsWriteLabel($tablehead, $kolomhead++, "NAMA");
        xlsWriteLabel($tablehead, $kolomhead++, "NIK");
        xlsWriteLabel($tablehead, $kolomhead++, "ANGKATAN");
        xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
        xlsWriteLabel($tablehead, $kolomhead++, "KOMPETENSI");
        xlsWriteLabel($tablehead, $kolomhead++, "PLATINUM");
        xlsWriteLabel($tablehead, $kolomhead++, "GOLD");
        xlsWriteLabel($tablehead, $kolomhead++, "SILVER");

        foreach ($data as $row) {
            $kolombody = 0;
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $row['B']);
            xlsWriteLabel($tablebody, $kolombody++, $row['C']);
            xlsWriteLabel($tablebody, $kolombody++, $row['D']);
            xlsWriteLabel($tablebody, $kolombody++, $row['E']);
            xlsWriteLabel($tablebody, $kolombody++, $row['F']);
            xlsWriteLabel($tablebody, $kolombody++, $row['G']);
            xlsWriteLabel($tablebody, $kolombody++, $row['H']);
            xlsWriteLabel($tablebody, $kolombody++, $row['I']);
            xlsWriteLabel($tablebody, $kolombody++, $row['J']);
            xlsWriteLabel($tablebody, $kolombody++, $row['K']);
            xlsWriteLabel($tablebody, $kolombody++, $row['L']);
            xlsWriteLabel($tablebody, $kolombody++, $row['M']);
            xlsWriteLabel($tablebody, $kolombody++, $row['N']);
            xlsWriteLabel($tablebody, $kolombody++, $row['O']);
            xlsWriteLabel($tablebody, $kolombody++, $row['P']);
            xlsWriteLabel($tablebody, $kolombody++, $row['Q']);
            xlsWriteLabel($tablebody, $kolombody++, $row['R']);
            xlsWriteLabel($tablebody, $kolombody++, $row['S']);
            xlsWriteLabel($tablebody, $kolombody++, $row['T']);
            xlsWriteLabel($tablebody, $kolombody++, $row['U']);
            xlsWriteLabel($tablebody, $kolombody++, $row['V']);
            xlsWriteLabel($tablebody, $kolombody++, $row['W']);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=company_type.doc");

        $data = array(
            'company_type_data' => $this->Company_type_model->get_all(),
            'start' => 0
        );

        $this->load->view('company_type_doc', $data);
    }

    function pdf() {
        $data = array(
            'company_type_data' => $this->Company_type_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('company_type_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('company_type.pdf', 'D');
    }

}

/* End of file Company_type.php */
/* Location: ./application/controllers/Company_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-31 08:06:21 */
/* http://harviacode.com */