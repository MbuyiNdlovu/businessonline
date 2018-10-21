<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<b>Are you sure you want to remove this product/service?</b>";
echo "<br/>";
echo "<br/>";
echo "<a href=" . base_url() . "t/remove_product_service/$business_id/$product_service_id>Yes</a>";
      

echo " | <a href=" . base_url() . "t/get_business_productsservices/$business_id>No</a>";
      


?>

