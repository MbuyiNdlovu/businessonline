<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("get_default_username")) {
    function get_default_username() {
        return "active@phangisa.co.za";
    }
}

if (!function_exists("get_default_password")) {
    function get_default_password() {
        return do_hash('phangisa.co.za', 'md5');
    }
}