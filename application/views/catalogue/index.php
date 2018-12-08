<br/>
<div class="container">
    <div class="row">


        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Business Online Catalogue</h3>
            </div>

        </div>
        <br/>


        <!-- Container (Services Section) -->
        <div class="container-fluid text-center">

            <ul class="list-group">
                <li class="list-group-item active"><h4>Service Providers</h4></li>

                <br/>
                <?php
                $i = 0;
                foreach ($businesses as $b) {
                    $i++;

                    $id = $b['business_id']; // urlencode( base64_encode( ) );
                    //  echo ' <br/><a href="'.  base_url("login/shop_handle/$b[business_id]").'"><img src="'.$b['logo_url'].'" class="img-thumbnail" width="35%" height="35%" alt="Cinque Terre"></a>';
                    echo "<li class='list-group-item'><a href=" . base_url("login/shop_handle/$id") . "> " . $b['business_name'] . "</a> </li><br/>";
                    // echo "<p align='center'> ".facebook_like(base_url("index.php/login/shop_handle/$b[business_id]"))."</p>";
                }
                ?>

            </ul>
            <li class="list-group-item active"><h4>Service Rendered</h4></li><br/>
            <a href="<?= base_url('search/categorylist') ?>">Find more  <i class="fa fa-search-minus"></i></a><br/><br/>
            <br/>
<?php
if ($promotions) {

    $cnt = 0;
    $k = 0;
    $i = 0;
    foreach ($promotions as $p) {

        $cnt++;

        if ($i % 3 == 0) {
            echo '<div class="row">';
            echo '<div class="col-sm-4">';
            echo "<img src=$p[url] width='20%' height='20%'><i class='fa fa-tags'></i> ";
            echo "<h4><a href=" . base_url() . "t/view_product_service/$p[business_id]/$p[productservice_id]>";
            echo $p['productservice_name'] . '</a></h4>';
            echo ' <p>Price : ' . $p['price'] . '</p>';
            echo ' <p>' . $p['productservice_description'] . '</p>';

            echo "<p><a href=" . base_url("contactform/index/$p[business_id]/$p[productservice_id]") . "><i class='fa fa-envelope-o' ></i></a></p>";


            echo '</div> ';
        } else {

            echo '<div class="col-sm-4">';
            echo "<img src=$p[url] width='20%' height='20%'><i class='fa fa-tags'></i> ";
            echo "<h4><a href=" . base_url() . "t/view_product_service/$p[business_id]/$p[productservice_id]>";
            echo $p['productservice_name'] . '</a></h4>';
            echo ' <p>Price : ' . $p['price'] . '</p>';
            echo '  <p>' . $p['productservice_description'] . '</p>';
            echo "<p><a href=" . base_url("contactform/index/$p[business_id]/$p[productservice_id]") . "><i class='fa fa-envelope-o'></i></a></p>";

            echo '</div> ';


            if ($cnt % 3 == 0) {
                echo "</div><br/><br/>";
            }
        }

        /*  echo '<div class="panel panel-default">
          <div class="panel-body">';
          echo "<img src=$bps[url] width='5%' height='5%'>" . $bps['productservice_name'] . " . <a href=" . base_url() . "index.php/t/view_product_service/$business_id/$bps[productservice_id]>view</a> | <a href=" . base_url() . "index.php/trading/verify_remove_product_service/$business_id/$bps[productservice_id]><i class='glyphicon glyphicon-remove'></i></a>";
          echo ' </div>
          </div>'; */

        $i++;
    }
}
?>



        </div>  






    </div>  
</div>




