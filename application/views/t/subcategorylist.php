<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
die("ggg");

echo '<div class="panel panel-default">
  <div class="panel-heading">';
echo "Please select the sub-category of choice";
echo '</div>
</div>';


foreach ($subcategories as $s) {
    print_r($s);
    
    die();
    
    echo "<a href=" . base_url() . "t/productservice_create_form/$business_id/>" . $s['includes_item'] . "</a>";
    echo "<br/>";
}