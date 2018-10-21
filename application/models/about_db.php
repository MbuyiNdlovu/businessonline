<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class about_db extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_business_about($business_id) {
        $sql = "select * from about where business_id=$business_id";
        $query = $this->db->query($sql);
        return !empty($query) ? $query->row_array() : false;
    }

    public function add_about($data) {
        $this->db->insert("about", $data);
    }

    public function update_about($business_id,$data) {
        $where = array("business_id" => $business_id);
        $this->db->where($where)->update("about", $data);
    }
    
  
}
