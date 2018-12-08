 
<div class="container" >
    <div class="row" >
     
                 <div align="center"> 
        
</div>


        <div class="col-md-4 col-md-offset-4">
                <div class="panel-body">
                    <form role="form" method="POST" action="<?php echo base_url("login/check_credentials"); ?>">
                        
                          <h4 align="center">Business Online Log In<small></small></h4>
       
                        
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                        </fieldset>
                    </form>
                    <br/>
                    <div id="tabs" data-tabs="tabs">
                        <p class="text-center"><a href="<?php echo base_url("index.php/registration") ?>">Need an Account?</a></p>
                        <p class="text-center"><a href="<?php echo base_url("login/forgot") ?>">Forgot password?</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
 