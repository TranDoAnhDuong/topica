<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "third_party/Encryption.class.php";

class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->data['pageTitle'] = 'CRM - Admin';
        $this->load->model('User_model');
        $this->load->library('session');
    }
    
    public function login() {
        $this->load->view('/users/login');
    }

    public function do_login() {
        $params = $this->input->post();
        $salt = $this->config->item('salt');
        $password = md5($salt.$params['password']);
        $user = $this->User_model->checkLogin($params['username'], $password);
        if($user) {
            $this->session->set_userdata($user);
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Tài khoản hoặc mật khẩu không đúng.');
            redirect('/auth/login');
        }
    }

    public function reset_pass() {
        $token = $this->input->get('token');
        if(empty($token)) {
            redirect('/auth/login');
        }
        $dycrypt = $this->decode($token);
        $params = explode(',', $dycrypt);
        if(count($params) != 2) {
            redirect('/auth/login');
        }
        $currentTime = time()-(5*60);
        $time = $params[1];
        if($currentTime > $time){
            $this->session->set_flashdata('is_error', true);
            $this->session->set_flashdata('message', 'Đã quá thời gian 5p cho phép lấy lại mật khẩu ! ');
            redirect('/auth/login');
        }
        
        $this->load->view('/users/reset_pass', array('token' => $token));
    }

    public function submit_resetpass() {
        $params = $this->input->post();
        $newPassword = $params['newPassword'];
        $token = $params['token'];
        $dycrypt = $this->decode($token);
        $params = explode(',', $dycrypt);
        $user_id = $params[0];
        $currentTime = time()-(5*60);
        $time = $params[1];    
        if(count($params) != 2) {
            redirect('/auth/login');
        }else if($currentTime > $time){
            redirect('/auth/login');
        }else{
            $salt = $this->config->item('salt');
            $password = array('password' => md5($salt.$newPassword));
            if($this->User_model->updateData($user_id, $password)) {
                $this->session->set_flashdata('is_error', false);
                $this->session->set_flashdata('message', 'Cập nhật mật khẩu thành công thành công!');
            } else {
                $this->session->set_flashdata('is_error', true);
                $this->session->set_flashdata('message', 'Cập nhật mật khẩu thất bại thất bại!');
            }
            redirect('/auth/reset_pass?token='.$token);
        }
    }

    public function forgot_pass() {
        $this->load->view('/users/forgot_pass');
    }

    public function submit_forgotpass() {
        $params = $this->input->post();
        $email = $this->User_model->email($params['email']);
        $token = $this -> encode($email['user_id'].','.time());
        $tokenURL = base_url().'auth/reset_pass?token='.$token;
        if($this->User_model->email($params['email'])) {
            $this->session->set_flashdata('is_error', false);
            $this->session->set_flashdata('message', 'Vui lòng kiểm tra hòm thư cho việc thay đổi mật khẩu');
            $this->load->library('Utils');
            $Utils = new Utils();
            $emailParams = array(
                'to' => $params['email'],
                'subject' => 'Khôi phục mật khẩu',
                'message' => 'Vui lòng click vào link: '.$tokenURL
            );
            $Utils->sendEmail($emailParams);
        } else {
            $this->session->set_flashdata('is_error', true);
            $this->session->set_flashdata('message', 'Email không đúng!');
        }
        redirect('auth/forgot_pass');
    }

    public function encode($value) {
    
        $this->load->library('Encryption');
        $key = $this->config->item('security_key');

        if (!$value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
        return trim(Encryption::safe_b64encode($crypttext));
    }

    public function decode($value) {
        
        $key = $this->config->item('security_key');

        if (!$value) {
            return false;
        }
        $crypttext = Encryption::safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}

