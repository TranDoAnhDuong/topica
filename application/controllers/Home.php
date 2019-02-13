<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public $USER_ID;
    public function __construct(){
        parent::__construct();
        $this->load->model('C4_model');
        $this->load->library('session');
        $this->USER_ID = $this->session->userdata['user_id'];
    }

    public function index() {
       
        switch($this->ROLE_KEY) {
            case 'staff':
                $this->getDataStaff();
                break;
            case 'manager':
                $this->getDataManager();
                break;
            default:
                $this->getDataMarketer();
                break;
        }

        $this->render('home/index');
    }
    
    private function getDataStaff() {
        $user_id = $this->session->userdata['user_id'];       
        $data = array();
       
        $listLevel = $this->config->item('list_level');
        for($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', time() - $i * 86400);
            $notCall = $this->C4_model->notCall($user_id, $date);
            $dataOtherLevel = $this->C4_model->getOtherLevel($user_id, $date);

            $level = array();
            if(!empty($dataOtherLevel)) {
                foreach($dataOtherLevel as $item) {
                    $level[$item['level_name']] = $item['total_count'];
                }
            }

            $data[$date]['Unknow'] = $notCall[0]['total_count'];

            foreach($listLevel as $l) {
                $data[$date][$l] = (isset($level[$l])) ? $level[$l] : 0;
            }
        }

        $callInFuture = array();
        for($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', time() + $i * 86400);
            $total_count = $this->C4_model->callFuture($user_id, $date);  
            $count = $total_count[0]['total_count'];
            $callInFuture[$date] = $count;
        }

        $this->data['callInFuture'] = $callInFuture;
        $this->data['data'] = $data;
    }

    private function getDataManager() {
        $data = array();
        $user_id = $this->session->userdata['user_id'];
        $listLevel = $this->config->item('list_level');
        for($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', time() - $i * 86400);
            $notCall = $this->C4_model->notCallManager( $user_id, $date);
            $dataOtherLevel = $this->C4_model->getOtherLevelManager($user_id, $date);

            $level = array();
            if(!empty($dataOtherLevel)) {
                foreach($dataOtherLevel as $item) {
                    $level[$item['level_name']] = $item['total_count'];
                }
            }

            $data[$date]['Unknow'] = $notCall[0]['total_count'];

            foreach($listLevel as $l) {
                $data[$date][$l] = (isset($level[$l])) ? $level[$l] : 0;
            }
        }
        $this->data['table2'] = $this->getDataManagerTable2($user_id);
        $this->data['table3'] = $this->getDataManagerTable3($user_id);
        $this->data['table4'] = $this->getDataManagerTable4($user_id);
        $this->data['data'] = $data;
    }

    private function getDataManagerTable2($user_id) {
        $data = array();
        $listUser = $this->C4_model->getAllUser($user_id);
        $listLevel = $this->config->item('list_level');
        for($i = 0; $i < count($listUser); $i++) {
            $notCall = $this->C4_model->notCallManagerMonth($listUser[$i]['user_id'], $user_id);
            $dataOtherLevel = $this->C4_model->getOtherLevelManagerMonth($listUser[$i]['user_id'], $user_id);
            $data[$listUser[$i]['user_id']]['name'] = $listUser[$i]['user_fullname'];
            $data[$listUser[$i]['user_id']]['username'] = $listUser[$i]['username'];
            $data[$listUser[$i]['user_id']]['user_id'] = $listUser[$i]['user_id'];

            $level = array();
            if(!empty($dataOtherLevel)) {
                foreach($dataOtherLevel as $item) {
                    $level[$item['level_name']] = $item['total_count'];
                }
            }

            $data[$listUser[$i]['user_id']]['Unknow'] = $notCall[0]['total_count'];
            foreach($listLevel as $l) {
                $data[$listUser[$i]['user_id']][$l] = (isset($level[$l])) ? $level[$l] : 0;
            }
        }

        return $data;
    }

    private function getDataManagerTable3($user_id) {
        $data = array();
        $listLevel = $this->config->item('list_level');
        $year = DATE('Y');
        $date = 0;
        for($i = 0; $i < 6; $i++) {
            $week = date("d/m/Y", strtotime('monday this week'.($i * -7).'days')).' - '.date("d/m/Y", strtotime('sunday this week'.( $i * -7).'days'));
            $notCall = $this->C4_model->notCallManagerWeeK( $user_id, $date, $year);
            $dataOtherLevel = $this->C4_model->getOtherLevelManagerWeeK($user_id, $date, $year);

            $level = array();
            if(!empty($dataOtherLevel)) {
                foreach($dataOtherLevel as $item) {
                    $level[$item['level_name']] = $item['total_count'];
                }
            }

            $data[$week]['Unknow'] = $notCall[0]['total_count'];

            foreach($listLevel as $l) {
                $data[$week][$l] = (isset($level[$l])) ? $level[$l] : 0;
            }
            $date += 7;
        }
        return $data;
    }

    private function getDataManagerTable4($user_id) {
        $data = array();
        $listLevel = $this->config->item('list_level');
        
        $month = 1;
        for($i = 0; $i < 3; $i++) {
            $title = date("m/Y",strtotime("-".$month." months"));
            $notCall = $this->C4_model->notCallManagerOtherMonth( $user_id, $month);
            $dataOtherLevel = $this->C4_model->getOtherLevelManagerOtherMonth($user_id, $month);

            $level = array();
            if(!empty($dataOtherLevel)) {
                foreach($dataOtherLevel as $item) {
                    $level[$item['level_name']] = $item['total_count'];
                }
            }

            $data[$title]['Unknow'] = $notCall[0]['total_count'];

            foreach($listLevel as $l) {
                $data[$title][$l] = (isset($level[$l])) ? $level[$l] : 0;
            }
            $month += 1;
        }
        return $data;
    }
    

    //function for table Marketer and admin
    private function getDataMarketer() {
        $user_id = $this->session->userdata['user_id'];
        $schools = $this->config->item('school_name');
        $sqlSchoolName = "'".implode("', '", $schools)."'";
        $data = array();
        $c3 = $this->C4_model->markekettable1("crm_c3","crm_c3.c3_nguon","crm_c3.c3_datereg");
        $c4 = $this->C4_model->markekettable1("crm_c4","crm_c4.SP","crm_c4.c3_datereg");
        $listLevel = $this->config->item('list_level');

        $breakCall = $this->C4_model->getLevelL1BreakCall($sqlSchoolName, $user_id, 2, 1);
        $dataOtherLevel = $this->C4_model->getOtherLevelMarketke($sqlSchoolName, $user_id, 2, 1);
        
        $dataC3 = array();
        foreach($c3 as $row) {
            $dataC3[$row['schoolName']] = $row['total_count'];
        }

        $dataC4 = array();
        foreach($c4 as $row) {
            $dataC4[$row['schoolName']] = $row['total_count'];
        }
        
        $break = array();
        foreach($breakCall as $row) {
            $break[$row['schoolName']] = $row['total_count'];
        }

        $dataOther = array();
        foreach($dataOtherLevel as $row) {
            $dataOther[$row['level_name'].$row['schoolName']] = $row['total_count'];
        }

        for($i = 0; $i < count($schools); $i++) {
            $schoolName = $schools[$i];
            $data[$schoolName]['L1'] = (isset($dataLevel1[$schoolName])) ? $dataLevel1[$schoolName] : 0;
            $data[$schoolName]['L1B'] = (isset($break[$schoolName])) ? $break[$schoolName] : 0;
            $data[$schoolName]['C3'] = (isset($dataC3[$schoolName])) ? $dataC3[$schoolName] : 0;
            $data[$schoolName]['C4'] = (isset($dataC4[$schoolName])) ? $dataC4[$schoolName] : 0;

            foreach($listLevel as $l) {
                $data[$schoolName][$l] = (isset($dataOther[$l.$schoolName])) ? $dataOther[$l.$schoolName] : 0;
            }
        }
        $this->data['data'] = $data;
        $this->data['datatable2'] = $this->getDataMarkeketTable2($user_id);        
        $this->data['datatable3'] = $this->getDataMarkeketTable3();
        
    }

    private function getDataMarkeketTable2($user_id){
        $schools = $this->config->item('channel_name');
        $sqlSchoolName = "'".implode("', '", $schools)."'";
        $data = array();
        $c3 = $this->C4_model->markekettable2("crm_c3","crm_c3.c3_nguon","crm_c3.c3_datereg");
        $c4 = $this->C4_model->markekettable2("crm_c4","crm_c4.SP","crm_c4.c3_datereg");

        $listLevel = $this->config->item('list_level');
        $breakCall = $this->C4_model->getLevelL1BreakCall($sqlSchoolName, $user_id, 3, 2);
        $dataOtherLevel = $this->C4_model->getOtherLevelMarketke($sqlSchoolName, $user_id, 3, 2);

        $dataC3 = array();
        foreach($c3 as $row) {
            $dataC3[$row['channelName']] = $row['total_count'];
        }
        $dataC4 = array();
        foreach($c4 as $row) {
            $dataC4[$row['channelName']] = $row['total_count'];
        }

        $break = array();
        foreach($breakCall as $row) {
            $break[$row['schoolName']] = $row['total_count'];
        }

        $dataOther = array();
        foreach($dataOtherLevel as $row) {
            $dataOther[$row['level_name'].$row['schoolName']] = $row['total_count'];
        }

        for($i = 0; $i < count($schools); $i++) {
            $schoolName = $schools[$i];
            $data[$schoolName]['L1'] = (isset($dataLevel1[$schoolName])) ? $dataLevel1[$schoolName] : 0;
            $data[$schoolName]['L1B'] = (isset($break[$schoolName])) ? $break[$schoolName] : 0;
            $data[$schoolName]['C3'] = (isset($dataC3[$schoolName])) ? $dataC3[$schoolName] : 0;
            $data[$schoolName]['C4'] = (isset($dataC4[$schoolName])) ? $dataC4[$schoolName] : 0;

            foreach($listLevel as $l) {
                $data[$schoolName][$l] = (isset($dataOther[$l.$schoolName])) ? $dataOther[$l.$schoolName] : 0;
            }
        }

        return $data;
    }

    private function getDataMarkeketTable3(){
        $data = $this->C4_model->markekettable3();
        $response = array();
        foreach($data as $row) {
            $response[$row['schoolName']] = $row['total_count'];
        }
        return $response;
    }

    public function view_list() {
        $page = (int) $this->input->get('page');
        $type = $this->input->get('type');
        $date = $this->input->get('date');
        $level = $this->input->get('level');

        $limit = $this->config->item('limit_on_page');
        $page = ($page <= 1 ) ? 1 : $page;

        $user_id = $this->USER_ID;
        $parent_id = $user_id;

        switch($type) {
            case 'm-1':
                $this->managerList1($page, $limit);
                break;

            case 'm-2':
                 $this->managerList2($page, $limit);
                break;

            case 'm-3':
                 $this->managerList3($page, $limit);
                break;

            case 'm-4':
                 $this->managerList4($page, $limit);
                break;

            case "mk-1":
                if($level == "c3") {
                    $result = $this->C4_model->dashboardMarketer('crm_c3', 'crm_c3.c3_nguon', 'crm_c3.c3_datereg', 2, 1);
                } else if($level == "c4") {
                    $result = $this->C4_model->dashboardMarketer('crm_c4', 'crm_c4.SP', 'crm_c4.c3_datereg', 2, 1);
                } else {
                    $result = $this->C4_model->detailLevelMarketer($level, $parent_id, 2, 1);
                }
                
                $i = 0;
                foreach($result as $row){
                    $data[$row['Name']][$i++] = $row;
                }

                $this->data['title'] = 'Tên Trường';
                $this->data['data'] = $data;
                break;

            case "mk-2":
                if($level == "c3") {
                    $result = $this->C4_model->dashboardMarketer('crm_c3', 'crm_c3.c3_nguon', 'crm_c3.c3_datereg', 3, 2);
                } else if($level == "c4") {
                    $result = $this->C4_model->dashboardMarketer('crm_c4', 'crm_c4.SP', 'crm_c4.c3_datereg', 3, 2);
                } else {
                    $result = $this->C4_model->detailLevelMarketer($level, $parent_id, 3, 2);
                }
                
                $i = 0;
                foreach($result as $row){
                    $data[$row['Name']][$i++] = $row;
                }

                $this->data['title'] = 'Tên Kênh';
                $this->data['data'] = $data;
                break;
                
            case "mk-3":
                 $result = $this->C4_model->dashboardMarketer('crm_c3', 'crm_c3.c3_nguon', 'crm_c3.c3_datereg', 3, 1);
                 
                 $i = 0;
                 foreach($result as $row){
                     $data[$row['Name']][$i++] = $row;
                 }

                 $this->data['title'] = 'Tên trường theo kênh';
                 $this->data['data'] = $data;
                 break;

            case 's-1':
                $type = 's-1';
                $totalPage = $this->C4_model->dashboardStaff($type, $user_id, $date, $level);     
                $maxPage = ceil($totalPage / $limit);
                $page = ($page > $maxPage) ? $maxPage : $page;
                $offset = ($page - 1) * $limit;
                $offset = ($offset < 0) ? 0 : $offset;

                $result = $this->C4_model->dashboardStaff($type, $user_id, $date, $level, $offset, $limit, false);
                // var_dump($result);
                
                $date = date('d/m/Y', strtotime($date));
                $data[$date] = $result;

                $this->data['title'] = 'Ngày gọi';
                $this->data['maxPage'] = $maxPage;
                $this->data['page'] = $page;
                $this->data['data'] = $data;
                break;

            case 's-2':
                $type = 's-2';
                $totalPage = $this->C4_model->dashboardStaff($type, $user_id, $date, $level);     
                $maxPage = ceil($totalPage / $limit);
                $page = ($page > $maxPage) ? $maxPage : $page;
                $offset = ($page - 1) * $limit;
                $offset = ($offset < 0) ? 0 : $offset;

                $result = $this->C4_model->dashboardStaff($type, $user_id, $date, $level, $offset, $limit, false);
                $date = date('d/m/Y', strtotime($date));
                $data[$date] = $result;

                $this->data['title'] = 'Ngày gọi';
                $this->data['maxPage'] = $maxPage;
                $this->data['page'] = $page;
                $this->data['data'] = $data;
                break;

            default:
                redirect('/');
                break;
        }
        
        $this->data['limit'] = $limit;
        $this->render('home/view_list');
    }

    private function managerList1($page, $limit) {
        $data = array();
        $level = $this->input->get('level');
        $date = $this->input->get('date');
        $user_id = $this->USER_ID;

        $totalPage = $this->C4_model->dashboardManager($user_id, $date, $level);
        $maxPage = ceil($totalPage / $limit);
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $result = $this->C4_model->dashboardManager($user_id, $date, $level, $offset, $limit, false);
        $level_title = (!empty($level)) ? $level : 'chưa gọi';
        if(!empty($date)){
            $date = date('d/m/Y', strtotime($date));
            $this->data['head_title'] = 'Danh sách '.$level_title.' của ngày: '.$date;
        }else{
            $this->data['head_title'] = 'Tổng danh sách '.$level_title;
        }

        $i = 0;
        foreach($result as $row){
            $data[$date][$i++] = $row;
        } 

        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->data['data'] = $data;
    }
    
    public function managerList2($page, $limit){
        $parent_id = $this->USER_ID;
        $listUser = $this->C4_model->getAllUser($parent_id);
        $level = $this->input->get('level');
        $user_id = $this->input->get('user_id');
        $data = array();

        $totalPage = $this->C4_model->dashboardManager2($parent_id, $user_id, $level);     
        $maxPage = ceil($totalPage / $limit);
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $result = $this->C4_model->dashboardManager2($parent_id, $user_id, $level, $offset, $limit, false);
        
        $i = 0;
        $user_name = '';
        foreach($result as $row) {
            if($i == 0) {
                $user_name = $row['user_fullname'].' ('.$row['username'].')';
            }
            $data[$row['user_id']][$i++] = $row;
        }

        $level_title = (!empty($level)) ? $level : 'Chưa gọi';
        $this->data['head_title'] = 'Danh sách '.$level_title.' của Nhân viên: '.$user_name;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->data['data'] = $data;
    }

    public function managerList3($page, $limit) {
        $parent_id = $this->USER_ID;
        $level = $this->input->get('level');
        $week = $this->input->get('week');
        $date = $this->input->get('date');
        $year = DATE('Y');
        $data = array();
        $totalPage = $this->C4_model->dashboardManager3($parent_id, $date, $year, $level);     
        $maxPage = ceil($totalPage / $limit);
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $result = $this->C4_model->dashboardManager3($parent_id, $date, $year, $level, $offset, $limit, false);
        foreach($result as $row){
            $data[$week] = $result;
        }

        $level_title = (!empty($level)) ? $level : 'Chưa gọi';
        $this->data['head_title'] = 'Danh sách '.$level_title.' của Tuần: '.$week;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->data['data'] = $data;
    }

    public function managerList4($page, $limit){
        $parent_id = $this->session->userdata['user_id'];
        $level = $this->input->get('level');
        $month = $this->input->get('month');
        $time = $this->input->get('time');

        $totalPage = $this->C4_model->dashboardManager4($parent_id, $month, $level);     
        $maxPage = ceil($totalPage / $limit);
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $data = array();
        $result = $this->C4_model->dashboardManager4($parent_id, $month, $level, $offset, $limit, false);
        foreach($result as $row){
            $data[$time] = $result;
        }

        $level_title = (!empty($level)) ? $level : 'Chưa gọi';
        $this->data['head_title'] = 'Danh sách '.$level_title.' của Tháng: '.$time;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->data['data'] = $data;
    }
}