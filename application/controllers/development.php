<?php

class Development extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session', 'userlib');
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        $this->userlib->getUser($membersession['email'], $membersession['password']);

        $this->load->model("visual_trait_pageview_db");
        if ($this->userlib->id == false) {
            redirect("login");
        }
    }

    public function index() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());
        $this->bukaweb_layout("development/index");
    }
}
