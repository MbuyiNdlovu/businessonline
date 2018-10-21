<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array("form", "url"));
        $this->load->model(array("app_feedback_db"));



        $this->load->library(array('session', 'userlib', 'user_agent'));

        $this->membersession = $this->session->all_userdata();

        $membersession = $this->membersession;

        if (isset($membersession['email']) && isset($membersession['password'])) {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        } else {
            $this->userlib->id = 0;
        }
    }

    public function index() {

        $data['previous_page'] = $this->agent->referrer();

        $data['logo_url'] = phangisa_logo();

        if (!isset($this->membersession['email'])) {

            $this->bukaweb_layout_out("feedback/index", $data);
        } else {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("feedback/index", $data);
        }
    }

    public function send() {
        $fdata = $this->input->post();
        $this->app_feedback_db->add_feedback($this->userlib->id, $fdata['page_url'], $fdata['comments']);
        redirect("feedback/thankyou");
    }

    public function thankyou() {
        $data['logo_url'] = phangisa_logo();
        if (!isset($this->membersession['email'])) {
            $this->bukaweb_layout_out("feedback/thankyou", $data);
        } else {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout_out("feedback/thankyou", $data);
        }
    }

}

?>
