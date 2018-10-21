<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">


   


                <h4 class="text-center login-title"><b>Search products or services</b></h4>


                <?php
                $search = array('name' => 'search_term', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Search by product / service");

                $attributes = array('class="form-signin"');

                echo form_open('search/get_all_products_services_by_search_term', $attributes);

                echo '<br/>';
                echo form_input($search);

                echo '<br/>';

                echo form_submit('submit', 'Search', 'class="btn btn-lg btn-primary btn-block"');
                echo '<span class="clearfix"></span>';
                echo form_close();

                echo "<br/><p align='center'><a href=" . base_url() . "search/categorylist>Filter</a></p>";
                ?>

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

$price = isset($ps['price'])?"R ".$ps['price']:'Price not set';
            

            echo '<div class="row" id="features"  style="border:1px dotted black">
              

              

                <div class="col-sm-4 feature">';
            
            
                        echo '<img src="' . $ps['url'] . '" alt="" width="50" height="50" class="img-rounded">';


            if ($userID == $ps['member_id']) {
                echo "  <b>" . $ps['productservice_name'] . "</b> ($price)." . substr($ps['productservice_description'], 0, 100) . "- managed by you ...";
                echo "  <a href=" . base_url() . "t/view_product_service/$ps[business_id]/$ps[productservice_id]>More Details</a> ";
                echo " | <a href=" . base_url() . "contactform/index/$ps[business_id]/$ps[productservice_id]>Email</a> ";
           
                           
           echo ".Located : ".$ps['location'];
                
            } else {
                echo "  <b>" . $ps['productservice_name'] . "</b> ($price)." . substr($ps['productservice_description'], 0, 100) . " ... ";
                echo " <a href=" . base_url() . "t/view_product_service/$ps[business_id]/$ps[productservice_id]>More Details</a> ";
                echo " | <a href=" . base_url() . "contactform/index/$ps[business_id]/$ps[productservice_id]>Email</a> ";
           
                           
           echo ".Located : ".$ps['location'];
                
            }

            echo '</div><!--END feature-->
            </div><!--end features-->
           <br/> ';
        }
    } else {

        echo '<div class="panel panel-default">
<div class="panel-body">';
        echo "Nothing was found.";
        echo ' </div>
</div>';
    }

 