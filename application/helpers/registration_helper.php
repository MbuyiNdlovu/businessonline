<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("RegFields")) {
    function RegFields() {
        return array(1 => "name", 2 =>"surname", 3 =>"year_birth",4=>"month_birth",5=>"day_birth", 6 =>"gender", 7 =>"country_id", 8 => "province_id",9 =>"location",10 =>"contact_no",11=>"email",12=>"password");
    }
}