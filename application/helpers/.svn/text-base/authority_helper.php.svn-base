<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!function_exists("getCountryAuthorities"))
{
   function getCountryAuthorities($countryID)
   {
       $CI_Inst = &get_instance();
       
       $CI_Inst->load->model(array("authoritydb"));
       
       $country_authorities = $CI_Inst->authoritydb->getAuthorities($countryID);
       
       return $country_authorities;
   }
}

?>
