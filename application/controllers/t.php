<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class T extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("businessdb", "social_db"));
        $this->load->model("productservicedb");
        $this->load->library(array('session', 'userlib', 'user_agent'));
        $this->load->helper(array('form', 'url', 'security', 'catandsubcat', 'package_helper'));
        $this->load->model(array('memberdb'));
        $this->load->model(array("businesscategorylist_db", "businesscategorylist_includes_db"));
        $this->membersession = $this->session->all_userdata();
                $this->load->model(array('memberdb', 'about_db'));

        $membersession = $this->membersession;
        $this->userlib->getUser($membersession['email'], $membersession['password']);
        $this->starndard_amount = 25;
        if ($this->userlib->id == false) {
            redirect("login");
        }

        $this->userdata = $this->session->all_userdata();
        
    }

    public function categorylist($business_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['categories'] = $this->businesscategorylist_db->get_categories();
        $data['business_id'] = $business_id;

        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }



        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/categorylist", $data);
    }

    public function index() {
        $data['mybusinesses'] = $this->businessdb->get_businesses_by_member_id($this->userlib->id);
        $data['onlineuser_data'] = $this->userdata;
        if (isset($data['logo_url']) && strlen($data['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/index", $data);
    }

    public function get_business($business_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['visitor_email'] = $this->membersession['email'];
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        $business = get_business($business_id);
        $data['logo_url'] = $business['logo_url'];



        if (sizeof($data['thisbusiness']) < 1) {
            $this->bukaweb_layout("pagestatuses/notfound", $data);
        } else {
            $data['company_social_media_links'] = $this->social_db->get_social_media_by_business_id($business_id);
            $data['own_business'] = FALSE;

            $data['business_id'] = $business_id;
            if ($this->businessdb->is_my_business($business_id, $this->userlib->id)) {
                $data['own_business'] = TRUE;
            }

            $data['onlineuser_data'] = $this->userdata;
            $data['member_id'] = $this->userlib->id;
            if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
                $data['logo_url'] = $data['thisbusiness']['logo_url'];
            } else {
                $data['logo_url'] = phangisa_logo();
            }
            $this->bukaweb_layout("t/get_business", $data);
        }
    }

    public function business_edit_form($business_id, $fieldname) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['visitor_email'] = $this->membersession['email'];
        if ($this->businessdb->is_my_business($business_id, $this->userlib->id) == true) {
            
        } else {
            die("Url manipulation is not allowed");
        }

        $data['business_id'] = $business_id;
        $data['fieldname'] = $fieldname;

        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $this->bukaweb_layout("t/business_edit_form", $data);
    }

    public function productservice_edit_form($business_id, $productservie_id, $fieldname) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($productservie_id)) {
            die("Something went wrong.");
        }

        $data['back'] = $this->agent->referrer();
        $data['business_id'] = $business_id;
        $data['fieldname'] = $fieldname;
        $data['productservie_id'] = $productservie_id;
        $data['logo_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : false;
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/productservice_edit_form", $data);
    }

    public function business_create_form() {
        
        
        if(get_default_username()==$this->membersession['email']){
            
             redirect("login");
        }
        

        $data['logo_url'] = phangisa_logo();

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/business_create_form", $data);
    }

    public function submit_create_business() {
        $this->load->library('upload', upload_config());
        if ($this->upload->do_upload("userfile")) {
            $data = array('upload_data' => $this->upload->data());
            $attachment_url = base_url() . "uploads/" . $data['upload_data']['file_name'];

            $fdata = $this->input->post();
            unset($fdata['submit']);
            $fdata['member_id'] = $this->userlib->id;
            $fdata['logo_url'] = $attachment_url;
            $fdata['active'] = 1;
            $this->businessdb->add_business($fdata);

            //a new service provider has joined Phangisa

            $all_members = $this->memberdb->get_all_members();

            $subject = "Phangisa Service Provider";
            $message = "A new serivice provider <b>'" . $fdata['business_name'] . "'</b> has joined Phangisa community. Go to www.phangisa.co.za for more details.";
            $this->load->library('email');   //load email library
            $this->email->set_mailtype("html");
            $this->email->from('info@phangisa.co.za', $subject); //sender's email

            $cnt = 0;
            foreach ($all_members as $am) {

                $this->email->to($am['member_email']);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();

                $cnt++;
                if ($cnt % 5 == 0) {
                    sleep(5);
                }
            }


            redirect("t");
        } else {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
    }

    public function get_business_productsservices($business_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['company_social_media_links'] = $this->social_db->get_social_media_by_business_id($business_id);
        $data['own_business'] = FALSE;
        $data['business_id'] = $business_id;
        if ($this->businessdb->is_my_business($business_id, $this->userlib->id)) {
            $data['own_business'] = TRUE;
        }
        $business = get_business($business_id);
        $data['logo_url'] = $business['logo_url'];


        $data['businessproductsservices'] = $this->productservicedb->get_productservice_by_business_id($business_id);

        foreach ($data['businessproductsservices'] as $d) {

            if (strlen($d['logo_url']) > 0) {
                $data['logo_url'] = $d['logo_url'];
            }
        }


        if (isset($data['logo_url']) && strlen($data['logo_url']) > 0) {
            
        } else {
            $data['logo_url'] = phangisa_logo();
        }

        $data['business_id'] = $business_id;

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/get_business_productsservices", $data);
    }

    public function productservice_create_form($business_id, $category_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($category_id)) {
            die("Something went wrong.");
        }


        if ($this->businessdb->is_my_business($business_id, $this->userlib->id) == true) {
            
        } else {
            die("Url manipulation is not allowed");
        }
        $data['subcategories'] = $this->businesscategorylist_includes_db->get_subcategories($category_id);
        $data['onlineuser_data'] = $this->userdata;
        $data['business_id'] = $business_id;

        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }





        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/productservice_create_form", $data);
    }

    public function submit_create_productservice() {
        $url = null;
        $this->load->library('upload', upload_config());
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $xdata = $this->upload->data();
            $url = base_url() . 'uploads/' . $xdata['file_name'];
        }

        $data = $this->input->post();
        $product_service_id = $this->productservicedb->add_productservice($data['productsevicename'], $data['productsevicedescription'], $data['productsevicecode'], $url, $data['business_id'], $this->userlib->id, $data['businesscategorylist_includes_id'], $data['on_promotion']);

        //service provider x has added a new product/service


        $all_members = $this->memberdb->get_all_members();

        $subject = "Phangisa 'new' product/service";
        $message = "A new product/service <b>'" . $data['productsevicename'] . "'</b> has been added to Phangisa platform by a service provider. Go to www.phangisa.co.za for more details.";
        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from('info@phangisa.co.za', $subject); //sender's email

        $cnt = 0;
        foreach ($all_members as $am) {

            $this->email->to($am['member_email']);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();

            $cnt++;
            if ($cnt % 5 == 0) {
                sleep(5);
            }
        }



        redirect("/t/view_product_service/$data[business_id]/$product_service_id");
    }

    public function update_business() {
        $data = $this->input->post();
        if ($data['fieldname'] == 'package_id') {
            $package_ammount = 0;
            $all_packages = all_packages();
            foreach ($all_packages as $a_p) {
                if ($a_p['package_id'] == $data['new_input']) {
                    $package_ammount = $a_p['package_monthly_fee'];
                }
            }
            redirect("payment/loggedin/add_record/$data[business_id]/$package_ammount/1");
        }

        if ($data['fieldname'] == 'logo_url') {
            $this->load->library('upload', upload_config());
            if ($this->upload->do_upload("userfile")) {
                $data = array('upload_data' => $this->upload->data());
                $attachment_url = base_url() . "uploads/" . $data['upload_data']['file_name'];

                $data = $this->input->post();
                unset($data['submit']);

                $data['logo_url'] = $attachment_url;
            } else {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
        }

        unset($data['country_name']);
        unset($data['province_name']);
        unset($data['fieldname']);

        $this->businessdb->update_business($data['business_id'], $data);
        redirect("/t/get_business/$data[business_id]");
    }

    public function remove_business($business_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        if ($this->businessdb->is_my_business($business_id, $this->userlib->id) == true) {
            
        } else {
            die("Url manipulation is not allowed");
        }


        $data['active'] = 0;

        $this->businessdb->update_business($business_id, $data);

        redirect("t");
    }

    public function verify_remove_business($business_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['business_id'] = $business_id;
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/verify_remove_business", $data);
    }

    public function view_product_service($business_id, $productservice_id = 0) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($productservice_id)) {
            die("Something went wrong.");
        }

        $data['own_business'] = FALSE;
        $data['business_id'] = $business_id;
        $data['productservice_id'] = $productservice_id;
        if ($this->businessdb->is_my_business($business_id, $this->userlib->id)) {
            $data['own_business'] = TRUE;
        }

        $data['back'] = $this->agent->referrer();
        $data['product_service'] = $this->productservicedb->get_productservice__product_id_business_id($business_id, $productservice_id);

        if (isset($data['product_service']['logo_url']) && strlen($data['product_service']['logo_url']) > 0) {
            $data['logo_url'] = $data['product_service']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];
        $data['business_about'] = $this->about_db->get_business_about($business_id);

        $this->bukaweb_layout("t/view_product_service", $data);
    }

    public function verify_remove_product_service($business_id, $product_service_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }

        $data['business_id'] = $business_id;
        $data['product_service_id'] = $product_service_id;

        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/verify_remove_product_service", $data);
    }

    public function product_service_edit_form($business_id, $productservice_id, $fieldname) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($productservice_id)) {
            die("Something went wrong.");
        }

        if ($this->businessdb->is_my_business($business_id, $this->userlib->id) == true) {
            
        } else {
            die("Url manipulation is not allowed");
        }

        $data['back'] = $this->agent->referrer();
        $data['business_id'] = $business_id;
        $data['productservice_id'] = $productservice_id;
        $data['fieldname'] = $fieldname;
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);


        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/product_service_edit_form", $data);
    }

    public function remove_product_service($business_id, $product_service_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }

        $this->productservicedb->update_productservice($business_id, $product_service_id, $this->userlib->id, 'active', 0);
        redirect("/t/get_business_productsservices/$business_id");
    }

    public function update_product_service() {
        $data = $this->input->post();
        if (isset($data['vtfileupload']) && $data['vtfileupload'] == 1) {


            $this->load->library('upload', upload_config());
            if ($this->upload->do_upload("userfile")) {
                $data = array('upload_data' => $this->upload->data());
                $attachment_url = base_url() . "uploads/" . $data['upload_data']['file_name'];

                $data = $this->input->post();
                unset($data['submit']);

                $where = array("business_id" => $data['business_id'], "productservice_id" => $data['productservice_id']);

                $new_data = array("url" => $attachment_url);

                $this->productservicedb->update_productservice($where, $new_data);
                redirect("t/view_product_service/$data[business_id]/$data[productservice_id]");
            } else {
                die("error occured.");
            }
        } else {
            $data = $this->input->post();



            unset($data['submit']);

            $where = array("business_id" => $data['business_id'], "productservice_id" => $data['productservice_id']);

            $this->productservicedb->update_productservice($where, $data);

            redirect("t/view_product_service/$data[business_id]/$data[productservice_id]");
        }
    }

    public function get_other_businesses($start = 1) {
        if (!is_numeric($start)) {
            die("Something went wrong.");
        }
        $data['visitor_email'] = $this->membersession['email'];

        $data['back'] = $this->agent->referrer();
        $data = $this->input->post();
        $data['otherbusinesses'] = array();
        $cnt = 0;
        foreach ($this->businessdb->get_other_businesses($this->userlib->id) as $ob) {
            $cnt++;
            if (($cnt >= $start) && ($cnt < $start + 3)) {

                $data['otherbusinesses'][] = $ob;
            }
        }

        $data['start'] = $start;

        $data['logo_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : false;

        $data['visitor_email'] = $this->membersession['email'];
    }

    public function get_other_business_by_id($business_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['back'] = $this->agent->referrer();
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        if (isset($data['thisbusiness']['logo_url']) && strlen($data['thisbusiness']['logo_url']) > 0) {
            $data['logo_url'] = $data['thisbusiness']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }

        $data['onlineuser_data'] = $this->userdata;

        $data['member_id'] = $this->userlib->id;

        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/other/get_other_business_by_id", $data);
    }

    public function get_other_business_productsservices($business_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        $data['businessproductsservices'] = $this->productservicedb->get_productservice_by_business_id($business_id);
        $data['business_id'] = $business_id;

        $data['logo_url'] = '';
        foreach ($data['businessproductsservices'] as $p_s) {
            if (strlen($p_s['logo_url']) > 0) {

                $data['logo_url'] = $p_s['logo_url'];
            }
        }



        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/other/get_other_business_productsservices", $data);
    }

    public function view_other_product_service($business_id, $productservice_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($productservice_id)) {
            die("Something went wrong.");
        }

        $data['back'] = $this->agent->referrer();
        $data['email'] = $this->userlib->email;
        $data['product_service'] = $this->productservicedb->get_productservice__product_id_business_id($business_id, $productservice_id);



        if (isset($data['product_service']['logo_url']) && strlen($data['product_service']['logo_url']) > 0) {
            $data['logo_url'] = $data['product_service']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];

        $this->bukaweb_layout("t/other/view_other_product_service", $data);
    }

    public function on_edit_categorylist($business_id, $product_service_id) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }



        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }

        $data['visitor_email'] = $this->membersession['email'];
        $data['categories'] = $this->businesscategorylist_db->get_categories();
        $data['business_id'] = $business_id;
        $data['product_service_id'] = $product_service_id;
        $this->bukaweb_layout("t/on_edit_categorylist", $data);
    }

    public function on_edit_subcategorylist($business_id, $product_service_id, $category_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }

        if (!is_numeric($category_id)) {
            die("Something went wrong.");
        }

        $data['subcategories'] = $this->businesscategorylist_includes_db->get_subcategories($category_id);
        $data['onlineuser_data'] = $this->userdata;
        $data['product_service_id'] = $product_service_id;
        $data['business_id'] = $business_id;

        $data['logo_id'] = isset($this->membersession['ideal_business_id']) ? $this->membersession['ideal_business_id'] : false;
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/on_edit_subcategorylist", $data);
    }

    public function update_product_service_subcat($business_id, $product_service_id, $field_name, $new_input) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($product_service_id)) {
            die("Something went wrong.");
        }



        $where = array("business_id" => $business_id, "productservice_id" => $product_service_id);


        $new_data = array($field_name => $new_input);


        $this->productservicedb->update_productservice($where, $new_data);


        redirect("t/view_product_service/$business_id/$product_service_id");
    }

    public function get_my_business_about($business_id) {


        if ($this->businessdb->is_my_business($business_id, $this->userlib->id) == true) {
            
        } else {
            die("Url manipulation is not allowed");
        }

        $data['business_id'] = $business_id;

        $data['companydata'] = $this->businessdb->get_business_about($business_id, $this->userlib->id);
        if (isset($data['companydata']['logo_url']) && strlen($data['companydata']['logo_url']) > 0) {
            $data['logo_url'] = $data['companydata']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }
        $data['visitor_email'] = $this->membersession['email'];

        $this->bukaweb_layout("t/get_my_business_about", $data);
    }

    public function get_other_business_about($business_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }



        $data['business_id'] = $business_id;

        $data['companydata'] = $this->businessdb->get_business_about($business_id, 0);


        if (isset($data['companydata']['logo_url']) && strlen($data['companydata']['logo_url']) > 0) {
            $data['logo_url'] = $data['companydata']['logo_url'];
        } else {
            $data['logo_url'] = phangisa_logo();
        }


        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/other/get_other_business_about", $data);
    }

    public function calculate_amount($business_id = 0) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $this->load->helper(array("form", "url"));
        $fdata = $this->input->post();



        if ($business_id == 0) {

            $business_id = $fdata['business_id'];
        }


        $fdata['business_id'] = $business_id;



        $days = isset($fdata['days']) ? $fdata['days'] : 0;
        $fdata['days'] = $days;
        if (is_numeric($days) && $days > 0) {
            $fdata['calculated_amount'] = $this->starndard_amount * $days;
        }

        $fdata['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/calculate_amount", $fdata);
    }

    public function quotation() {
        
    }

    public function add_days($business_id, $days) {
        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }
        if (!is_numeric($days)) {
            die("Something went wrong.");
        }



        //restrict to specific user to be able to add days for other businesses.
        $email = $this->businessdb->add_business_days_remaining($business_id, $days);
        die("Send email to : " . $email . " Dear Client

We truly appreciate your business, and we're grateful for the trust you've placed in us. Please don't hesitate to call me if ever a problem should arise. We hope to have the pleasure of doing business with you for many years to come.

Sincerely,");
    }

    public function remove_days() {
        //restrict to specific user to be able to remove days for other businesses.
        $this->businessdb->remove_business_days_remaining();
        die("Send email to admin to show that the query was run");
    }

    public function accept_quotation($business_id, $days) {
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);
        $total_amount = $this->starndard_amount * $days;
        $reference = $total_amount . "_" . $days . "_" . date("Y-m-d");
        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from($this->userlib->email, 'Phangisa Sales'); //sender's email
        $address = 'sales@phangisa.co.za'; //receiver's email
        $subject = "Request For Listing. Ref :" . $reference; //subject
        $message = /* -----------email body starts----------- */
                'Thanks for requesting a  service from us, ' . $this->userlib->name . '!<br><br>
      
        Customer Details.<br>
        -------------------------------------------------<br>
        Customer Name: ' . $this->userlib->name . " " . $this->userlib->surname . '<br>
        Business Name: ' . $data['thisbusiness']['business_name'] . '<br>
        Business Email: ' . $data['thisbusiness']['email'] . '<br>
        User Email: ' . $this->userlib->email . '<br> 
        Location: ' . $data['thisbusiness']['location'] . '<br>
        Contact : ' . $data['thisbusiness']['contact_no'] . '<br>
        Business ID : ' . $data['thisbusiness']['business_id'] . '<br>
        Amount Due : R ' . $total_amount . '<br>
        Days to add : ' . $days . '<br>
        Ref :' . $reference . '<br>
        -------------------------------------------------<br>
         <br>';



        /* -----------email body ends----------- */
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        redirect("t/listing_request_sent/" . $reference);
    }

    public function listing_request_sent($reference) {
        $data['reference'] = $reference;
        $data['visitor_email'] = $this->membersession['email'];
        $this->bukaweb_layout("t/listing_request_sent", $data);
    }

    public function send_contact_message() {
        $this->load->helper("url");

        $fdata = $this->input->post();
        if ($fdata['InputSum'] == $fdata['InputReal']) {
            $data['thisbusiness'] = $this->businessdb->get_business($fdata['business_id']);
            $this->send_email($fdata['InputName'], $data['thisbusiness']['email'], $fdata['InputEmail'], $fdata['InputMessage']);
            redirect("t/succesfully_sent/" . $fdata['business_id']);
        } else {
            die("You did not prove you're human :) :) :)");
        }
    }

    function send_email($name, $business_email, $sender_email, $msg) {
        $this->load->library('email');   //load email library
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, 'phangisa'); //sender's email
        $address = $business_email; //receiver's email
        $subject = "Business Contact Us"; //subject

        $message = /* -----------email body starts----------- */
                'Sender : ' . $name . '!<br><br>
      
        Message below: <br>
        -------------------------------------------------<br>
         ' . $msg . '<br>
    
        -------------------------------------------------<br>
     <br>';
        /* -----------email body ends----------- */
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function succesfully_sent($business_id) {

        if (!is_numeric($business_id)) {
            die("Something went wrong.");
        }

        $data['visitor_email'] = $this->membersession['email'];
        $data['thisbusiness'] = $this->businessdb->get_business($business_id);

        $this->bukaweb_layout("t/succesfully_sent", $data);
    }

    public function get_promotions() {
        $data['visitor_email'] = $this->membersession['email'];
        $data['promotions'] = $this->productservicedb->get_promotions();
        $this->bukaweb_layout("t/get_promotions", $data);
    }

}

?>