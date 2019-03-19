  <section class="userregitrationinform">
        <div class="row">
            <div class="col-sm-4 offset-4">
                <form action="<?php echo base_url("login/check_credentials"); ?>" class="form mr-5 mt-5 mb-5 align-center" method="post">
                    
                    
                    <h4><strong>Login</strong></h4>
                    <hr>
                    <div class="form-group">
                        <label for="name">Email address</label>
                        <input name="email" class="form-control form-control-md" type="email" id="name" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input name="password" class="form-control form-control-md" type="password" id="email" placeholder="Create password">
                    </div>
                     <a href="passwordreset.html">Forgot password</a> |
                    <a href="registration.html">Register</a>
                    
                    <input class="form-control form-control-md" type="submit"/>

                </form>
            </div>
        </div>
    </section>