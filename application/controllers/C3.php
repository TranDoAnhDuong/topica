<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C3 extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('C3_model');
    }

    // public function index() {
    //     $data = $this->C3_model->get_all();
    //     $this->data['pageTitle'] = 'CRM Admin - Danh sách C3';
    //     $this->data['data'] = $data;
    //     $this->render('c3/index');
    // }
    
    public function add() {
        $this->data['listSchools'] = $this->config->item('school_name');
        $this->render('c3/addContact');
    }

    public function submitAddContact(){
        $params = $this->input->post();
        if(!empty($params)) {
            $params['c3_datereg'] = date('Y-m-d h:i:s');
            $params['c3_user_id'] = $this->USER_ID;
            if($this->C3_model->insert($params)) {
                $this->session->set_flashdata('is_error', false);
                $this->session->set_flashdata('message', 'Thêm contact thành công!');
            } else {
                $this->session->set_flashdata('is_error', true);
                $this->session->set_flashdata('message', 'Thêm contact thất bại.');
            }
            redirect('c3/add');
        } else {
            redirect('c4/view_list');
        }
    }

    public function import() {
        $this->render('c3/import');
    }
    
    private function importExcel($file_path) {
        require_once APPPATH . "third_party/PHPExcel/IOFactory.php";    
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true); //optional

        $objPHPExcel = $objReader->load($file_path);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $i = 2; // Ignore header
        foreach ($objWorksheet->getRowIterator() as $row) {
            $name = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();//column A
            $tel = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();//column B
            $email = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();//column C
            $courceName = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();//column D
            $source = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();//column E
            $ghi_chu = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();//column F

            // echo $name.'-'.$tel.'-'.$email.'-'.$courceName.'-'.$source;
            // echo '<br/>';

            $item = array(
                'c3_name' => $name,
                'c3_tel' => $tel,
                'c3_email' => $email,
                'c3_nganhdangky' => $courceName,
                'c3_nguon' => $source,
                'c3_datereg' => date('Y-m-d H:i:s'),
                'ghi_chu' => $ghi_chu
            );

            if(!empty($item['c3_name']) || !empty($item['c3_tel']) || !empty($item['c3_email']) || !empty($item['c3_nganhdangky'])) {
                $this->C3_model->insert($item);
            }

            $i++;
        }
    }

    public function do_import() {
        $csv_path = $this->config->item('upload_path').'c3_csv/';
        $filename = $_FILES['fileUpload']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext != 'csv' && $ext != 'xls' && $ext != 'xlsx') {
            $this->session->set_flashdata('is_error', true);
            $this->session->set_flashdata('message', 'Định dạng file không đúng. Vui lòng chọn file CSV hoặc Excel');
            redirect('/c3/import');
        } else {
            $new_file_name = uniqid().'.'.$ext;
            $file_path = $csv_path.$new_file_name;
            $index = 0;
            if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $file_path)) {
                if($ext == 'csv') {
                    $file = fopen($file_path, "r") or exit("Unable to open file!");
                    while (!feof($file)) {
                        $row = fgets($file);
                        $data = explode(',', $row);
                        // echo $row; die;
                        if($index > 0) {
                            //hoten  email dienthoai nganhhoc nguon
                            $item = array(
                                'c3_name' => $data[0],
                                'c3_tel' => $data[1] ,
                                'c3_email' => $data[2],
                                'c3_nganhdangky' => $data[3],
                                'c3_nguon' => $data[4],
                                'c3_datereg' => date('Y-m-d H:i:s'),
                                'ghi_chu' => $data[5]
                            );
                
                            if(!empty($item['c3_name']) || !empty($item['c3_tel']) || !empty($item['c3_email']) || !empty($item['c3_nganhdangky'])) {
                                $this->C3_model->insert($item);
                            }
                        }
                        $index++;
                    }
                    fclose($file);
                } else {
                    $this->importExcel($file_path);
                }

                delete_files($file_path, TRUE);
                $this->session->set_flashdata('is_error', false);
                $this->session->set_flashdata('message', 'Nhập dữ liệu thành công!');
                redirect('/c3/import');
            } else {
                $this->session->set_flashdata('is_error', true);
                $this->session->set_flashdata('message', 'Nhập dữ liệu không thành công. Vui lòng thử lại');
                redirect('/c3/import');
            }
        }
    }
}