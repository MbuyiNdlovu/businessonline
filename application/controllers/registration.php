<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'userlib'));
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->model(array('memberdb', 'businessdb', 'marketing_db'));
    }

    public function index() {
        $session_data = $this->session->all_userdata();
        $business_id = isset($session_data['ideal_business_id']) ? $session_data['ideal_business_id'] : 0;
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        $session_data['visitor_email'] = isset($this->membersession['email']) ? $this->membersession['email'] : false;

        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $session_data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $session_data['logo_url'] = phangisa_logo();
        }

        $this->bukaweb_layout_out("registration/index", $session_data);
    }

    public function submit() {
        $fdata = $this->input->post();
        
        print_r($fdata);
        $success_status = FALSE;
//verifications
        /*if ($fdata['email']) {
            if ($this->memberdb->emailExists(strtolower($fdata['email']))) {
                $this->session->set_userdata($fdata);
                echo "That username is already used , please choose a different user name <a href=" . base_url() . "index.php/registration/index>Continue</a>";
                $success_status = FALSE;
                die();
            }

            $success_status = TRUE;
        }
        if ($fdata['password']) {
            if ($this->checkPassword($fdata['password']) == true) {
                $this->session->set_userdata($fdata);
                echo $this->checkPassword($fdata['password']) . " <a href=" . base_url() . "index.php/registration/index/>Back</a>";
                $success_status = FALSE;
                die();
            }
            $success_status = TRUE;
        }
*/
        //if ($success_status == TRUE) {
            $activation_code = do_hash($fdata['email'], 'md5');
            $this->memberdb->AddMember(strtolower($fdata['email']), "", '1970-01-01', 0,101, 2, strtolower($fdata['email']), do_hash($fdata['password'], 'md5'), $activation_code);
           // $this->marketing_db->AddMember(strtolower($fdata['email']), $fdata['firstname'], $fdata['lastname']);
            //$this->send_confirmation($fdata['firstname'], $fdata['email'], $activation_code, $fdata['password']);
            //redirect("registration/account_created_thank_you");
       // }
    }

    public function checkPassword($pwd) {
        if (strlen($pwd) < 8) {
            return "Password too short!";
        }

        if (!preg_match("#[0-9]+#", $pwd)) {
            return "Password must include at least one number!";
        }

        if (!preg_match("#[a-zA-Z]+#", $pwd)) {
            return "Password must include at least one letter!";
        }
        return false;
    }

    public function account_created_thank_you() {
         $data['visitor_email'] = null;
        $session_data = $this->session->all_userdata();
        $business_id = isset($session_data['ideal_business_id']) ? $session_data['ideal_business_id'] : 0;
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        
        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $this->bukaweb_layout_out("registration/account_created_thank_you", $data);
    }

    function send_confirmation($name, $username, $hash, $password) {
        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from('info@phangisa.co.za', 'Phangisa Registration'); //sender's email
        $address = $username; //receiver's email
        $subject = "Phangisa Registration"; //subject
        $link = base_url() . 'index.php/registration/verify?' . 'username=' . $username . '&hash=' . $hash;
        $message = /* -----------email body starts----------- */
                'Thanks for signing up, ' . $name . '!<br><br>
      
        Here are your login details.<br>
        -------------------------------------------------<br>
        Username: ' . $username . '<br>
        Password: ' . $password . '<br>
        -------------------------------------------------<br>
        <a href="' . $link . '">' . $link . '</a><br>';
        /* -----------email body ends----------- */
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function verify() {
        if (isset($_GET['username']) && isset($_GET['hash'])) {
            if ($this->memberdb->hash_and_username_exist($_GET['hash'], $_GET['username'])) {
                $this->memberdb->activate_user($_GET['username']);
                redirect("login");
            } else {
                die("Invalid parameters");
            }
        } else {
            die("Please try again");
        }
    }

}
