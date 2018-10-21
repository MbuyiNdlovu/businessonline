<?php

if (!function_exists("getProvincesByCountryID")) {

    function getProvincesByCountryID($countryID) {


        $CI_Ins = &get_instance();

        $CI_Ins->load->model(array("provincedb"));

        $provinces = $CI_Ins->provincedb->getProvinces($countryID);

        return $provinces;
    }

}

if (!function_exists("getProvinceByID")) {

    function getProvinceByID($provinceID) {

        $CI_Ins = &get_instance();

        $CI_Ins->load->model(array("provincedb"));

        $province = $CI_Ins->provincedb->getProvince($provinceID);

        return $province;
    }

}
?>