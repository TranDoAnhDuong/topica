<?php
class C4_model extends CI_Model {

    public function insert($params) {
        return $this->db->insert('crm_c4', $params);
    }

    function get_recordIsNull(){
        $this->db->select('*')
        ->from('crm_c3')
        ->join('crm_c4', 'id = c4_id', 'left')
        ->where('crm_c4.c4_id IS NULL');

        $result = $this->db->get()->result_array();
        foreach($result as $row){
            $data = array(
                'c4_id'         => $row['c3_id'],
                'c3_name'       => $row['c3_name'],
                'c3_tel'        => $row['c3_tel'],
                'c3_email'      => $row['c3_email'],
                'c3_nganhdangky'=> $row['c3_nganhdangky'],
                'c3_datereg'    => $row['c3_datereg'],
                'c3_diachinoio' => $row['c3_diachinoio'],
                'c3_bangcapcaonhat' => $row['c3_bangcapcaonhat'],
                'SP' => $row['c3_nguon'],
            );

            $this->db->insert('crm_c4', $data);
        }
    }

    function get_all(){
        $this->db->select('*')
        ->from('crm_c4');
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    function get_3dayago($user_id, $offset = 0, $limit = 30, $isCount = true, $search){
        if($isCount) {
            $this->db->select('COUNT(*) as total');
        } else {
            $this->db->select("crm_c4.*, level_name, status_name");
        }

        $this->db->from('crm_c4');
        $this->db->join('crm_level', 'crm_c4.level_id = crm_level.level_id', 'left');
        $this->db->join('crm_status', 'crm_c4.status_id = crm_status.status_id', 'left');
        $this->db->where('crm_c4.user_id = '.$user_id. ' AND 
            (crm_level.level_id IS NULL OR crm_level.level_diengiai_id NOT IN (1,2,3,4,5,6,8,9,10))');

        if(!empty($search)) {
            $this->db->where('(c3_name LIKE \'%'.$search.'%\' OR c3_tel LIKE \'%'.$search.'%\' OR c3_email LIKE \'%'.$search.'%\' OR CMND_CCCD LIKE \'%'.$search.'%\')');
        }

        $this->db->order_by("crm_c4.dte_datevisit", "desc");

        if(!$isCount) {
            $this->db->limit($limit, $offset);
        }
        $result = $this->db->get()->result_array();
        // if(!$isCount) {
        //     echo $this->db->last_query(); die;
        // }
        return $result;
    }

    public function updateData($id, $params) {
        return $this->db->update('crm_c4', $params, array('c4_id' => $id));
    }

    public function getUser($id, $user_id) {
        $this->db->select('crm_c4.*, level_name');
        $this->db->from('crm_c4');
        $this->db->join('crm_calllog', 'crm_c4.c4_id = crm_calllog.c4_id', 'left');
        $this->db->join('crm_level', 'crm_c4.level_id = crm_level.level_id', 'left');
        $this->db->where('crm_c4.c4_id', $id);
        $this->db->where('crm_c4.user_id', $user_id);
        $this->db->distinct();
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get3MonthsAgo($offset = 0, $limit = 30, $isCount = true) {
        if($isCount) {
            $this->db->select('COUNT(*) as total');
        } else {
            $this->db->select("*");
        }
        $this->db->from('crm_c4');
        $this->db->join('crm_status', 'crm_status.status_id = crm_c4.status_id', 'left');
        $this->db->join('crm_level', 'crm_level.level_id = crm_c4.level_id', 'left');
        $this->db->where("DATE(crm_c4.dte_datevisit) >= (DATE_FORMAT(NOW() ,'%Y-%m-01') - INTERVAL 3 month)");
        if(!$isCount) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by("crm_c4.dte_datevisit", "desc");
        $result = $this->db->get()->result_array();
        return $result;
    }

    function getAllRecord() {
        $this->db->select('*');
        $this->db->from('crm_c4');
        $this->db->join('crm_status', 'crm_status.status_id = crm_c4.status_id', 'left');
        $this->db->join('crm_level', 'crm_level.level_id = crm_c4.level_id', 'left');
        $this->db->where("DATE(crm_c4.dte_datevisit) >= (DATE_FORMAT(NOW() ,'%Y-%m-01') - INTERVAL 3 month)");
        $result = $this->db->get()->result_array();
        return $result;
    }

    function getAllLevel(){
        $this->db->select("*");
        $this->db->from("crm_level");
        $this->db->order_by('level_id', 'asc');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function getAllStatus(){
        $this->db->select("*");
        $this->db->from("crm_status");
        $this->db->order_by('status_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOtherLevel($user_id, $date) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_c4 C4');
        $this->db->join('crm_level CL', 'C4.level_id = CL.level_id');
        $this->db->join('crm_calllog CC', 'CC.c4_id = C4.c4_id');
        $this->db->where("C4.user_id = ".$user_id." AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) AND DATE(C4.dte_datevisit) = '".$date."'");
        $this->db->group_by("level_name");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function callFuture($user_id, $date) {
        $this->db->select('COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_c4 C4');
        $this->db->where("C4.user_id = ".$user_id." AND DATE(C4.dteNextDate) = '".$date."'");
        $result = $this->db->get()->result_array();
        return $result;
    }

    //manager
    public function getOtherLevelManager($parent_id, $date) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_c4 C4');
        $this->db->join('crm_level CL', 'C4.level_id = CL.level_id');
        $this->db->join('crm_calllog CC', 'CC.c4_id = C4.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) AND DATE(C4.dte_datevisit) = '".$date."'");
        $this->db->group_by("level_name");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function notCall($user_id, $date) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_c4 C4');
        $this->db->join('crm_level CL', 'C4.level_id = CL.level_id', 'left');
        $this->db->join('crm_calllog CC', 'CC.c4_id = C4.c4_id' ,'left');
        $this->db->where("C4.user_id = ".$user_id." AND (DATE(C4.dteNextDate) = '".$date."' OR (CC.c4_id IS NULL AND DATE(C4.last_c3_datereg) = '".$date."'))");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function notCallManager($parent_id, $date) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_c4 C4');
        $this->db->join('crm_level CL', 'C4.level_id = CL.level_id', 'left');
        $this->db->join('crm_calllog CC', 'CC.c4_id = C4.c4_id', 'left');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND (DATE(C4.dteNextDate) = '".$date."' OR (CC.c4_id IS NULL AND DATE(C4.last_c3_datereg) = '".$date."'))");
        $result = $this->db->get()->result_array();
        return $result;
    }

    //manager in this month
    public function notCallManagerMonth($userId, $parent_id) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id', 'left');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id', 'left');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND CU.user_id = " .$userId. " AND 
        (DATE_FORMAT(C4.dteNextDate, '%Y-%m') = DATE_FORMAT(NOW() ,'%Y-%m') OR (CC.c4_id IS NULL AND DATE_FORMAT(C4.last_c3_datereg, '%Y-%m') = DATE_FORMAT(NOW() ,'%Y-%m')))");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLevelOppositeL1ManagerMonth( $parent_id) {
        $this->db->select('COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = " .$parent_id. " AND level_name = 'L1' 
        AND level_diengiai_id NOT IN (7, 11) AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOtherLevelManagerMonth($userId, $parent_id) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND CU.user_id = " .$userId. " AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) 
        AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(NOW() ,'%Y-%m')");  
        $this->db->group_by("level_name");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getAllUser($userId){
        $this->db->select("user_id, user_fullname, username");
        $this->db->from('crm_user');
        $this->db->where('parent_id = '.$userId);
        return $this->db->get()->result_array();
    }

    //manager in this week
    public function getOtherLevelManagerWeek($parent_id, $date, $year) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) AND YEAR(C4.dte_datevisit)= ".$year." 
        AND WEEK(C4.dte_datevisit) = WEEK(DATE_SUB(NOW(), INTERVAL ".$date." DAY)) ");
        $this->db->group_by("level_name");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function notCallManagerWeek($parent_id, $date, $year) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where(" CU.parent_id = ".$parent_id." AND  YEAR(C4.dte_datevisit)= ".$year." 
        AND WEEK(C4.dteNextDate) = WEEK(DATE_SUB(NOW(), INTERVAL ".$date." DAY))");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLevelL1ManagerWeek($parent_id, $date, $year) {
        $this->db->select('COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where(" CU.parent_id = ".$parent_id." AND level_name = 'L1' AND level_diengiai_id IN (7, 11) 
        AND YEAR(C4.dte_datevisit)= ".$year." AND WEEK(C4.dte_datevisit) = WEEK(DATE_SUB(NOW(), INTERVAL ".$date." DAY)) ");
        $result = $this->db->get()->result_array();
        return $result;
    }

    //table 4 view manager
    public function notCallManagerOtherMonth($parent_id, $month) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id." AND DATE_FORMAT(C4.dteNextDate, '%Y-%m') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ".$month." MONTH), '%Y-%m')");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLevelL1ManagerOtherMonth($parent_id,$month) {
        $this->db->select('COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id."  AND level_name = 'L1' 
        AND level_diengiai_id IN (7, 11) AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ".$month." MONTH), '%Y-%m')");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOtherLevelManagerOtherMonth($parent_id, $month) {
        $this->db->select('level_name, COUNT(DISTINCT C4.c4_id) AS total_count');
        $this->db->from('crm_calllog CC');
        $this->db->join('crm_level CL', 'CC.level_id = CL.level_id');
        $this->db->join('crm_c4 C4', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        $this->db->where("CU.parent_id = ".$parent_id. " AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) 
        AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ".$month." MONTH), '%Y-%m')");
        $this->db->group_by("level_name");
        $result = $this->db->get()->result_array();
        return $result;
    }

    //markeket table 1,2,3

    public function markekettable1($table, $column, $time) {
        $shoolNames = $this->config->item('school_name');
        $sqlSchoolName = "'".implode("', '", $shoolNames)."'";
        $this->db->select("REPLACE(SUBSTRING_INDEX($column, '.', 2), CONCAT(SUBSTRING_INDEX($column, '.', 1), '.'), '') AS schoolName, COUNT(*) AS total_count");
        $this->db->from($table);
        $this->db->where("DATE_FORMAT($time,'%Y-%m') =  DATE_FORMAT(NOW(),'%Y-%m')");
        $this->db->group_by("schoolName ");
        $this->db->having("schoolName IN (".$sqlSchoolName.")");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function markekettable2($table, $column, $time) {
        $channelNames = $this->config->item('channel_name');
        $sqlChannelName = "'".implode("', '", $channelNames)."'";
        $this->db->select("REPLACE(SUBSTRING_INDEX($column, '.', 3), CONCAT(SUBSTRING_INDEX($column, '.', 2), '.'), '') AS channelName, COUNT(*) AS total_count");
        $this->db->from($table);
        $this->db->where("DATE_FORMAT($time,'%Y-%m') =  DATE_FORMAT(NOW(),'%Y-%m')");
        $this->db->group_by("channelName");
        $this->db->having("channelName IN (".$sqlChannelName.")");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function markekettable3() {
        $shoolNames = $this->config->item('school_name');
        $channelNames = $this->config->item('channel_name');

        $listConditions = array();
        foreach($shoolNames as $school) {
            foreach($channelNames as $channel) {
                $listConditions[] = $school.'.'.$channel;
            }
        }

        $sql = "'".implode("', '", $listConditions)."'";
        $this->db->select("REPLACE(SUBSTRING_INDEX(c3_nguon, '.', 3), CONCAT(SUBSTRING_INDEX(c3_nguon, '.', 1), '.'), '') AS schoolName, COUNT(*) AS total_count");
        $this->db->from('crm_c3');
        $this->db->where("DATE_FORMAT(c3_datereg,'%Y-%m') =  DATE_FORMAT(NOW(),'%Y-%m')");
        $this->db->group_by("schoolName");
        $this->db->having("schoolName IN (".$sql.")");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLevelL1BreakCall($name, $parent_id, $number1, $number2) {
        $this->db->select("REPLACE(SUBSTRING_INDEX(c4.SP, '.', ".$number1."), CONCAT(SUBSTRING_INDEX(c4.SP, '.',".$number2."), '.'), '') AS schoolName, COUNT(*) AS total_count");
        $this->db->from('crm_c4 c4');
        $this->db->join('crm_calllog cc', 'cc.c4_id = c4.c4_id');
        $this->db->join('crm_level cl', 'c4.level_id = cl.level_id');
        $this->db->join('crm_user cu', 'c4.user_id = cu.user_id');
        $this->db->where("cl.level_name = 'L1' and cl.level_diengiai_id NOT IN (7,11) 
        and cu.parent_id = ".$parent_id." and date_format(c4.dte_datevisit,'%Y-%m') = date_format(c4.dte_datevisit,'%Y-%m') ");
        $this->db->group_by("schoolName ");
        $this->db->having("schoolName IN (".$name.")");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOtherLevelMarketke($name, $parent_id, $number1, $number2) {
        $this->db->select("level_name,  REPLACE(SUBSTRING_INDEX(c4.SP, '.', ".$number1."), CONCAT(SUBSTRING_INDEX(c4.SP, '.', ".$number2."), '.'), '') AS schoolName ,COUNT(level_name) AS total_count ");
        
        $this->db->from('crm_c4 c4');
        $this->db->join('crm_calllog cc ','cc.c4_id = c4.c4_id');
        $this->db->join('crm_level cl ','c4.level_id = cl.level_id');
        $this->db->join('crm_user cu ','c4.user_id = cu.user_id');

        $this->db->where("(level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)) AND cu.parent_id = ".$parent_id." and date_format(c4.dte_datevisit,'%Y-%m') = date_format(c4.dte_datevisit,'%Y-%m') ");
        $this->db->group_by("schoolName, level_name");
        $this->db->having("schoolName IN (".$name.")");
        $result = $this->db->get()->result_array();
        return $result;
    }

    //staff show appointment
    public function dashboardStaff($type, $user_id, $date, $level, $offset = 0, $limit = 30, $isCount = true) {
        if($isCount) {
            $this->db->select('COUNT(DISTINCT C4.c4_id) as total');
        } else {
            $this->db->select("C4.*, CL.*");
        }

        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id', 'left');
        $this->db->join('crm_level CL', 'C4.level_id = CL.level_id', 'left');  

        if($type == 's-1') {
            if (!empty($date)) {
                if(!empty($level)) {
                    $this->db->where("CC.c4_id IS NOT NULL AND C4.user_id = ".$user_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11))) 
                        AND DATE(C4.dte_datevisit) = '".$date."'");
                } else {
                    $this->db->where("C4.user_id = ".$user_id." AND (DATE(C4.dteNextDate) = '".$date."' OR (CC.c4_id IS NULL AND DATE(C4.last_c3_datereg) = '".$date."'))");
                }
            } else {
                if(!empty($level)) {
                    $this->db->where("C4.user_id = ".$user_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)))");
                } else {
                    $this->db->where("C4.user_id = ".$user_id."");
                }
            } 
        } else {
            if(!empty($level)) {
                $this->db->where("C4.user_id = ".$user_id." AND DATE(C4.dteNextDate) >= '".$date."'");
            }else {
                $this->db->where("C4.user_id = ".$user_id." AND DATE(C4.dteNextDate) = '".$date."'");
            }
        }

        if(!$isCount) {
            $this->db->limit($limit, $offset);
            $this->db->distinct(); 
        }

        $result = $this->db->get()->result_array();
        if($isCount) {
            return $result[0]['total'];
        } else {
            //echo $this->db->last_query();die;
        }

        return $result;
    }


    // List contact of Manager
    public function dashboardManager($parent_id, $date, $level, $offset = 0, $limit = 30, $isCount = true){
        if($isCount) {
            $this->db->select('COUNT(DISTINCT C4.c4_id) as total');
        } else {
            $this->db->select("C4.*, CL.*, CU.*");
        }

        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id', 'left');
        $this->db->join('crm_level CL', 'CL.level_id = C4.level_id', 'left');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');

        if(!empty($date)) {
            if(!empty($level)) {
                $this->db->where("CU.parent_id = ".$parent_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11))) 
                    AND DATE(C4.dte_datevisit) = '".$date."'");
            } else {
                $this->db->where("CU.parent_id = ".$parent_id." AND (DATE(C4.dteNextDate) = '".$date."' OR (CC.c4_id IS NULL AND DATE(C4.last_c3_datereg) = '".$date."'))");
            }
        } else {
            if(!empty($level)) {
                $this->db->where("CU.parent_id = ".$parent_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)))");
            } else {
                $this->db->where("CU.parent_id = ".$parent_id);
            }
        }

