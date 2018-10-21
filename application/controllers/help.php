<?php

class Help extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('session', 'userlib');
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        $this->userlib->getUser($membersession['email'], $membersession['password']);


        if ($this->userlib->id == false) {
            redirect("login");
        }
    }

    public function index() {
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("help/index",$data);
 }

}
