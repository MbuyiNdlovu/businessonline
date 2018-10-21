<br/>
<div class="container">
    <div class="row">
 
             <?php
                echo businessnav($thisbusiness['business_id'],$logo_url);
              ?>
     

    <?php
    if ($thisbusiness) {
        echo '<div class="row"><div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">';
        if ($own_business) {
            echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3>Update business details</h3></div></div>';
            echo "<div align='center'>";
            echo "<a href=" . base_url("t/business_edit_form/$business_id/logo_url") . "><img alt='Brand' src='$thisbusiness[logo_url]'  width='100%'></a>";
            echo "</div>";
          
            echo "<br/>";
            
            echo "<form method='post' action=" . base_url() . "t/update_business>";
            echo '<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">';

            echo "<input name='business_name' class='form-control input-lg' type='text' value='$thisbusiness[business_name]'>";
            echo '</div></div>';
            echo '<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">';
            echo "<input name='contact_no' class='form-control input-lg' type='text' value='$thisbusiness[contact_no]'>";
            echo '</div></div>';
            echo '</div>';
            echo '<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">';

            $countries = getAllCountries();
            $a_countries = array();
            foreach ($countries as $country) {
                $a_countries[$country['country_id']] = $country['country_name'];
            }
            echo form_dropdown("country_id", $a_countries, $thisbusiness['country_id'], "class='form-control input-lg'");
            echo '</div></div>';
            echo '<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">';
            $provinces = getProvincesByCountryID($thisbusiness['country_id']);
            $a_provinces = array();
            foreach ($provinces as $province) {
                $a_provinces[$province['province_id']] = $province['province_name'];
            }
            echo form_dropdown("province_id", $a_provinces, $thisbusiness['province_id'], "class='form-control input-lg'");
            echo ' </div>
				</div>
				 
			</div>';

            echo '<div class="row"><div class="col-xs-12 col-sm-6 col-md-6"><div class="form-group">';

            echo "<input name='location' class='form-control input-lg' type='text' value='$thisbusiness[location] '>";
            echo '</div></div>';
            echo '<div class="col-xs-12 col-sm-6 col-md-6"><div class="form-group">';
            echo "<input name='fax' class='form-control input-lg' type='text' value='$thisbusiness[fax]'>";
            echo '</div></div></div>';
            echo '<div class="row"><div class="col-xs-12 col-sm-6 col-md-6"><div class="form-group">';
            echo "<input name='email' class='form-control input-lg' type='text' value='$thisbusiness[email]'>";

            echo '</div></div>';
            echo '<div class="col-xs-12 col-sm-6 col-md-6"><div class="form-group">';

            echo "<input name='website_url' class='form-control input-lg' type='text' value='$thisbusiness[website_url]'>";
            echo ' </div></div></div>';
            echo "<input name='business_id' type='hidden' value='$thisbusiness[business_id]'>";
            echo '<div class="row"><div class="col-xs-12 col-sm-6 col-md-6"><div class="form-group">';
           

            echo '</div></div>';
            echo '<div align=center><div class="form-group">';


            echo ' </div></div></div>';
            
            
            
            echo " <div align=center><a href=" . base_url() . "social/index/$thisbusiness[business_id]><button type='button' class='btn btn-info'>Social Media</button></a> </div>";


            //echo "Created by : " . $thisbusiness['member_name'] . " " . $thisbusiness['member_surname'] . "<br/><br/>";
            //echo "Business Link (share with the public) " . base_url() . "index.php/login/shop_handle/$thisbusiness[business_id]<br/><br/>";
            // echo "Business Package :  $thisbusiness[package_name] (R$thisbusiness[package_monthly_fee] P/M)    <a href=" . base_url() . "index.php/trading/business_edit_form/$thisbusiness[business_id]/package_id><i class='glyphicon glyphicon-edit'></a><br/><br/>";
            // echo "Payment History: <a href=" . base_url() . "index.php/payment/loggedin/reserved/$thisbusiness[business_id]>View</a><br/><br/>";
            //  echo "<a href=" . base_url() . "/index.php/trading/verify_remove_business/$thisbusiness[business_id]><i class='glyphicon glyphicon-remove'></i></a>";

            echo '<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				 
			</div>';

            echo "</form>";
        } else {
            ?>
            <div class="container">
                <div class="row">

                    <form role="form" action=<?php echo base_url("t/send_contact_message"); ?> method="post" >

                        <input type="hidden" class="form-control" name="business_id" value="<?php echo $thisbusiness['business_id']; ?>" >

                        <div class="col-lg-6">
                            <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Required Field</strong></div>
                            <div class="form-group">
                                <label for="InputName">Your Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputEmail">Your Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputMessage">Message</label>
                                <div class="input-group"
                                     >
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                            </div>
                            <div class="form-group">
                                <label for="InputReal">What is <?php
                                    $num1 = rand(1, 10);
                                    $num2 = rand(1, 10);

                                    echo $num1 . " + " . $num2;

                                    $sum = $num1 + $num2;
                                    echo '<input type="hidden" class="form-control" name="InputSum" value="' . $sum . '">';
                                    ?> (Simple Spam Checker)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="InputReal" id="InputReal" required>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                            </div>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                        </div>
                    </form>
                    <hr class="featurette-divider hidden-lg">
                    <div class="col-lg-5 col-md-push-0">
                        <address>
                            <h3><?php echo $thisbusiness['business_name']; ?></h3>

                            Location: <?php echo $thisbusiness['location']; ?><br>
                            Phone: <?php echo $thisbusiness['contact_no']; ?><br>
                            Fax: <?php echo $thisbusiness['fax']; ?><br>
                            Email: <?php echo $thisbusiness['email']; ?><br>
                            Url: <?php echo $thisbusiness['website_url']; ?>


                            <?php
                            if ($company_social_media_links) {
                                foreach ($company_social_media_links as $s) {
                                    echo "<br><a href=" . $s['social_media_links_link'] . ">" . $s['social_media_name'] . "</a>";
                                }
                            }
                            ?>
                     
                        </address>
                    </div>
                </div>
            </div>       

            <?php
        }
    }
    ?>
</div></div>

 
 