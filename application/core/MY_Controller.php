<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller {
    protected $data = array();
    function __construct() {
        parent::__construct();
        $this->data['pageTitle'] = 'CRM - Admin';
        $this->load->library('session');
        if(!isset($this->session->userdata['user_id'])){
            redirect("auth/login");
        }
        
        $this->data['ROLE_KEY'] = $this->session->userdata['role_key'];
        $this->data['USER_ID'] = $this->session->userdata['user_id'];
        $this->ROLE_KEY = $this->session->userdata['role_key'];
        $this->USER_ID = $this->session->userdata['user_id'];
    }
    
    protected function render($the_view = NULL, $template = 'template') {
        if($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } elseif(is_null($template)) {
            $this->load->view($the_view, $this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);;
            $this->load->view('layouts/'.$template, $this->data);
        }
    }

    function setRole($role) {
        if(!in_array($this->ROLE_KEY, $role)) {
            redirect('/');
        }
    }
}