        if(!$isCount) {
            $this->db->limit($limit, $offset);
            $this->db->distinct();
        }

        $result = $this->db->get()->result_array();
        if($isCount) {
            return $result[0]['total'];
        }
        return $result;
    }

    //table 2
    public function dashboardManager2($parent_id, $user_id, $level, $offset = 0, $limit = 30, $isCount = true){
        if($isCount) {
            $this->db->select('COUNT(DISTINCT C4.c4_id) as total');
        } else {
            $this->db->select("C4.*, CL.*, CU.*");
        }

        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_level CL', 'CL.level_id = C4.level_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');

        if(!empty($level)) {
            $this->db->where("CU.parent_id = ".$parent_id." AND C4.user_id = ".$user_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11))) 
                AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m')");
        } else {
            $this->db->where("CU.parent_id = ".$parent_id." AND C4.user_id = " .$user_id. " AND DATE_FORMAT(C4.dteNextDate, '%Y-%m') = DATE_FORMAT(NOW() ,'%Y-%m')");
        }
    

        if(!$isCount) {
            $this->db->limit($limit, $offset);
            $this->db->distinct();
        }

        $result = $this->db->get()->result_array();
        if($isCount) {
            return $result[0]['total'];
        } else {
            // echo $this->db->last_query();die;
        }

        return $result;
    }

    public function dashboardManager3($parent_id, $cntDay, $year, $level, $offset = 0, $limit = 30, $isCount = true) {
        if($isCount) {
            $this->db->select('COUNT(DISTINCT C4.c4_id) as total');
        } else {
            $this->db->select("C4.*, CL.*, CU.*");
        }
        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_level CL', 'CL.level_id = C4.level_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');
        if(!empty($level)) {
            $this->db->where("CU.parent_id = ".$parent_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11))) 
                AND YEAR(C4.dte_datevisit)= ".$year." AND WEEK(C4.dte_datevisit) = WEEK(DATE_SUB(NOW(), INTERVAL ".$cntDay." DAY))");
        } else {
            $this->db->where("CU.parent_id = ".$parent_id." AND  YEAR(C4.dte_datevisit)= ".$year." 
             AND WEEK(C4.dteNextDate) = WEEK(DATE_SUB(NOW(), INTERVAL ".$cntDay." DAY))");
        }

        if(!$isCount) {
            $this->db->limit($limit, $offset);
            $this->db->distinct();
        }

        $result = $this->db->get()->result_array();
        if($isCount) {
            return $result[0]['total'];
        }
        return $result;
    }

    public function dashboardManager4($parent_id, $cntMonth, $level, $offset = 0, $limit = 30, $isCount = true) {
        if($isCount) {
            $this->db->select('COUNT(DISTINCT C4.c4_id) as total');
        } else {
            $this->db->select("C4.*, CL.*, CU.*");
        }

        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_level CL', 'CL.level_id = C4.level_id');
        $this->db->join('crm_user CU', 'CU.user_id = C4.user_id');

        if(!empty($level)) {
            $this->db->where("CU.parent_id = ".$parent_id." AND (level_name = '$level' AND (level_diengiai_id > 11 OR level_diengiai_id IN (7, 11)))
                AND DATE_FORMAT(C4.dte_datevisit, '%Y-%m') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ".$cntMonth." MONTH), '%Y-%m')");
        } else {
            $this->db->where("CU.parent_id = ".$parent_id." AND DATE_FORMAT(C4.dteNextDate, '%Y-%m') = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ".$cntMonth." MONTH), '%Y-%m')");
        }

        if(!$isCount) {
            $this->db->limit($limit, $offset);
            $this->db->distinct();
        }

        $result = $this->db->get()->result_array();
        if($isCount) {
            return $result[0]['total'];
        }
        return $result;
    }

    //markeket show appointment
    public function dashboardMarketer($table, $column, $time, $number1, $number2) {
        $schools = $this->config->item('channel_name');
        $sqlSchoolName = "'".implode("', '", $schools)."'";
        $this->db->select("*,REPLACE(SUBSTRING_INDEX($column, '.', ".$number1."), CONCAT(SUBSTRING_INDEX($column, '.', ".$number2."), '.'), '') AS Name");
        $this->db->from($table);
        $this->db->where("DATE_FORMAT($time, '%Y-%m') =  DATE_FORMAT(NOW(), '%Y-%m')");
        $this->db->having("Name IN ('$sqlSchoolName')");
        $result = $this->db->get()->result_array();
      
        return $result;
    }

    public function detailLevelMarketer($level_name, $parent_id, $number1, $number2) {
        $schools = $this->config->item('channel_name');
        $sqlSchoolName = "'".implode("', '", $schools)."'";

        $this->db->select("*,REPLACE(SUBSTRING_INDEX(c4.SP, '.', ".$number1."), CONCAT(SUBSTRING_INDEX(c4.SP, '.', ".$number2."), '.'), '') AS Name");
        $this->db->from('crm_c4 c4');
        $this->db->join('crm_calllog cc ', 'cc.c4_id = c4.c4_id');
        $this->db->join('crm_level cl ', 'c4.level_id = cl.level_id');
        $this->db->join('crm_user cu ', 'c4.user_id = cu.user_id');
        
        if($level_name == 'L1') {
            $this->db->where("cl.level_name = 'L1' AND cl.level_diengiai_id IN (7,11) AND cu.parent_id = ".$parent_id." and DATE_FORMAT(C4.dte_datevisit,'%Y-%m') = DATE_FORMAT(C4.dte_datevisit,'%Y-%m')");
        } else if($level_name == 'L1B') {
            $this->db->where("cl.level_name = 'L1' AND cl.level_diengiai_id NOT IN (7,11) AND cu.parent_id = ".$parent_id." and DATE_FORMAT(C4.dte_datevisit,'%Y-%m') = DATE_FORMAT(C4.dte_datevisit,'%Y-%m')");
        } else {
            $this->db->where("cl.level_name = '$level_name' AND cu.parent_id = ".$parent_id." and DATE_FORMAT(C4.dte_datevisit,'%Y-%m') = DATE_FORMAT(C4.dte_datevisit,'%Y-%m') ");
        }
        $this->db->having("Name IN ('$sqlSchoolName')");
        $result = $this->db->get()->result_array();
        return $result;
    }

    function callLog($user_id, $c4_id) {
        $this->db->select("*");

        $this->db->from('crm_c4 C4');
        $this->db->join('crm_calllog CC', 'C4.c4_id = CC.c4_id');
        $this->db->join('crm_level CL', 'CL.level_id = C4.level_id');
        $this->db->join('crm_status CS', 'CS.status_id = CC.status_id');

        $this->db->where('C4.c4_id', $c4_id);
        $this->db->where('C4.user_id', $user_id);
        $this->db->where('CC.user_id', $user_id);

        $this->db->order_by("CC.calllog_id", "desc");

        $result = $this->db->get()->result_array();
        return $result;
    }
}