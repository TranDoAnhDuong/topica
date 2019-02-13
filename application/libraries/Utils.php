<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utils {
    private $CI;
    function __construct() {
        // Assign by reference with "&" so we don't create a copy
        $this->CI = &get_instance();
    }

    public function sendEmail($params) {
        $this->CI->load->config('config');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => $this->CI->config->item('smtp_host'),
            'smtp_port' => $this->CI->config->item('smtp_port'),
            'smtp_user' => $this->CI->config->item('smtp_user'),
            'smtp_pass' => $this->CI->config->item('smtp_pass'),
            'mailtype' => 'html', 
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $from = (!empty($params['from'])) ? $params['from'] : 'longthse04935@fpt.edu.vn';
        $sender = (!empty($params['sender'])) ? $params['sender'] : 'CRM';
        $this->CI->load->library('email', $config);
        $this->CI->email->set_newline("\r\n");
        $email_setting  = array('mailtype'=>'html');
        $this->CI->email->initialize($email_setting);
        $this->CI->email->from($from , $sender);
        $this->CI->email->to($params['to']);
        $this->CI->email->subject($params['subject']);
        $this->CI->email->message($params['message']);
        $this->CI->email->send();
    }
}
?>