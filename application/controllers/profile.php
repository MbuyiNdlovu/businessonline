<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->membersession = $this->session->all_userdata();
        $membersession = $this->membersession;

        $this->load->model("visual_trait_pageview_db");
        $this->userlib->getUser(strtolower($membersession['email']), $membersession['password']);

        if ($this->userlib->id == false) {
            redirect("login");
        }
    }

    public function index($num = 1) {
        if (!is_numeric($num)) {
            die("Something went wrong.");
        }

        $data['logo_url'] = phangisa_logo();
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
        $data['email'] = strtolower($this->userlib->email);
        $data['num'] = $num;
        $data['profile_pic_url'] = $this->userlib->profile_pic_url;
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("profile/index", $data);
    }

    public function edit_profile($field) {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());

        $data['logo_url'] = phangisa_logo();
        $data['field'] = $field;
        $data['back'] = $this->agent->referrer();
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("profile/edit_form", $data);
    }

    public function update_profile() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());



        $data = $this->input->post();

        switch ($data['field']) {
            case "name":
                $data['field'] = "member_name";
                break;

            case "surname":
                $data['field'] = "member_surname";
                break;

            case "gender":
                $data['field'] = "member_gender";
                break;

            case "dob":
                $data['field'] = "member_dob";
                $data['newtext'] = $data['newtext_year'] . "-" . $data['newtext_month'] . "-" . $data['newtext_day'];
                break;


            case "email":
                $data['field'] = "member_email";
                break;


            case "password":
                $data['field'] = "member_password";
                break;

            case "province_id":
                $data['field'] = "member_province_id";
                break;

            case "location":
                $data['field'] = "member_location";
                break;

            case "profile_pic_url":
                $data['field'] = "profile_pic_url";
                break;
        }

          if (strlen($data['newtext']) < 1) {

          die("here");
          $data['back'] = $this->agent->referrer();
          redirect($data['back']);
          }  



        if ($data['field'] == 'profile_pic_url') {

            
            $this->load->library('upload', upload_config());
            if ($this->upload->do_upload("userfile")) {
                $data = array('upload_data' => $this->upload->data());
                $attachment_url = base_url() . "uploads/" . $data['upload_data']['file_name'];

                $fdata = $this->input->post();
                unset($fdata['submit']);
                $fdata['member_id'] = $this->userlib->id;


                $this->memberdb->updateMember('profile_pic_url', $attachment_url, $this->userlib->id);
                redirect("profile");
            } else {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);

                die();
            }
        } else if ($data['field'] == 'member_password') {


            if ($this->checkPassword($data['newtext']) == true) {

                echo "here";


                echo $this->checkPassword($data['newtext']) . " <a href=" . base_url() . "index.php/profile>Back</a>";
                die();
            } else {



                $this->memberdb->updateMember($data['field'], do_hash($data['newtext'], 'md5'), $this->userlib->id);
            }
        } else if ($data['field'] == 'member_email') {
            $this->checkEmal($data['newtext']);
            $this->memberdb->updateMember($data['field'], $data['newtext'], $this->userlib->id);
        } else {
            $this->memberdb->updateMember($data['field'], $data['newtext'], $this->userlib->id);
        }

        redirect('profile/successfully_updated');
    }

    public function successfully_updated() {
        //HITS
        $this->visual_trait_pageview_db->add_hit($this->userlib->id, current_url(), $this->input->ip_address());
        $data['logo_url'] = phangisa_logo();
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("profile/successfully_updated", $data);
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

    public function checkEmal($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // The email address is valid
        } else { // The email address is not valid 
            //  echo "Please check the email format and make sure it is correct. <a href=" . base_url() . "index.php/registration/index/$fieldID>Continue</a>";
            die("Email seems to me in incorrect format!" . " <a href=" . base_url() . "index.php/profile>Back</a>");
        }
    }

}
