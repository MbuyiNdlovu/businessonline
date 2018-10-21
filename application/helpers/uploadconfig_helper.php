<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("upload_config")) {

    function upload_config() {
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "*",
            'overwrite' => TRUE,
            'max_size' => "5242880", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "99999",
            'max_width' => "99999",
            'encrypt_name' => TRUE,
            'file_name' => time() ."_phangisa_" . $_FILES['file_name']['name']
        );
        
        return $config;
    }
}