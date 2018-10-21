<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class productservice_thread extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model("visual_trait_pageview_db");
        $this->load->library(array('session', 'userlib'));

        $this->membersession = $this->session->all_userdata();

        $membersession = $this->membersession;

        $this->userlib->getUser($membersession['email'], $membersession['password']);

        if ($this->userlib->id == false) {
            redirect("login");
        }

        $this->load->model(array("productservice_threaddb", "productservice_threadchatsdb","businessdb"));
        $this->load->helper(array("form", "url"));
    }

    public function index($productservice_id) {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());

//thread      
        $thread = $this->productservice_threaddb->get_thread($this->userlib->id, $productservice_id);

        $data['thread'] = $thread;
 $data['logo_url'] = phangisa_logo();
        $this->bukaweb_layout("productservice_thread/index", $data);
    }

    public function add_thread_form($sp_id, $productservice_id) {

        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());
 
  
  
  $data['thisbusiness'] = $this->businessdb->get_business($sp_id);

        if (isset($data['logo_url'])&&  strlen($data['logo_url'])>0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
  
        $data['sp_id'] = $sp_id;
        $data['productservice_id'] = $productservice_id;
        $this->bukaweb_layout("productservice_thread/add_thread_form", $data);
    }

    public function add_thread() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());


        $data = $this->input->post();
        $this->productservice_threaddb->add_thread($data['thread_name'], $data['thread_description'], $data['productservice_id'], $data['sp_id'], $this->userlib->id);
        redirect("productservice_thread/index/$data[productservice_id]");
    }

    public function add_chat_form($thread_id) {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());

        $data['thread_id'] = $thread_id;
         $data['logo_url'] = phangisa_logo();
        $this->bukaweb_layout("productservice_thread/add_chat_form", $data);
    }

    public function add_chat() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());

        $data = $this->input->post();
        $this->productservice_threadchatsdb->add_chat($data['thread_id'], $this->userlib->id, $data['message']);
        redirect("/productservice_thread/open_the_thread/$data[thread_id]");
    }

    public function open_the_thread($thread_id) {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());


        $data['member_id'] = $this->userlib->id;
        $thread = $this->productservice_threaddb->open_the_thread($this->userlib->id, $thread_id);


        $data['thread'] = $thread;
        if ($thread) {
            $data['chats'] = $this->productservice_threadchatsdb->get_chats($thread['id']);
            //chats 
        }
        
  
         $data['logo_url'] = phangisa_logo();
         
        $this->bukaweb_layout("productservice_thread/open_the_thread", $data);
    }

    public function request_has_been_sent() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());


        $this->bukaweb_layout("productservice_thread/request_has_been_sent");
    }

}

?>
