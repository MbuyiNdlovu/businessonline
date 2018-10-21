<br/>
<div class="container" >
    <div class="row" >
        <div class="panel panel-default" align="center">
            <div class="panel-heading"> 
             
                <?php
                echo businessnav($thisbusiness[business_id]);
                ?>
            </div>
        </div>
        <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        echo form_open(base_url() . "social/add_social_media");

        echo form_input(array("name" => "business_id", "type" => "hidden", "value" => $business_id));

        echo "Select social platform : <br/><br/>";

        $all_social_media = get_all_social_media();

        echo '<div class="form-group input-group"> ';

        echo "<select name='social_media_id' class='form-control'>";
        foreach ($all_social_media as $s) {
            echo "<option value=$s[social_media_id]>";
            echo $s['social_media_name'];
            echo "</option>";
        }
        echo "</select> <br/><br/>";


        echo '</div>';

        echo 'URL<br/> <br/><div class="form-group input-group"> <span class="input-group-addon">https://</span> <input type="text" class="form-control" name="social_media_links_link"></div>';


        echo '<div align="center"><button type="submit" class="btn btn-primary">Submit</button></div>';
        echo form_close();
        ?>

        <hr/>

        <?php
        echo '<div align="center">';

        echo '<p><b>Social Links</b></p>';
        if ($company_social_media_links) {
            foreach ($company_social_media_links as $s) {
                 echo "<a href=" . $s['social_media_links_link'] . ">" . $s['social_media_name'] . "</a> | ";
                echo "<a href=" . base_url("social/remove_social_media_link/$business_id/$s[social_media_links_id]") . ">Remove</a>";
                echo "<br/><br/>";
            }
        }

        echo '</div>';
        ?>
    </div></div>