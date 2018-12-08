
<hr/>
 
   <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
            
            
              <?php if ($visitor_email == get_default_username()  || strlen($visitor_email)==0)  
                            {?>  <div class="alert alert-danger">
  <strong>Want to advertise? Create  an <a href="<?php echo base_url() . 'registration' ?>"> account</a> with us.</strong> 
</div>
                            <?php   } ?>
            
            
          <small>Copyright © Ngonyama Link 2018 - <?php echo date("Y"); ?></small>
        </div>
      </div>
    </footer>
<br/><br/>
</div></div>

<!-- jQuery -->
    <script src="<?=base_url()?>sbadmin2/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>sbadmin2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>sbadmin2/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>sbadmin2/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>sbadmin2/vendor/morrisjs/morris.min.js"></script>
    <script src="<?=base_url()?>sbadmin2/data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>sbadmin2/dist/js/sb-admin-2.js"></script>
    
   
</body>
</html>