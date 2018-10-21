<div class="container">
    <div class="row" align="center">
        <br/>
              <div class="panel panel-default" align="center">
<div class="panel-body"> 
    <h3>About Us</h3>
         </div>
     
</div>
     
<p>Phangisa was designed to help individuals <u>exhibit their businesses to tons of end users</u> remotely.</p>
 
<p>We currently have <b><?php echo $cnt_registrations; ?></b> people using this platform.</p>


<?php
                            if ($visitor_email == get_default_username()) {
                                
                                echo "<p><a href=". base_url("registration").">Register Now</a></p>";
                            }else
                            {
                                 echo "<p><b>We thank you for being part of us.</b></p>";
                                
                                
                            }
                                
                            ?>
<div align="center"> 
        <img src="<?php echo base_url("images/img.gif"); ?>" class="img-rounded" alt="Cinque Terre" width="50%" height="20%"><br/><br/>
</div>

<p>Service providers and end users can be anywhere in South Africa.</p>

      </div>
</div>