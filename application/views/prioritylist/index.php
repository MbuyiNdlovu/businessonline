<br/>
<div class="container">
    <div class="row">
        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
            <ul class="list-group">
                <li class="list-group-item active">Service Providers</li>
                
                <br/>
                 <?php
	   $i = 0;
		foreach($businesses as $b){
		  $i++;
               //  echo ' <br/><a href="'.  base_url("login/shop_handle/$b[business_id]").'"><img src="'.$b['logo_url'].'" class="img-thumbnail" width="35%" height="35%" alt="Cinque Terre"></a>';
		 echo "<li class='list-group-item'><a href=".  base_url("login/shop_handle/$b[business_id]")."> ".$b['business_name']."</a> </li>";
                // echo "<p align='center'> ".facebook_like(base_url("index.php/login/shop_handle/$b[business_id]"))."</p>";
		 echo '<hr/>';
	 
		}
	?>
            </ul>
            
 
        </div>  
    </div>  
</div>



 
