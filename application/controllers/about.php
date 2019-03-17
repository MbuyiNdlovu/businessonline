`<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class about extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("businessdb"));
        
        $this->load->model("productservicedb");
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->load->helper(array('form', 'url', 'security', 'catandsubcat', 'package_helper'));
        $this->load->model(array('memberdb', 'about_db'));
        $this->load->model(array("businesscategorylist_db", "businesscategorylist_includes_db"));
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        $this->userlib->getUser($membersession['email'], $membersession['password']);
        if ($this->userlib->id == false) {
            redirect("login");
        }
        $this->userdata = $this->session->all_userdata();
    }

    public function index($business_id) {
        // $business_id = base64_decode(urldecode($business_id));
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['own_business'] = FALSE;
        $data['business_id'] = $business_id;
        $current_business = $this->businessdb->is_my_business($business_id, $this->userlib->id);
        if ($current_business) {
            $data['own_business'] = TRUE;
            $data['business_name'] = $current_business['business_name'];
        }
        
       $business = get_business($business_id);
       $data['logo_url'] = $business['logo_url'];

        $data['business_about'] = $this->about_db->get_business_about($business_id);
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("about/index", $data);
    }

    public function add_about() {
        $fdata = $this->input->post();
        unset($fdata['submit']);
        $this->about_db->add_about($fdata);
        redirect($this->agent->referrer(), 'refresh');
    }

    public function update_about() {
        $fdata = $this->input->post();
        unset($fdata['submit']);
        $business_id = $fdata['business_id'];
        unset($fdata['business_id']);
        $this->about_db->update_about($business_id, $fdata);
        redirect($this->agent->referrer(), 'refresh');
    }

}
