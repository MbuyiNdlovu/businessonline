<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="row">
           <br/>
         <?php
                echo adminnav();
                ?>
      

        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Broadcast Form</h3>
            </div>

        </div>

        <form class="form-horizontal" method="POST" role="form" action="<?php echo base_url("admin/send_broadcast_message"); ?>">

            <div class="form-group">
                <label for="subject" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <input name="subject" type="text" id="fullname" placeholder="Phangisa Broadcast" class="form-control" autofocus>
                    
                </div>
            </div>
          
          
            <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">
                    <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
                </div></div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>
</div>