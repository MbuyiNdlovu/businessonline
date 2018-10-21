<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'userlib'));
        $this->load->helper(array('form', 'url', 'security','businesspagenav'));
        $this->load->model(array('memberdb', 'businessdb', 'marketing_db'));
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->membersession = $this->session->all_userdata();

        $membersession = $this->membersession;

        if (isset($membersession['email']) && isset($membersession['password'])) {
            $this->userlib->getUser($membersession['email'], $membersession['password']);
        } else {
            $this->userlib->id = 0;
        }

        $this->unauthorizeduser = "You are not allowed to view this page.";
    }

    public function index() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            redirect("/admin/broadcast_message_form");
        } else {
            die($this->unauthorizeduser);
        }
    }

    public function broadcast_message_form() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("admin/broadcast_message_form", $data);
        } else {
            die($this->unauthorizeduser);
        }
    }

    public function send_broadcast_message() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            $all_members = $this->marketing_db->get_all_members();
            $list = array();
            $cnt = 0;
            foreach ($all_members as $am) {
                $list[$cnt] = $am['username'];
                $cnt++;
                /* if ($cnt % 5 == 0) {
                  sleep(5);
                  } */
            }


            $fdata = $this->input->post();
            $subject = $fdata['subject'];
            $message = $fdata['message'];
            $this->load->library('email');   //load email library
            $this->email->set_mailtype("html");
            $this->email->from('info@phangisa.co.za', $subject); //sender's email
            $this->email->to("info@phangisa.co.za");
            $this->email->bcc($list);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            redirect("/admin/broadcast_message_sent");
        } else {
            die($this->unauthorizeduser);
        }
    }

    public function broadcast_message_sent() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("admin/broadcast_message_sent", $data);
        } else {
            die($this->unauthorizeduser);
        }
    }

    public function get_registered_users() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            $data['all_members'] = $this->memberdb->get_all_members();
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("admin/get_registered_users", $data);
        } else {
            die($this->unauthorizeduser);
        }
    }

    public function get_marketing_user_list() {
        if (isset($this->membersession['email']) && $this->membersession['email'] == "ndlovmbu@gmail.com") {
            $data['all_members'] = $this->marketing_db->get_all_members();
            $data['visitor_email'] = $this->membersession['email'];
            $this->bukaweb_layout("admin/get_marketing_user_list", $data);
        } else {
            die($this->unauthorizeduser);
        }
    }

}
