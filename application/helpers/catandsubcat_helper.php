<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!function_exists("get_subcategory_by_id")) {

    function get_subcategory_by_id($id) {
        $CI_inst = &get_instance();
        $CI_inst->load->model(array("businesscategorylist_db", "businesscategorylist_includes_db"));
        return $CI_inst->businesscategorylist_includes_db->get_subcategory_by_id($id);
    }

}

