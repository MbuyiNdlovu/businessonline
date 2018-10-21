<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class advertisement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        $this->userlib->getUser($membersession['email'], $membersession['password']);
        $this->load->model(array("advert_db","visual_trait_pageview_db"));
        if ($this->userlib->id == false) {
            redirect("login");
        }
    }

    public function index($start = 0) {
       
         //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id , current_url(), $this->input->ip_address());
        
        $data['name'] = $this->userlib->name;
        $data['surname'] = $this->userlib->surname;
        $data['dob'] = $this->userlib->dob;
        $data['gender'] = $this->userlib->gender;
        $data['location'] = $this->userlib->location;
        $data['country_name'] = $this->userlib->country_name;
        $data['province_name'] = $this->userlib->province_name;
        $data['contact_no'] = $this->userlib->contact_no;
        $data['email'] = $this->userlib->email;

        $data['start'] = $start;
        $data['ads'] = $this->advert_db->get_ads($start);
        $this->bukaweb_layout("advertisement/index", $data);
        
       
    }

    public function view_each_ad($ad_id) {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id , current_url(), $this->input->ip_address());
        
        $data['ad'] = $this->advert_db->get_each_ad($ad_id);
        $this->bukaweb_layout("advertisement/view_each_ad", $data);
        
       
    }

}

?>