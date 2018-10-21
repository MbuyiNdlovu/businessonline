<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Content extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'userlib'));
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->model(array('memberdb', 'businessdb', 'marketing_db'));
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;
        if (isset($membersession['email']) && isset($membersession['password'])) {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        } else {
            $this->userlib->id = 0;
        }
    }

    public function about() {
        $data['visitor_email'] = null;
        $registrations = $this->memberdb->count_members();
        $data['cnt_registrations'] = $registrations['total'];
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/about", $data);
        } else {
            $this->bukaweb_layout_out("content/about", $data);
        }
    }

    public function terms_conditions() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/terms_conditions", $data);
        } else {
            $this->bukaweb_layout_out("content/terms_conditions", $data);
        }
    }

    public function investors() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/investors", $data);
        } else {
            $this->bukaweb_layout_out("content/investors", $data);
        }
    }

    public function send_investor_request() {
        $fdata = $this->input->post();

        //refer
        $this->marketing_db->AddMember(strtolower($fdata['email']), "Invest", "Invest");

        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from($fdata['email'], 'Invest'); //sender's email
        $subject = "Phangisa Invest"; //subject
        $message = /* -----------email body starts----------- */
                $fdata['fullname'] . ' has sent a request !<br><br>
        Details.<br>
        -------------------------------------------------<br>
        Customer Name: ' . $fdata['fullname'] . '<br>
        Email: ' . $fdata['email'] . '<br>
        Location: ' . $fdata['country_id'] . '<br>
        DOB : ' . $fdata['birthdate'] . '<br>
        Gender : ' . $fdata['gender'] . '<br>
        Message :' . $fdata['message'] . '<br>
        -------------------------------------------------<br>
         <br>';
        /* -----------email body ends----------- */
        $this->email->to("invest@phangisa.co.za");
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();



        redirect("content/thankyou/");
    }

    public function refer() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/refer", $data);
        } else {
            $this->bukaweb_layout_out("content/refer", $data);
        }
    }

    public function send_refer() {
        $fdata = $this->input->post();

        //refer
        $this->marketing_db->AddMember(strtolower($fdata['email']), "Refer", "Refer");

        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from("info@phangisa.co.za", 'Phangisa Referral'); //sender's email
        $subject = "You have been refered to use Phangisa "; //subject
        $message = /* -----------email body starts----------- */
                'You have been invited to use www.phangisa.co.za !<br><br>';
        /* -----------email body ends----------- */
        $this->email->to($fdata['email']);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        redirect("content/refer_thankyou/");
    }

    public function promotions() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/promotions", $data);
        } else {
            $this->bukaweb_layout_out("content/promotions", $data);
        }
    }

    public function thankyou() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/thankyou", $data);
        } else {
            $this->bukaweb_layout_out("content/thankyou", $data);
        }
    }

    public function refer_thankyou() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/refer_thankyou", $data);
        } else {
            $this->bukaweb_layout_out("content/refer_thankyou", $data);
        }
    }

    public function how_does_it_work() {
        $data['visitor_email'] = null;
        if (isset($this->membersession['email']) && $this->membersession['email'] != get_default_username()) {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("content/how_does_it_work", $data);
        } else {
            $this->bukaweb_layout_out("content/how_does_it_work", $data);
        }
    }
}
?>