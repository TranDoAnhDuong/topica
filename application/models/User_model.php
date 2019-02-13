<?php
class User_model extends CI_Model {

    public $tableName = 'crm_user';
    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($username, $password) {
        $this->db->select('crm_user.*, role_key');
        $this->db->from($this->tableName);
        $this->db->join('crm_role', 'crm_role.role_id = '.$this->tableName.'.role_id');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('user_active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get($id){
        return $this->db->get_where($this->tableName, array('user_id' => $id))->row_array();
    }

    public function get_all() {
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    public function get_AllGroup() {
        $query = $this->db->get('crm_group');
        return $query->result_array();
    }

    public function getAllManager() {
        $this->db->select('*');
        $this->db->from('crm_user');
        $this->db->where('crm_user.role_id = 2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_allUser($offset = 0, $limit = 0, $isCount = true) {
        if($isCount) {
            $this->db->select('COUNT(*) as total');
        } else {
            $this->db->select('crm_user.*, rolename, group_name');
        }
        $this->db->from($this->tableName);
        $this->db->join('crm_role', 'crm_user.role_id = crm_role.role_id');
        $this->db->join('crm_group', 'crm_user.group_id = crm_group.group_id', 'left');
        if(!$isCount) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by("user_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($params) {
        return $this->db->insert($this->tableName, $params);
    }

    public function update($id, $params) {
        $this->db->update($this->tableName, $params, array('user_id' => $id));
    }

    public function updateData($id, $params) {
        return $this->db->update($this->tableName, $params, array('user_id' => $id));
    }

    public function delete($id){
        $this->db->delete($this->tableName, array('user_id' => $id)); 
    }

    public function profile($user_id) {
        $this->db->select('crm_user.*, crm_role.*, CU.user_fullname AS parent_name, crm_group.group_name');
        $this->db->from('crm_user');
        $this->db->join('crm_role','crm_user.role_id = crm_role.role_id');
        $this->db->join('crm_group','crm_user.group_id = crm_group.group_id', 'left');
        $this->db->join('crm_user CU','CU.user_id = crm_user.parent_id', 'left');
        $this->db->where('crm_user.user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_AllRole(){
        $query = $this->db->get('crm_role');
        return $query->result_array();
    }

    public function duplicateUser($username){
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getTotalRecord() {
        $this->db->select('COUNT(*) as total');
        $this->db->from($this->tableName);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function email($email) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAllStaff() {
        $this->db->select('crm_user.user_id, crm_user.username, group_name');
        $this->db->from($this->tableName);
        $this->db->join('crm_role', 'crm_user.role_id = crm_role.role_id');
        $this->db->join('crm_group', 'crm_user.group_id = crm_group.group_id', 'left');
        $this->db->where('role_key', 'staff');
        $this->db->where('user_active', '1');
        $this->db->order_by("group_name", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

}
