<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session', 'userlib'));
        $this->load->model("visual_trait_pageview_db");
        $this->membersession = $this->session->all_userdata();

        $membersession = $this->membersession;


        if (isset($membersession['email']) && isset($membersession['password'])) {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        } else {
            redirect("login");
        }

        $this->load->helper("url");
    }

    public function index() {

        
        
        
        
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());

        $data['name'] = $this->userlib->name;
        $data['surname'] = $this->userlib->surname;
        $data['dob'] = $this->userlib->dob;
        $data['gender'] = $this->userlib->gender;
        $data['location'] = $this->userlib->location;
        $data['country_name'] = $this->userlib->country_name;
        $data['province_name'] = $this->userlib->province_name;
        $data['contact_no'] = $this->userlib->contact_no;
        $data['email'] = $this->userlib->email;
        $data['hidehomelink'] = true;
        $data['ideal_business_id'] = $this->membersession['ideal_business_id'];
        $ideal_business_id = $this->membersession['ideal_business_id'];
        
        if($this->userlib->email== get_default_username()){
            
            redirect("search/get_all_products_services/$ideal_business_id");
        }
        
        $this->bukaweb_layout("home/index", $data);
    }

}

?>
