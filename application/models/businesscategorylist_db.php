<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class businesscategorylist_db extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_categories() {

        $sql = "select * from businesscategorylist";
        $query = $this->db->query($sql);

        return !empty($query) ? $query->result_array() : false;
    }

}
