<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("searchmodel_db", "businesscategorylist_db", "businesscategorylist_includes_db", "productservicedb"));
        $this->load->helper("url");
        $this->load->library(array('session', 'userlib'));
        $this->membersession = $this->session->all_userdata();

        $membersession = $this->membersession;
        if (!isset($membersession['email'])) {
            $this->userlib->getUser(strtolower(get_default_username()),get_default_password() );
            $this->session->set_userdata(array("email" => strtolower($this->userlib->email), "password" => $this->userlib->password, "ideal_business_id" => 0));
            $this->membersession = $this->session->all_userdata();
            $membersession = $this->membersession;
        } else {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        }
        $this->load->helper("url");
    }

    public function categorylist() {
        $data['visitor_email'] = $this->membersession['email'];
        $data['categories'] = $this->businesscategorylist_db->get_categories();
        $this->bukaweb_layout("search/categorylist", $data);
    }

    public function subcategorylist($category_id) {
        if(!is_numeric($category_id)){die("Something went wrong.");}
        
        $data['visitor_email'] = $this->membersession['email'];
        $data['subcategories'] = $this->businesscategorylist_includes_db->get_subcategories($category_id);
        $this->bukaweb_layout("search/subcategorylist", $data);
    }

    public function get_products_services_by_subcategory_id($subcategory_id) {
        if(!is_numeric($subcategory_id)){die("Something went wrong.");}
        
        $data['visitor_email'] = $this->membersession['email'];
        $data['userID'] = $this->userlib->id;
        $data['subcategory_id'] = $subcategory_id;
        $data['ideal_business_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : 0;
        
        $data['prodserv'] = $this->productservicedb->get_productservice_by_subcategory_id($subcategory_id, null, $data['ideal_business_id']);
        $data['onlineuseremail'] = $this->userlib->email;

        $this->bukaweb_layout("search/get_products_services_by_subcategory_id", $data);
    }
    

    public function get_products_services_by_subcategory_id_and_search_term() {
        $fdata = $this->input->post();
        $data['visitor_email'] = $this->membersession['email'];
        $data['userID'] = $this->userlib->id;
        $data['subcategory_id'] = $fdata['subcategory_id'];
        $data['prodserv'] = $this->productservicedb->get_productservice_by_subcategory_id($fdata['subcategory_id'], $fdata['search_term'], $this->membersession['ideal_business_id']);
        $data['onlineuseremail'] = $this->userlib->email;
        $data['ideal_business_id'] = $this->membersession['ideal_business_id'];
        $this->bukaweb_layout("search/get_products_services_by_subcategory_id", $data);
    }

    //busy functions

    public function get_all_products_services($ideal_business_id = 0) {
        if(!is_numeric($ideal_business_id)){die("Something went wrong.");}
        $data['visitor_email'] = $this->membersession['email'];
        $this->session->set_userdata(array("ideal_business_id" => $ideal_business_id));


        $data['userID'] = $this->userlib->id;
        $data['onlineuseremail'] = $this->userlib->email;
        $data['prodserv'] = $this->productservicedb->get_productservice(null, $ideal_business_id);
        $this->bukaweb_layout("search/get_all_products_services", $data);
    }

    public function get_all_products_services_by_search_term() {
        $fdata = $this->input->post();
        $data['userID'] = $this->userlib->id;
        $data['visitor_email'] = $this->membersession['email'];
        $data['prodserv'] = $this->productservicedb->get_productservice($fdata['search_term'], $this->membersession['ideal_business_id']);
        $data['onlineuseremail'] = $this->userlib->email;
        $this->bukaweb_layout("search/get_all_products_services", $data);
    }
    
    
        public function get_products_services_by_business_type_id($business_type_id) {
        if(!is_numeric($business_type_id)){die("Something went wrong.");}
        
        $data['visitor_email'] = $this->membersession['email'];
        $data['userID'] = $this->userlib->id;
         
        $data['ideal_business_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : 0;
        
        $data['prodserv'] = $this->productservicedb->get_products_services_by_business_type_id($business_type_id, null, $data['ideal_business_id']);
        $data['onlineuseremail'] = $this->userlib->email;

        $this->bukaweb_layout("search/get_products_services_by_business_type_id", $data);
    }

}

?>