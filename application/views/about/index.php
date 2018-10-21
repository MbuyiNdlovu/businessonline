<br/>

<div class="container">
    <div class="row">
   
                <?php
                echo businessnav($business_id,$logo_url);
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">




                <?php
                /*
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */

                
                
                if ($business_about) {
                    if ($own_business) {
                        
                        
                        
                        
                        echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3>About ' . $business_name . '</h3></div></div>';
                        echo "<form method='post' action=" . base_url() . "about/update_about>";
                        echo "<div class='form-group'><textarea name='who_are_we'  rows='5' id='comment' class='form-control input-lg'> $business_about[who_are_we] </textarea> </div>";
                        echo "<div class='form-group'><textarea name='what_we_do'   rows='5' id='comment' class='form-control input-lg'>$business_about[what_we_do] </textarea></div>";
                        echo "<div class='form-group'><textarea name='our_mission'   rows='5' id='comment' class='form-control input-lg'>$business_about[our_mission] </textarea> </div>";
                        echo "<div class='form-group'><textarea name='we_love_our_clients' rows='5' id='comment' class='form-control input-lg'>$business_about[we_love_our_clients] </textarea></div>";
                        echo "<input name='business_id'   type='hidden' value=$business_id>";
                        echo '<hr class="colorgraph">
			<div class="row">
				<div   align="center"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				
			</div>';
                        echo "</form>";
                        ;
                    } else {
                        echo "<hr/><b>Who are  : </b><br/><br/>";
                        echo "<p> $business_about[who_are_we]</p><hr/>";

                        echo "<b>What we do : </b><br/><br/>";
                        echo "<p> $business_about[what_we_do]</p><hr/>";


                        echo "<b>Our mission : </b><br/><br/>";
                        echo "<p> $business_about[our_mission]</p><hr/>";


                        echo "<b>We love our clients : </b><br/><br/>";
                        echo "<p> $business_about[we_love_our_clients]</p><hr/>";
                    }
                } else {

                    if ($own_business) {

                        echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3>About ' . $business_name . '</h3></div></div>';

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
                        echo "</form>";
                    } else {
                        
                    }
                }
                ?>









            </div>




        </div>

    </div></div>

