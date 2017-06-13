<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front_site extends CI_Controller {

    public $params_topass = [];

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//        $this->params_topass['title_page'] = "Home";
        $this->call_views(['home'], $this->params_topass);
    }

    public function about() {
        $this->call_views(['about'], $this->params_topass);
    }

    public function find_need() {
        $this->call_views(['find_need'], $this->params_topass);
    }

    public function public_profile() {
        $this->call_views(['public_profile_view'], $this->params_topass);
    }
    
    public function need_overview() {
        $this->call_views(['need_overview_view'], $this->params_topass);
    }

    public function user_need_overview() {
        $this->call_views(['user_need_overview'], $this->params_topass);
    }

    public function profile_user() {
        $this->call_views(['user_profile'], $this->params_topass);
    }

    private function call_views($views, $params) {
        $this->load->view('layouts/init_page', $params);
        $this->load->view('layouts/header_navs');
        foreach ($views as $view) {
            $this->load->view($view);
        }
        $this->load->view('layouts/footer');
        $this->load->view('layouts/end_page');
    }

}

/* End of file front_site.php */
/* Location: ./application/controllers/front_site.php */