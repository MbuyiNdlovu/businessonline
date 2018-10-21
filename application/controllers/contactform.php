<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class contactform extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("businessdb"));
       
        $this->load->model("productservicedb");
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->load->helper(array('form', 'url', 'security', 'catandsubcat'));
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

    public function index($business_id, $productservice_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($productservice_id)) {
            die("Something went wrong.");
        }
 
        $data['product_service'] = $this->productservicedb->get_productservice__product_id_business_id($business_id, $productservice_id);

        // die($data['product_service']['url']);
        $data['visitor_email'] = $this->membersession['email'];
        $data['back'] = $this->agent->referrer();
        $this->bukaweb_layout("contactform/index", $data);
    }

    public function send_mail_out() {
        $fdata = $this->input->post();
        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from($fdata['email'], 'Phangisa Customer Request'); //sender's email
        $address = $fdata['emailto']; //receiver's email
        $subject = "Phangisa Customer Request : " . $fdata['subject']; //subject
        //message
        $message ='From , ' . $fdata['first_name'] . ' ' . $fdata['last_name'] . '!<br><br>Message :<br>
        -------------------------------------------------<br>' . $fdata['comments'] . '<br>Contact :' . $fdata['telephone'] . '<br>';
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        redirect("contactform/mailsent");
    }

    public function mailsent() {
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("contactform/mailsent", $data);
    }

}
