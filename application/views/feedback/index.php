
<div class="container">
    <div class="row">
 <br/>
             <div class="panel panel-default" align="center">
<div class="panel-body"> 
    <h3>Please give us feedback / suggestion</h3>
         </div>

</div>    
      
           <?php
     echo  "<form action=". base_url()."feedback/send method='post'>";
          
?>
      
    <div class="form-group">
        <input name="page_url" type="hidden" value="<?php echo $previous_page; ?>"/>
      <textarea name="comments" class="form-control" rows="5" id="comment"></textarea>
      <br/>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Send</button>
    </div>
  </form>     </div>    </div>     