<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C4 extends MY_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->model('C4_model');
        $this->load->model('Calllog_model');
        $this->load->library('session');
        $this->load->helper("file");
    }

    public function index() {
        $this->setRole(array('admin'));

        $page = (int) $this->input->get('page');
        $limit = $this->config->item('limit_on_page');
        $total = $this->C4_model->get3MonthsAgo();
        $totalPage = $total[0]['total'];
        $maxPage = ceil($totalPage/$limit);
        $page = ($page <= 1) ? 1 : $page;
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;
        $data = $this->C4_model->get3MonthsAgo($offset, $limit, false);
   
        $this->data['pageTitle'] = 'CRM Admin - Danh sách học viên';
        $this->data['data'] = $data;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->render('c4/index');
    }


    public function import() {
        $this->C4_model->get_recordIsNull();
        echo 'Loading...';
    }

    public function view_list() {
        $this->setRole(array('staff'));

        $search = $this->input->get('search');
        $user_id = $this->session->userdata['user_id'];
        $page = (int) $this->input->get('page');
        $limit = $this->config->item('limit_on_page');
        $total = $this->C4_model->get_3dayago($user_id, 0, 30, true, $search);
       
        $totalPage = $total[0]['total'];
        $maxPage = ceil($totalPage/$limit);
        $page = ($page <= 1) ? 1 : $page;
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $data = $this->C4_model->get_3dayago($user_id, $offset, $limit, false,$search);
        $this->data['pageTitle'] = 'CRM Admin - Danh sách học viên';
        $this->data['data'] = $data;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->data['search'] = $search;
        $this->render('c4/view_list');
    }

    public function edit($id = null) {
        $this->setRole(array('staff'));

        $user_id = $this->session->userdata['user_id'];
        $data = $this->C4_model->getUser($id, $user_id);
        if(empty($data)) {
            redirect('c4/view_list');
        }

        $level = $this->C4_model->getAllLevel();
        $status = $this->C4_model->getAllStatus();
        $hedaotao = array(
            "Đại học vừa học vừa làm",
            "Cao đẳng lên Đại học vừa học vừa làm",
            "Trung cấp lên Đại học vừa học vừa làm",
            "Văn bằng 2 vừa học vừa làm",
            "Cao học",
            "Cao đẳng vừa học vừa làm",
            "Cao đẳng nghề lên Đại học",
            "Chứng chỉ ngắn hạn",
            "Từ xa",
            "Đại học chính quy",
            "Cao đẳng chính quy",
            "Trung cấp chính quy"
        );

        $TrinhDo = array(
            "Trung học phổ thông",
            "Trung học chuyên nghiệp",
            "Trung cấp  nghề",
            "Cao đẳng",
            "Cao đẳng nghề",
            "Đại học",
            "Sau Đại học"
        );


        $dataCallogs = $this->C4_model->callLog($this->USER_ID, $id);
        $this->data['dataCallogs'] = $dataCallogs;

        $this->data['TrinhDo'] = $TrinhDo;
        $this->data['HeDaoTao'] = $hedaotao;
        $this->data['data'] = $data;
        $this->data['level'] = $level;
        $this->data['status'] = $status;
        $this->data['listSchools'] = $this->config->item('school_name');
        // echo '<pre>'.print_r($data,true).'</pre>';die;
        $this->render('c4/edit');
    }

    private function convertDate($date) {
        if(!empty($date)) {
            $tmp = explode('/', $date);
            $mysqlDate = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            return date('Y-m-d H:i:s', strtotime($mysqlDate));
        } else {
            return $date;
        }
    }

    public function update() {
        $this->setRole(array('staff'));

        $params = $this->input->post();
        
        $params['dteNextDate'] = $this->convertDate($params['dteNextDate']);
        $calllog = array(
            'calllog'       => $params['calllog'],
            'dte_datevisit' => date('Y-m-d H:i:s'),
            'dte_checkin'   => $params['dte_checkin'],
            'level_id'      => $params['level_id'],
            'user_id'       => $this->session->userdata['user_id'],
            'status_id'     => $params['status_id'],
            'c4_id'         => $params['c4_id'],
            'dteNextDate'   => $params['dteNextDate']
        );

        $params['last_calllog'] = $params['calllog'];
        $params['NgaySinh'] = $this->convertDate($params['NgaySinh']);
        $params['NgayCap'] = $this->convertDate($params['NgayCap']);

        $id = $params['c4_id'];
        unset($params['c4_id']);
        unset($params['callog_id']);
        unset($params['c3_datereg']);
        unset($params['page']);
        unset($params['calllog']);
        unset($params['user_id']);
        unset($params['truohng']);
        unset($params['SP']);
        unset($params['khuvuc']);
        unset($params['dte_checkin']);

        $params['dte_datevisit'] = date('Y-m-d H:i:s');
        $this->Calllog_model->insert($calllog);
        if($params['status_id'] == '1' && in_array($params['level_id'], array('1','2','3','4','5','6','8','9','10','11'))) {
            // Remove user id - Không gọi điện nữa
            $params['user_id'] = '';
            $params['created_by'] = 'status-1-'.$this->USER_ID;
        }

        if($this->C4_model->updateData($id, $params)) {
            $this->session->set_flashdata('is_error', false);
            $this->session->set_flashdata('message', 'Cập nhật thông tin thành công');
            redirect('c4/view_list');
        } else {
            $this->session->set_flashdata('is_error', true);
            $this->session->set_flashdata('message', 'Cập nhật thông tin thất bại');
            redirect('c4/edit/'.$id);
        }
    }

    public function export(){
        $this->setRole(array('admin'));

        ini_set('memory_limit', '128M');

        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->C4_model->getAllRecord();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // echo '<pre>'.print_r($empInfo, true).'</pre>';die;
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Ngày đăng kí');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ tên');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Số điện thoại');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngành đăng kí');    
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Bằng cấp cao nhất');   
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Địa chỉ nơi ở');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Trường');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Sản phẩm');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Khu vực');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Level');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Tình Trạng');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Ngày cập nhật cuối cùng');   
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Ngày gọi tiếp theo');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Ghi chú');
        
        // set Row
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));
            $sheet = $objPHPExcel->getActiveSheet();
            $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);
            foreach ($cellIterator as $cell) {
                $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
            }
        }

        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, !empty($element['c3_datereg']) ? date('d/m/Y', strtotime($element['c3_datereg'])) : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, !empty($element['c3_name']) ? $element['c3_name'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, !empty($element['c3_tel']) ? $element['c3_tel'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, !empty($element['c3_email']) ? $element['c3_email'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, !empty($element['c3_nganhdangky']) ? $element['c3_nganhdangky'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, !empty($element['c3_bangcapcaonhat']) ? $element['c3_bangcapcaonhat'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, !empty($element['c3_diachinoio']) ? $element['c3_diachinoio'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, !empty($element['truong']) ? $element['truong'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, !empty($element['SP']) ? $element['SP'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, !empty($element['khuvuc']) ? $element['khuvuc'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, !empty($element['level_name']) ? $element['level_name'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, !empty($element['status_name']) ? $element['status_name'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, !empty($element['dte_datevisit']) ? date('d/m/Y', strtotime($element['dte_datevisit'])) : '');
            $dtNextDate = (!empty($element['dteNextDate']) && $element['dteNextDate'] != '9999-12-31 00:00:00') ? date('d/m/Y', strtotime($element['dteNextDate'])) : '';
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $dtNextDate);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, !empty($element['last_calllog']) ? $element['last_calllog'] : '');
            $rowCount++;
        }
        

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename='.$fileName);
        $objWriter->save('php://output');
    }

    // create xlsx
    public function createXLS() {
        $this->setRole(array('admin'));
        
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $user_id = $this->session->userdata['user_id'];
        $empInfo = $this->C4_model->get_3dayago($user_id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Ngày đăng kí');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Họ tên');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Số điện thoại');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Ngành đăng kí');    
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Bằng cấp cao nhất');   
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Địa chỉ nơi ở');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Trường');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Sản phẩm');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Khu vực');   
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Ghi chú');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Ngày cập nhật cuối');   
        // set Row
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));
            $sheet = $objPHPExcel->getActiveSheet();
            $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);
            foreach ($cellIterator as $cell) {
                $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
            }
        }

        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, !empty($element['c3_datereg']) ? date('d/m/Y', strtotime($element['c3_datereg'])) : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, !empty($element['c3_name']) ? $element['c3_name'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, !empty($element['c3_tel']) ? $element['c3_tel'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, !empty($element['c3_email']) ? $element['c3_email'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, !empty($element['c3_nganhdangky']) ? $element['c3_nganhdangky'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, !empty($element['c3_bangcapcaonhat']) ? $element['c3_bangcapcaonhat'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, !empty($element['c3_diachinoio']) ? $element['c3_diachinoio'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, !empty($element['truong']) ? $element['truong'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, !empty($element['SP']) ? $element['SP'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, !empty($element['khuvuc']) ? $element['khuvuc'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, !empty($element['last_calllog']) ? $element['last_calllog'] : '');
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, !empty($element['dte_datevisit']) ? date('d/m/Y', strtotime($element['dte_datevisit'])) : '');
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        // $objWriter->save($this->config->item('upload_path').'excel/'.$fileName);
        
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename='.$fileName);
        $objWriter->save('php://output');

        // unlink($this->config->item('upload_path').'excel/'.$fileName);
        // download file        // /redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);         
    }

    public function call_log($callog_id = null) {
        $this->setRole(array('staff'));

        $data = $this->C4_model->callLog($this->USER_ID, $callog_id);
   
        $this->data['pageTitle'] = 'CRM Admin - Nhật ký cuộc gọi';
        $this->data['data'] = $data;

        $this->render('c4/call_log');
    }
}