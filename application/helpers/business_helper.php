<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("get_business")) {
    function get_business($business_id) {
        $CI_Ins = &get_instance();
        $CI_Ins->load->model(array("businessdb"));
        return $CI_Ins->businessdb-> get_business($business_id);
    }
}
?>
