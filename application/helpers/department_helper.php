<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("getDepartmentsByDivisionID")) {

    function getDepartmentsByDivisionID($divisionID) {
        $CI_inst = &get_instance();
        $CI_inst->load->model("departmentdb");
        $departments = $CI_inst->departmentdb->getDepartments($divisionID);
        return $departments;
    }

}

if (!function_exists("getDepartmentByDepartmentID")) {

    function getDepartmentByDepartmentID($departmentID) {
        $CI_inst = &get_instance();
        $CI_inst->load->model("departmentdb");
        $department = $CI_inst->departmentdb->getDepartment($departmentID);
        return $department;
    }

}
?>