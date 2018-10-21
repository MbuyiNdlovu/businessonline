<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Legal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("visual_trait_pageview_db");
    }

    public function index() {
        //HITS
        $this->visual_trait_pageview_db->add_hit(0, current_url(), $this->input->ip_address());

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
        $this->bukaweb_layout("legal/terms_conditions");
    }

}

?>
