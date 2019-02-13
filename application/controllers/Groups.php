<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Group_model');
        $this->load->library('session');
    }

    public function index() {
        $this->setRole(array('admin'));

        $data = $this->Group_model->get_all();
        $this->data['pageTitle'] = 'CRM Admin - Danh sách Nhóm khu vực';
        $this->data['data'] = $data;
        $this->render('groups/index');
    }

    public function form($id = null) {
        $data = $this->Group_model->get($id);
        $this->data['data'] = $data;
        $this->data['id'] = $id;
        
        if(!empty($id) && empty($data)) {
            redirect('/groups/index');
        }

        $params = $this->input->post();
        if(!empty($params)) {
            $this->data['data'] = $params;
            if(empty($id)) {
                if($this->Group_model->insert($params)) {
                    $this->session->set_flashdata('is_error', false);
                    $this->session->set_flashdata('message', 'Thêm nhóm thành công!');
                    redirect('/groups/index');
                } else {
                    $this->session->set_flashdata('is_error', true);
                    $this->session->set_flashdata('message', 'Thêm nhóm thất bại!');
                }
            } else {
                if($this->Group_model->update($id, $params)) {
                    $this->session->set_flashdata('is_error', false);
                    $this->session->set_flashdata('message', 'Sửa nhóm thành công!');
                } else {
                    $this->session->set_flashdata('is_error', true);
                    $this->session->set_flashdata('message', 'Sửa nhóm thất bại!');
                }
            }

        }

        $this->render('groups/form');
    }
}