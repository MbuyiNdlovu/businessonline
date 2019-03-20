 <section class="userregitrationinform">
        <div class="row">
            <div class="col-sm-4 offset-4">
                 <?php
               // echo businessnav($business_id,$logo_url);
                ?>
         
        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
           <?php echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3>Products and Services</h3></div></div>'; ?>
            <br>
            <?php
            if ($own_business) {
                $cnt = 0;
                $k = 0;
                $i = 0;
                if ($businessproductsservices) {
                    foreach ($businessproductsservices as $bps) {

                        $cnt++;

                        if ($i % 3 == 0) {
                            echo '<div class="row">';
                            echo '<div class="col-sm-4">';
                            echo " <img src=$bps[url] width='20%' height='20%'>";
                            
                       

                            echo "<h4><a href=" . base_url() . "t/view_product_service/$business_id/$bps[productservice_id]>";
                            echo $bps['productservice_name'] . '</a></h4>';
 echo ' <p>Price : ' . $bps['price'] . '</p>';

                            echo '<p>' . $bps['productservice_description'] . '</p>
    </div> ';
                        
                            
                            
                               echo '<hr/>';
                        } else {

                            echo '<div class="col-sm-4">';
                            echo " <img src=$bps[url] width='20%' height='20%'>";
                            echo "<h4><a href=" . base_url() . "t/view_product_service/$business_id/$bps[productservice_id]>";
                            echo $bps['productservice_name'] . '</a></h4>';
 echo ' <p>Price : ' . $bps['price'] . '</p>';
                            echo '  <p>' . $bps['productservice_description'] . '</p>
    </div> ';
                            if ($cnt % 3 == 0) {
                                echo "</div><br/><br/>";
                            }
                            echo '<hr/>';
                        }

                        /*  echo '<div class="panel panel-default">
                          <div class="panel-body">';
                          echo "<img src=$bps[url] width='5%' height='5%'>" . $bps['productservice_name'] . " . <a href=" . base_url() . "index.php/t/view_product_service/$business_id/$bps[productservice_id]>view</a> | <a href=" . base_url() . "index.php/trading/verify_remove_product_service/$business_id/$bps[productservice_id]><i class='glyphicon glyphicon-remove'></i></a>";
                          echo ' </div>
                          </div>'; */

                        $i++;
                        
                        
                        
                    }
                } else {

                    echo '<div class="panel panel-default">
<div class="panel-body">';

                    echo "You have not added any products or services.";

                    echo ' </div>
</div>';
                }





                echo '</div><div class="panel panel-default" align=center>
<div class="panel-body">';

                echo "<a href=" . base_url() . "t/categorylist/$business_id> <button   type='button' class='btn btn-success'>Create New Product/Services</button></a></li>";

                echo ' </div>
</div>';
            } else {



                if ($businessproductsservices) {

                    $cnt = 0;
                    $k = 0;
                    $i = 0;
                    foreach ($businessproductsservices as $bps) {

                        $cnt++;

                        if ($i % 3 == 0) {
                            echo '<div class="row">';
                            echo '<div class="col-sm-4">';
                            echo " <img src=$bps[url] width='20%' height='20%'>";
                            echo "<h4><a href=" . base_url() . "t/view_product_service/$business_id/$bps[productservice_id]>";
                            echo $bps['productservice_name'] . '</a></h4>';

                            echo ' <p>' . $bps['productservice_description'] . '</p>';
                            
                              echo "<p><a href=". base_url("contactform/index/$business_id/$bps[productservice_id]")."><i class='fa fa-envelope-o' ></i></a></p>";
                                

    echo '</div> ';
    
       echo '<hr/>';
                        } else {

                            echo '<div class="col-sm-4">';
                            echo " <img src=$bps[url] width='20%' height='20%'>";
                            echo "<h4><a href=" . base_url() . "t/view_product_service/$business_id/$bps[productservice_id]>";
                            echo $bps['productservice_name'] . '</a></h4>';

                            echo '  <p>' . $bps['productservice_description'] . '</p>';
                             echo "<p><a href=". base_url("contactform/index/$business_id/$bps[productservice_id]")."><i class='fa fa-envelope-o'></i></a></p>";
                                
    echo '</div> ';
                            
                 
                            if ($cnt % 3 == 0) {
                                echo "</div><br/><br/>";
                            }
                            
                               echo '<hr/>';
                        }

                        /*  echo '<div class="panel panel-default">
                          <div class="panel-body">';
                          echo "<img src=$bps[url] width='5%' height='5%'>" . $bps['productservice_name'] . " . <a href=" . base_url() . "index.php/t/view_product_service/$business_id/$bps[productservice_id]>view</a> | <a href=" . base_url() . "index.php/trading/verify_remove_product_service/$business_id/$bps[productservice_id]><i class='glyphicon glyphicon-remove'></i></a>";
                          echo ' </div>
                          </div>'; */

                        $i++;
                    }
                } else {

                    echo '<div class="panel panel-default">
<div class="panel-body">';

                    echo "There are no products or services.";

                    echo ' </div>
</div>';
                }
            }
            ?>

        </div>

    </div>
</div>
 </section>