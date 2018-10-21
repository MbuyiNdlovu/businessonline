<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<div class="container">
    <div class="row">
        <br/>

        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Invest in our business</h3>
            </div>

        </div>

        <form class="form-horizontal" method="POST" role="form" action="<?php echo base_url("content/send_investor_request"); ?>">

            <div class="form-group">
                <label for="fullname" class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-9">
                    <input name="fullname" type="text" id="fullname" placeholder="Full Name" class="form-control" autofocus>
                    <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" id="email" placeholder="Email" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                <div class="col-sm-9">
                    <input name="birthdate" type="date" id="birthDate" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="country" class="col-sm-3 control-label">Country</label>
                <div class="col-sm-9">
                    <?php
                    $countries = allcountries();
                    $a_countries = array();
                    foreach ($countries as $country) {
                        $a_countries[$country['country_id']] = $country['country_name'];
                    }
                    echo form_dropdown("country_id", $a_countries, 101, 'class="form-control"');
                    ?>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9">
                    <?php
                    $gender = getGender();
                    echo form_dropdown("gender", $gender, 0, 'class="form-control"');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">
                    <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
                </div></div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>
</div>