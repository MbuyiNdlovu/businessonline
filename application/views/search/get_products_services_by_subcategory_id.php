<br/><br/><br/><br/>
<div class="container">
    <div class="row">
        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
            <ul class="list-group">
                <li class="list-group-item active">Please select the category</li>
<?php
 
         
                $search = array('name' => 'search_term', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Search by product / service");
                $password = array('name' => 'password', 'type' => 'password', 'class' => "form-control");
                $a_subcategory = array('name' => 'subcategory_id', 'type' => 'hidden', "value" => $subcategory_id);
                $attributes = array('class="form-signin"');

                echo form_open('search/get_products_services_by_subcategory_id_and_search_term', $attributes);

                // echo form_label('Visual Trait Filtering');
                echo '<br/>';
                echo form_input($search);
                echo form_input($a_subcategory);
                echo '<br/>';

                echo form_submit('submit', 'Search', 'class="btn btn-lg btn-primary btn-block"');
                echo '<span class="clearfix"></span>';
                echo form_close();


                echo "<br/><p align='center'><a href=" . base_url() . "search/categorylist>Filter</a> | ";

                echo "<a href=" . base_url() . "search/get_all_products_services/$ideal_business_id>All</a></p>";
                ?>
 
            </ul>
        </div>  
    </div>  
</div>

 
    <?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */


    if (sizeof($prodserv) > 0) {

        foreach ($prodserv as $ps) {

            $price = isset($ps['price']) ? "R " . $ps['price'] : 'Price not set';

            echo '<div class="row" id="features"  style="border:1px dotted black">
                <div class="col-sm-2 feature">';
            echo '<img src="' . $ps['url'] . '" alt="" width="50" height="50" class="img-rounded">
                </div><!--END feature-->

                <div class="col-sm-10 feature">';


            if ($userID == $ps['member_id']) {
                echo "<b>" . $ps['productservice_name'] . "</b>  ($price)<br/>" . substr($ps['productservice_description'], 0, 100) . "- managed by you ...";

                echo " <a href=" . base_url() . "index.php/t/view_product_service/$ps[business_id]/$ps[productservice_id]>More Details</a> ";


                echo " | <a href=" . base_url() . "index.php/contactform/index/$ps[business_id]/$ps[productservice_id]>Email</a> ";

                echo "<br/>Located : " . $ps['location'];
            } else {
                echo "<b>" . $ps['productservice_name'] . "</b> ($price) <br/>" . substr($ps['productservice_description'], 0, 100) . " ...";

                echo " <a href=" . base_url() . "index.php/t/view_other_product_service/$ps[business_id]/$ps[productservice_id]>More Details</a> ";


                echo " | <a href=" . base_url() . "index.php/contactform/index/$ps[business_id]/$ps[productservice_id]>Email</a> ";

                echo "<br/>Located : " . $ps['location'];
            }





            echo '</div><!--END feature-->
            </div><!--end features-->
            <br/>';
        }
    }  