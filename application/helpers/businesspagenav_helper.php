<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("businessnav")) {
    function businessnav($business_id, $logo_url = null) {
        $bnav =  '<div class="panel panel-default" align="center">
            <div class="panel-heading">';
        $bnav .= '<img width="7%"  hight="7%" src="' . $logo_url . '" class="img-thumbnail" alt="Phangisa">';
        $bnav .= " <a href=" . base_url() . "about/index/$business_id><button type='button' class='btn btn-primary active'>About</button></a>&nbsp;";
        $bnav .= "<a href=" . base_url() . "t/get_business/$business_id><button type='button' class='btn btn-primary active'>Contact</button></a>&nbsp;";
        $bnav .= "<a href=" . base_url() . "t/get_business_productsservices/$business_id><button type='button' class='btn btn-primary active'>Services</button></a>";
        $bnav.= "</div></div>";
        return $bnav;
    }
}



if (!function_exists("adminnav")) {
    function adminnav() {
        $bnav =  '<div class="panel panel-default" align="center">
            <div class="panel-heading">';
        
        $bnav .= " <a href=" . base_url() . "admin/><button type='button' class='btn btn-primary active'>Broadcast</button></a>&nbsp;";
        $bnav .= "<a href=" . base_url() . "admin/get_registered_users><button type='button' class='btn btn-primary active'>Registered Users</button></a>&nbsp;";
        $bnav .= "<a href=" . base_url() . "admin/get_marketing_user_list><button type='button' class='btn btn-primary active'>Marketing List</button></a>";
        $bnav.= "</div></div>";
        return $bnav;
    }
}
?>