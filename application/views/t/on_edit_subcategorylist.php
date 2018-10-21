<br/><br/>
<div class="container">
    <div class="row">
 <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
            <ul class="list-group">
                <li class="list-group-item active">Please select the subcategory</li>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
$a_subcategories = array();

foreach ($subcategories as $subcategory) {
    $a_subcategories[$subcategory['id']] = $subcategory['includes_item'];


    echo "<li class='list-group-item'><a href=" . base_url() . "t/update_product_service_subcat/$business_id/$product_service_id/businesscategorylist_includes_id/$subcategory[id]>" . $subcategory['includes_item'] . "</a></li>";
}

 




?>
            </ul>
        </div>  
    </div>  
</div>