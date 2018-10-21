<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("get_all_social_media")){
    
    function get_all_social_media(){
        $CI=&get_instance();
        $CI->load->model("social_media_db");
   return $CI->social_media_db->get_all_social_media();
        
        
    }
}


if(!function_exists('facebook_like')){
 function facebook_like($url){
   $formlink  = '<iframe src="http://www.facebook.com/plugins/like.php?href=';
   $formlink .= urlencode($url);
   $formlink .= ';layout=button_count&show_faces=true&width=450&';
   $formlink .= 'action=like&colorscheme=light&height=21" scrolling="no"';
   $formlink .= 'frameborder="0" style="border:none; overflow:hidden;';
   $formlink .= 'width:450px;height:21px;" allowTransparency="true"></iframe>';               
   return $formlink;
  }
 }