<section class="userregitrationinform">
        <div class="row">
            <div class="col-sm-4 offset-4">
                <div class="accountcreation-alert">
                    <div class="alert alert-success" id="successful">
                        <strong>Success</strong> Blog post added
                    </div>
                    <div class="alert alert-danger" id="unsuccessful">
                        <strong>Danger</strong> Please check the log files
                    </div>
                </div>
                <div class="reg_form">

                </div>
                <form action="<?php echo base_url("index.php/registration/submit");?>" method="post" methclass="form mr-5 mt-5 mb-5 align-center">
                    <h4><strong>CEATE AN ACCOUNT</strong></h4>
                    <hr>
                    <div class="form-group">
                        <label for="name">Email address</label>
                        <input class="form-control form-control-md" type="email" id="businessemail" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input class="form-control form-control-md" type="password" id="password1" placeholder="Create password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm password">Confirm passsword</label>
                        <input class="form-control form-control-md" type="password" id="password2" placeholder="Confirm password">
                    </div>
                  
                    <input class="btn btn-info btn-block" type="submit" value="Create
                        Account" />
                </form>
            </div>
        </div>
    </section>