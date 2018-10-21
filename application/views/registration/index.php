 
    <div class="panel panel-login">
    <form role="form" method="post" action="<?php echo base_url("registration/submit"); ?>">
        <h2>Sign Up <small></small></h2>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="firstname" id="first_name" class="form-control input-lg" placeholder="Name" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="lastname" id="last_name" class="form-control input-lg" placeholder="Surname" tabindex="2">
                </div>
            </div>
        </div>



        
        
        
           <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="password" name="password" id="last_name" class="form-control input-lg" placeholder="Password" tabindex="2">
                </div>
            </div>
        </div>

        <hr class="colorgraph">
        <div class="row">
            <div align="center"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
           
        </div>
    </form>
        <br/><br/><br/>
</div> 


