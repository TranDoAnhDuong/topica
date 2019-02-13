<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function profile() {
        $user_id = $this->session->userdata['user_id'];
        $data = $this->User_model->profile($user_id);
        $this->data['data'] = $data;
        $this->render('users/profile');
    }

    public function index() {
        $page = (int) $this->input->get('page');
        $totalPage = $this->User_model->get_allUser();
        $totalPage = $totalPage[0]['total'];
        $limit = $this->config->item('limit_on_page');
        $maxPage = ceil($totalPage/$limit);
        $page = ($page <= 1 ) ? 1 : $page;
        $page = ($page > $maxPage) ? $maxPage : $page;
        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $data = $this->User_model->get_allUser($offset, $limit, false) ;
        $this->data['pageTitle'] = 'CRM Admin - Danh sách tài khoản';
        $this->data['data'] = $data;
        $this->data['maxPage'] = $maxPage;
        $this->data['page'] = $page;
        $this->render('users/index');
    }

    public function change_pwd() {
        $this->render('users/change_pwd');
    }

    public function do_change_pwd() {
        $params = $this->input->post();
        if(!empty($params)) {
            $salt = $this->config->item('salt');
            $newPassword = md5($salt.$params['newPassword']);
            $oldPassword = md5($salt.$params['oldPassword']);

            $user_id = $this->session->userdata['user_id'];
            $user = $this->User_model->get($user_id);

            if($user['password'] != $oldPassword) {
                $this->session->set_flashdata('is_error', true);
                $this->session->set_flashdata('message', 'Mật khẩu cũ không chính xác.');
                redirect('/users/change_pwd');
            }
            
            if($this->User_model->updateData($user_id, array('password' => $newPassword))) {
                $this->session->set_flashdata('is_error', false);
                $this->session->set_flashdata('message', 'Thay đổi mật khẩu thành công!');
            } else {
                $this->session->set_flashdata('is_error', true);
                $this->session->set_flashdata('message', 'Thay đổi mật khẩu không thành công. Vui lòng thử lại.');
            }
            redirect('/users/change_pwd');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function form($user_id = null) {
        $this->setRole(array('admin'));

        $this->session->set_flashdata('message', '');
        $user = array();
        $this->data['action'] = 'insert';
        if(!empty($user_id)) {
            $user = $this->User_model->get($user_id);
            if(empty($user)) {
                redirect('/users');
            }

            $this->data['user'] = $user;
            $this->data['action'] = 'update';
            // Edit 
        }

        $crm_role =  $this->User_model->get_AllRole();
        $this->data['crm_role'] = $crm_role;
        $manager = $this->User_model->getAllManager();
        $this->data['manager'] = $manager;
        $group = $this->User_model->get_AllGroup();
        $this->data['group'] = $group;
        $params = $this->input->post();
        if(!empty($params)) {
            $this->data['user'] = $params;
            $salt = $this->config->item('salt');
            if(isset($params['password'])) {
                $password = md5($salt.$params['password']);
            }

            if($params['role_id'] != '4') {
                $params['parent_id'] = '';
            }

            if($this->data['action'] == 'insert') {
                $user = $this->User_model->duplicateUser($params['username']);
                if(!empty($user)) {
                    $this->session->set_flashdata('is_error', true);
                    $this->session->set_flashdata('message', 'Tài khoản đã được sử dụng.');
                } else {
                    unset($params['action']);
                    unset($params['confirmPassword']);
                    $params['password'] = md5($salt.$params['password']);
                    if($this->User_model->insert($params)) {
                        $this->session->set_flashdata('is_error', false);
                        $this->session->set_flashdata('message', 'Thêm người dùng thành công!');
                    } else {
                        $this->session->set_flashdata('is_error', true);
                        $this->session->set_flashdata('message', 'Thêm người thất bại!');
                    }
                }
            } else {
                // Update
                unset($params['action']);
                unset($params['password']);
                unset($params['username']);
                if($this->User_model->updateData($user_id, $params)) {
                    $this->session->set_flashdata('is_error', false);
                    $this->session->set_flashdata('message', 'Sửa thông tin người dùng thành công!');
                } else {
                    $this->session->set_flashdata('is_error', true);
                    $this->session->set_flashdata('message', 'Sửa thông tin người thất bại!');
                }
            }
        }

        $this->render('users/form');
    }

    public function reset_pass() {
        $this->setRole(array('admin'));
        
        $params = $this->input->post();
        $salt = $this->config->item('salt');
        $newPassword = array('password' =>md5($salt.$params['newPassword']));  
        $user_id = $params['user_id'];
        if($this->User_model->updateData($user_id, $newPassword)) {
            $this->session->set_flashdata('is_error', false);
            $this->session->set_flashdata('message', 'Sửa mật khẩu thành công!');
        } else {
            $this->session->set_flashdata('is_error', true);
            $this->session->set_flashdata('message', 'Sửa mật khẩu thất bại!');
        }
        redirect('/users/listUser/'.$params['page']);
    }

    public function delete_account() {
        $params = $this->input->post();
        $user_id = $params['user_id'];
        $this->User_model->delete($user_id);
        redirect('/users/listUser/'.$params['page']);
    }
}