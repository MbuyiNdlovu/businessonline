<?php

/*
 * To change this template, choose Tools | Templates

 * and open the template in the editor.
 */
if (!function_exists("getCountries")) {

    function getCountries() {
        $CI_inst = &get_instance();

        $CI_inst->load->model("countrydb");

        return $CI_inst->countrydb->getCountries();
    }

}



if (!function_exists("getCountry")) {

    function getCountry($id) {
        $CI_inst = &get_instance();

        $CI_inst->load->model("countrydb");

        return $CI_inst->countrydb->getCountry($id);
    }

}

if (!function_exists("getProvinces")) {

    function getProvinces($countryID) {

        $CI_inst = &get_instance();

        $CI_inst->load->model("provincedb");


        return $CI_inst->provincedb->getProvinces($countryID);
    }

}

if (!function_exists("getProvince")) {

    function getProvince($id) {

        $CI_inst = &get_instance();

        $CI_inst->load->model("provincedb");

        return $CI_inst->provincedb->getProvince($id);
    }

}


if (!function_exists("getMunicipalities")) {

    function getMunicipalities($provinceID) {

        $CI_inst = &get_instance();
        
        $CI_inst->load->model("municipalitydb");

        return $CI_inst->municipalitydb->getMunicipalities($provinceID);
    }

}


if (!function_exists("getMunicipality")) {

    function getMunicipality($municipalID) {

        $CI_inst = &get_instance();

        $CI_inst->load->model("municipalitydb");

        return $CI_inst->municipalitydb->getMunicipality($municipalID);
    }

}


if (!function_exists("tracePerson")) {

    function tracePerson($personID) {

        $CI_inst = &get_instance();

        $CI_inst->load->model("persondb");


        return $CI_inst->persondb->tracePerson($personID);
    }

}
?>
