<?php
class C3_model extends CI_Model {

    public $tableName = "crm_c3";
    public function __construct() {
        parent::__construct();
    }

    public function get($id){
        return $this->db->get_where($this->tableName, array('user_id' => $id))->row_array();
    }

    public function get_all() {
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    public function insert($params) {
       return $this->db->insert($this->tableName, $params);
    }

    public function update($id, $params) {
        $this->db->update($this->tableName, $params, array('user_id' => $id));
    }

    public function delete($id){
        $this->db->delete($this->tableName, array('user_id' => $id)); 
    }

    public function getContactRegisted() {
        $data = $this->db->query("
        SELECT TMP3.* FROM (SELECT * 
            FROM (
                SELECT *,
                    REPLACE(SUBSTRING_INDEX(nguon_new, '.', 2), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 1),'.'), '') AS truong,
                    REPLACE(SUBSTRING_INDEX(nguon_new, '.', 3), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 2),'.'), '') AS SP,
                    REPLACE(SUBSTRING_INDEX(nguon_new, '.', 7), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 6),'.'), '') AS khuvuc
                FROM (
                    SELECT *,
                        SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(TRIM(c3_nguon), '/', 1), '&', 1), '=', 1), '%' , 1) AS nguon_new,
                        REGEXP_REPLACE(REGEXP_REPLACE(c3_tel, '[\+A-Za-z )(\.\-]', ''), '^0|^84|^0084', '') AS tel_new
                    FROM crm_c3
                    WHERE DATE(c3_datereg) >= (DATE_FORMAT(NOW() ,'%Y-%m-%d') - INTERVAL 3 DAY) AND c3_nguon <> ''
                ) TMP
                ORDER BY c3_datereg
            ) TMP2
            GROUP BY tel_new, truong) TMP3
            LEFT JOIN crm_c4 C4 ON TMP3.c3_id = C4.c3_id
            WHERE C4.c3_id IS NULL
        ");

        $result = $data->result_array();
        return $result;
    }

    public function getContactByUser() {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where("c3_user_id IS NOT NULL");
        $this->db->where("DATE(c3_datereg) >= (DATE_FORMAT(NOW() ,'%Y-%m-%d') - INTERVAL 3 DAY)");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getContactTuyensinh($max_id) {
        $this->db->select('tuyensinh.*');
        $this->db->from('tuyensinh');
        $this->db->join($this->tableName, 'tuyensinh.id = crm_c3.tuyensinh_id' , 'left');
        $this->db->where("id > ". $max_id);
        $this->db->where("tuyensinh_id IS NULL");
        $this->db->where("DATE(reg_date) >= (DATE_FORMAT(NOW() ,'%Y-%m-%d') - INTERVAL 3 DAY)");
        $result = $this->db->get()->result_array();
        return $result;
    }
}
