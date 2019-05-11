<section class="businessleads">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mb-2">
                    <h4><strong>SELECTED PROFILE</strong></h4>
                    <p> <strong><?php echo $product_service['business_name']; ?></strong></p>
                    <div class="profileimg">
                        <img class="rounded-circle" src="http://unsplash.it/200/200" alt="Please check your internet connection">
                    </div>
                    <P><strong>My Business Address</strong> </P>
                    <p><?php echo $product_service['location']; ?><br>
                        
                    <p> <?php echo $product_service['contact_no']; ?></p>
                    
                       <p><b>Product/Service</b></p>
                    <p><?php
                if ($own_business) {

                  /*  echo "<a href=" . base_url() . "t/product_service_edit_form/$product_service[business_id]/$product_service[productservice_id]/url></a>";
                    echo '<hr class="colorgraph">';
                    if ($product_service) {
                        echo '<form method="post" action=' . base_url() . 't/update_product_service>';
                        echo "<input name='business_id' type='hidden' value=$business_id>";
                        echo "<input name='productservice_id' type='hidden' value=$productservice_id>";
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">On promotion?</label><br/>';
                        $a_promotion = array(0 => "No", 1 => "Yes");
                        echo form_dropdown("on_promotion", $a_promotion, $product_service['on_promotion'], 'class="form-control"');
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Name:</label><br/>';
                        echo "<input name='productservice_name' type='text' class='form-control input-lg' value='$product_service[productservice_name]'>";
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Description:</label><br/>';
                        echo "<input name='productservice_description'  type='text' class='form-control input-lg' value='$product_service[productservice_description]'>";
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Code:</label><br/>';
                        echo " <input name='productservice_code' type='text' class='form-control input-lg' value='$product_service[productservice_code]'>";
                        echo '   </div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Category:</label>';
                        $each_subcat = get_subcategory_by_id((isset($product_service['businesscategorylist_includes_id']) ? $product_service['businesscategorylist_includes_id'] : 1));


                        if ($each_subcat) {
                            echo $each_subcat['includes_item'] . " . <a href=" . base_url() . "t/on_edit_categorylist/$product_service[business_id]/$product_service[productservice_id]/><i class='glyphicon glyphicon-edit'></i></a>";
                        } else {
                            
                        }
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Price:</label>';
                        echo "<input name='price' type='text' class='form-control input-lg' value='$product_service[price]'>";
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-12"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    </div>';
                        echo '</form>';
                    }*/
                } else {
                    if ($product_service) {
                        ?>
                     
 
                                     <?php echo "R$product_service[price]"; ?></h4>
                                        <a href="#"><?php echo "$product_service[productservice_name]"; ?></a>
                                         <br/>
                                        <?php echo "$product_service[productservice_description]"; ?>
                                   
                                   <br/>
                                            <b>   
                                                <?php
                                                echo $product_service['productservice_code'];
                                                ?>
                                            </b>
                                       <br/>
                                  <?php echo "<a href=" . base_url("contactform/index/$product_service[business_id]/$product_service[productservice_id]") . "><i class='fa fa-envelope-o' ></i></a>" ?>
                              


                        <?php
                    }
                }
                ?></p>
                    
                    <p> <a href="<?php echo base_url("t/get_business_productsservices/".$business_id); ?>"> More Services</a></p>
                    
                </div>
                <div class="col-sm-8 mb-5">
                    <h4><strong>ABOUT US</strong></h4>
                  <?php
                if ($business_about) {
                    if ($own_business) {
                     /*   echo "<form method='post' action=" . base_url() . "about/update_about>";
                        echo "<div class='form-group'><textarea name='who_are_we'  rows='5' id='comment' class='form-control input-lg'> $business_about[who_are_we] </textarea> </div>";
                        echo "<div class='form-group'><textarea name='what_we_do'   rows='5' id='comment' class='form-control input-lg'>$business_about[what_we_do] </textarea></div>";
                        echo "<div class='form-group'><textarea name='our_mission'   rows='5' id='comment' class='form-control input-lg'>$business_about[our_mission] </textarea> </div>";
                       // echo "<div class='form-group'><textarea name='we_love_our_clients' rows='5' id='comment' class='form-control input-lg'>$business_about[we_love_our_clients] </textarea></div>";
                        echo "<input name='business_id'   type='hidden' value=$business_id>";
                        echo '<hr class="colorgraph">
			<div class="row">
				<div   align="right"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>';
                        echo "</form>";
                        ;*/
                    } else {
                        echo "<hr/><b>Who are  : </b><br/><br/>";
                        echo "<p> $business_about[who_are_we]</p><hr/>";

                        echo "<b>What we do : </b><br/><br/>";
                        echo "<p> $business_about[what_we_do]</p><hr/>";


                        echo "<b>Our mission : </b><br/><br/>";
                        echo "<p> $business_about[our_mission]</p><hr/>";


                        //echo "<b>We love our clients : </b><br/><br/>";
                       // echo "<p> $business_about[we_love_our_clients]</p><hr/>";
                    }
                } else {

                    if ($own_business) {
                       /* echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3>About ' . $business_name . '</h3></div></div>';
                        echo "
			<hr class='colorgraph'>";
                        echo "<form method='post' action=" . base_url() . "about/add_about>";
                        echo "<div class='form-group'><textarea class='form-control' rows='5' id='comment' name='who_are_we' placeholder='Describe your business here...'></textarea> </div>";
                        echo "<div class='form-group'><textarea class='form-control' rows='5' id='comment' name='what_we_do' placeholder='Describe what your business does here...'></textarea> </div>";
                        echo "<div class='form-group'><textarea class='form-control' rows='5' id='comment' name='our_mission' placeholder='Describe what your business mission?...'></textarea> </div>";
                        echo "<div class='form-group'><textarea class='form-control' rows='5' id='comment' name='we_love_our_clients' placeholder='What do you say about your clients?'></textarea> </div>";
                        echo "<input name='business_id'   type='hidden' value=$business_id>";
                        echo '<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Add" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>';
                        echo "</form>";*/
                    } else {  
                    }
                }
                ?>
                    <button class="category-btn3 btn" id="btn8">
                        <div class="count">Visit</div><i class="fas fa-map-marker-alt"></i>
                    </button>
                    <button class="category-btn3 btn" id="btn9">
                        <div class="count">Message</div><i class="far fa-envelope"></i>
                    </button>
                    <button class="category-btn3 btn" id="btn10">
                        <div class="count">Call</div><i class="fas fa-phone"></i>
                    </button>
                    <button class="category-btn3 btn" id="btn11">
                        <div class="count">Share</div><i class="fas fa-share-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>