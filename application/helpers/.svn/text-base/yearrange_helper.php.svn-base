<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("yearRange")) {
    
    function yearRange($min = false, $max = false) {

        $min = isset($min) ? $min : date("Y") - 10;

        $max = isset($max) ? $max : date("Y");

        $years = array();
        
        foreach (range($min, $max) as $key=>$value)
        {
            $years[$value] = $value;
            
        }
        
        
        return $years;
        
    }
}
?>
