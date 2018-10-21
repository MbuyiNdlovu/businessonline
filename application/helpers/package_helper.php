<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("all_packages")) {
    function all_packages() {
        $CI = &get_instance();
        $CI->load->model("package_db");
        return $CI->package_db->get_packages();
    }
}