<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {

    public $USER_ID;
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('C3_model');
        $this->load->model('C4_model');
    }

    public function create_c4() {

        set_time_limit(20 * 60);
        echo 'Starting...';
        $listC3ByUser = $this->C3_model->getContactByUser();

        if(!empty($listC3ByUser)) {
            foreach($listC3ByUser as $c3) {
                $params = array(
                    'c3_id' => $c3['c3_id'],
                    'c3_name' => $c3['c3_name'],
                    'c3_tel' => $c3['c3_tel'],
                    'c3_email' => $c3['c3_email'],
                    'c3_datereg' => $c3['c3_datereg'],
                    'c3_nganhdangky' => $c3['c3_nganhdangky'],
                    'c3_bangcapcaonhat' => $c3['c3_bangcapcaonhat'],
                    'TruongChamSoc' => $c3['c3_truongdangky'],
                    'Dia_Chi_Noi_O' => $c3['c3_diachinoio'],
                    'ghi_chu' => $c3['ghi_chu'],
                    'user_id' => $c3['c3_user_id'],
                    'last_c3_datereg' => date('Y-m-d H:i:s')
                );
                $this->C4_model->insert($params);
            }
        }

        $listC3 = $this->C3_model->getContactRegisted();
        $users = $this->User_model->getAllStaff();

        $listUserByGroup = array();
        foreach($users as $user) {
            $groups = explode('.', TRIM($user['group_name']));
            $user_id = $user['user_id'];
            foreach($groups as $group) {
                $listUserByGroup[$group][] = $user_id;
            }
        }

        $listC3BySchool = array();
        foreach($listC3 as $c3) {
            $listC3BySchool[$c3['truong']][] = $c3;
        }

        foreach($listC3BySchool as $school => $data) {
            $cntC3 = count($data);
            $index = 0;
            if(isset($listUserByGroup[$school])) {
                $arrUserIds = $listUserByGroup[$school];
                $cntUser = count($arrUserIds);
                foreach($data as $item) {
                    if($index >= $cntUser) {
                        $index = 0;
                    }
                    $item['c3_tel'] = $item['tel_new'];
                    $item['Dia_Chi_Noi_O'] = $item['c3_diachinoio'];
                    unset($item['c3_nguon']);
                    unset($item['nguon_new']);
                    unset($item['tel_new']);
                    $item['last_c3_datereg'] = date('Y-m-d H:i:s');
                    $item['user_id'] = $arrUserIds[$index++];

                    $this->C4_model->insert($item);
                }
                // echo '<pre>'.print_r($arrUserIds, true).'</pre>';
            } else {
                echo '<br/>';
                echo 'Khong ton tai Truong: '.$school;
            }
        }

        echo '<br/>';
        echo 'DONE';
        // echo '<pre>'.print_r($listUserByGroup, true).'</pre>';
        // echo '<pre>'.print_r($listC3BySchool, true).'</pre>';
    }

    public function create_c3() {
        $max_id = $this->config->item('max_tuyensinh_id');
        $data = $this->C3_model->getContactTuyensinh($max_id);
        echo 'Starting...';
        if(!empty($data)) {
            foreach($data as $row) {
                $params = array(
                    'tuyensinh_id' => $row['id'],
                    'c3_name' => $row['hoten'],
                    'c3_tel' => $row['dienthoai'],
                    'c3_email' => $row['email'],
                    'c3_datereg' => $row['reg_date'],
                    'c3_nganhdangky' => $row['nganhhoc'],
                    'c3_bangcapcaonhat' => $row['truongtotnghiep'],
                    'c3_diachinoio' => $row['diachi'],
                    'c3_nguon' => $row['nguon'],
                    'ghi_chu' => $row['ghi_chu']
                );
                $this->C3_model->insert($params);
            }
        }
        echo '<br/>';
        echo 'DONE';
    }

}