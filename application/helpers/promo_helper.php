<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("hasPromoted")) {

    function hasPromoted($criticism_id, $supporting_member_id) {
        $CI_Instance = &get_instance();

        $CI_Instance->load->model("promodb");

        $promostatus = $CI_Instance->promodb->get_promo_status($criticism_id, $supporting_member_id);

        return isset($promostatus['active']) ? $promostatus['active'] : -1;
    }

}
?>
