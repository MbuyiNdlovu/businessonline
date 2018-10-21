<br/>
<div class="container">
    <div class="row">
        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
            <ul class="list-group">
                <li class="list-group-item active">Please select the category</li>
<?php
foreach ($categories as $c){
 
    
  echo "<li class='list-group-item'><a href=".  base_url()."search/subcategorylist/$c[id]>".$c['main_category']."</a></li>";
    
}
?>
            </ul>
        </div>  
    </div>  
</div>
