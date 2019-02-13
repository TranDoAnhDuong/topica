<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_log extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->render('call_log/index');
    }
}