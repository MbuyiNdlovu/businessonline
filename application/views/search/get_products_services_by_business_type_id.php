<section class="userregitrationinform">
    <div class="row">
        <div class="col-sm-4 offset-4">
            <?php
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
            ?>
        </div></div> </section>