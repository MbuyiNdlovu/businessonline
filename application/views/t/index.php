<br/>
<div class="container">
    <div class="row">

        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Select your business</h3>
            </div>

        </div>


        <?php
        if ($mybusinesses) {


            echo ' <div class="table-responsive"> <table class="table table-bordered">
    <thead>
      <tr>
 
        <th>Business</th>
            <th>Contact Person</th>
         <th>Email</th>
      
          <th>Country</th>
            <th>Province</th>
        <th></th>   <th></th>
      </tr>  </thead> <tbody>';
         
            $i = 0;
            foreach ($mybusinesses as $mybusiness) {
                $i++;





                echo " <tr>
      
        <td><a href=" . base_url() . "t/get_business/$mybusiness[business_id]>" . $mybusiness['business_name'] . "</a></td>
         
                   <td> " . $mybusiness['member_name'] . " </td>
                            <td> " . $mybusiness['email'] . " </td>
            <td> " . $mybusiness['country_name'] . " </td>
                <td> " . $mybusiness['province_name'] . " </td>
                     <td><a href=" . base_url() . "t/get_business/$mybusiness[business_id]>View</a></td>
        <td><a href=" . base_url() . "t/verify_remove_business/$mybusiness[business_id]>Delete</a></td>
      </tr>";
            }


            echo '   </tbody>
  </table></div>';
        }
        ?>



        <!-- /.col-lg-4 -->
    </div>

</div>



<?php
if ($onlineuser_data['email'] == get_default_username()) {

    echo '<nav>
  <ul class="pager">';

    echo "Current user account is not authorised to create businesses.";
    echo '</ul>
  </nav>';
} else {

    echo '<nav>
  <ul class="pager">';

    echo "<li><a href=" . base_url() . "t/business_create_form>New Business</a></li>";

    echo '</ul>
  </nav>';
}
?>

</div>
