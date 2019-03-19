<br/><br/><br/>
<div class="container">
    <div class="row">
        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">
            <ul class="list-group">
                <li class="list-group-item active">Please select the subcategory</li>
                    
                    <?php
foreach ($subcategories as $s) {
    echo "<li class='list-group-item'><a href=" . base_url() . "search/get_products_services_by_subcategory_id/$s[id]>" . $s['includes_item'] . "</a></li>";
}

?>

                     </ul>
        </div>  
    </div>  
</div>
