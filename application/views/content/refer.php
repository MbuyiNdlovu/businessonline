<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="row">
        <br/>

        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Invite others to this platform:</h3>
            </div>

        </div>

        <form class="form-horizontal" method="POST" role="form" action="<?php echo base_url("content/send_refer"); ?>">

          
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" id="email" placeholder="Email" class="form-control">
                </div>
            </div>

             
   
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>
</div>