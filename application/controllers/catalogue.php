<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class catalogue extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array("form", "url", "socialmedia"));
        $this->load->model(array("app_feedback_db"));
        $this->load->model("visual_trait_pageview_db");
        $this->load->model(array("businessdb", "productservicedb"));
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        if (isset($membersession['email']) && isset($membersession['password'])) {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        } else {
            $this->userlib->id = 0;
        }
    }

    public function index($business_type_id = 1) {

        if ($this->userlib->id == 0) {
            $this->userlib->getUser(strtolower(get_default_username()), get_default_password());
            $this->session->set_userdata(array("email" => strtolower($this->userlib->email), "password" => $this->userlib->password, "ideal_business_id" => 0));
            $this->membersession = $this->session->all_userdata();
        }


        if (!is_numeric($business_type_id)) {
            die("Something went wrong.");
        }

        $data['visitor_email'] = $this->membersession['email'];
        $data['userID'] = $this->userlib->id;

        $data['ideal_business_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : 0;

        $data['prodserv'] = $this->productservicedb->get_products_services_by_business_type_id($business_type_id, null, $data['ideal_business_id']);
        $data['onlineuseremail'] = $this->userlib->email;

        $data['businesses'] = $this->businessdb->get_businesses();
        $data['promotions'] = $this->productservicedb->get_promotions();

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("catalogue/index", $data);
    }

}
