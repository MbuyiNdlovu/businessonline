<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {

        parent::__construct();
        $this->load->helper(array("form", "url", "socialmedia"));
        $this->load->model("social_db");
        $this->load->library('user_agent');
        $this->load->model(array("businessdb"));
        $this->load->model("productservicedb");
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->load->helper(array('form', 'url', 'security', 'catandsubcat', 'package_helper'));
        $this->load->model(array('memberdb'));
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
        $data['business_id'] = $business_id;

        $data['company_social_media_links'] = $this->social_db->get_social_media_by_business_id($business_id);
        $data['own_business'] = FALSE;


        if ($this->businessdb->is_my_business($business_id, $this->userlib->id)) {
            $data['own_business'] = TRUE;
        } else {
            die("url manipulation not allowed");
        }
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("social/index", $data);
    }

    public function add_social_media() {
        $fdata = $this->input->post();
        unset($fdata['submit']);
        $this->social_db->add_social_media($fdata);

        redirect($this->agent->referrer());
    }

    public function remove_social_media_link($business_id, $social_media_links_id) {
        $this->social_db->remove_social_media_link($business_id, $social_media_links_id);
        redirect($this->agent->referrer());
    }

}
