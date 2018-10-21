<?php

if ($email == get_default_username()) {
    echo '<div class="panel panel-default">
  <div class="panel-heading">';
    echo "You are exploring Visual Trait platform.";


    echo '</div>
</div>';
} else {
    echo '<div class="panel panel-default">
  <div class="panel-heading">';
    echo "<b>" . $name . "</b>@" . $country_name . " / " . $province_name . " / " . $location;
    
    echo '</div>
</div>';
}

echo "<ul class=nav nav-pills>";

if ($email ==get_default_username()) {
} else {
   
}

//echo "<li role=presentation><a href=" . base_url() . "index.php/search/get_all_products_services/$ideal_business_id>VT service</a></li>";

/*
if ($email == get_default_username()) {

    echo "<li role=presentation><a href=" . base_url() . "index.php/trading/get_other_businesses>VT stores</a></li>";
} else {
    echo "<li role=presentation><a href=" . base_url() . "index.php/trading/>VT stores</a></li>";
}*/
//echo "<li role=presentation><a href=" . base_url() . "index.php/advertisement>Adverts</a></li>";

/*if ($email == get_default_username()) {
    echo "<li role=presentation><a href=" . base_url() . "index.php/login/>VT joinus</a></li>";
} else {
    echo "<li role=presentation><a href=" . base_url() . "index.php/login/logout>VT logout</a></li>";
}
*/
echo "</ul>";
?>