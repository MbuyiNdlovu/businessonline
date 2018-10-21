<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<br/><br/>
<div class="container">

    <div class="row" align="center">
 
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <b>Update your profile</b>


            </div>
        </div>

        <?php
//variables
        $table_field = array('name' => 'field', 'type' => 'hidden', 'value' => $field);

        //$attributes = array('class' => 'navbar-form navbar-left', 'role' => 'search');

        echo form_open_multipart('profile/update_profile', 'role="form"');

        switch ($field) {
            case "profile_pic_url":
                echo '  <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="userfile" id="imgInp">
                </span>
            </span>
            <input type="text" name="newtext" value="...." class="form-control" readonly>
        </div>
        <img id="img-upload"/>
    </div>
';
                break;


            case "country_id":
                echo '<div class="form-group">';

                echo "Please select your country:";
                $countries = getAllCountries();

                $a_countries = array();

                foreach ($countries as $country) {
                    $a_countries[$country['country_id']] = $country['country_name'];
                }
                echo form_dropdown("newtext", $a_countries, 101, 'class="form-control"');


                echo "</div>";
                break;

            case "province_id":

                echo '<div class="form-group">';

                echo "Please enter your province:";
                $provinces = getProvincesByCountryID(101);
                $a_provinces = array();

                foreach ($provinces as $province) {
                    $a_provinces[$province['province_id']] = $province['province_name'];
                }

                echo form_dropdown("newtext", $a_provinces, 1, 'class="form-control"');
                echo "</div>";
                break;
            case "gender":
                echo '<div class="form-group">';


                $a_gender = getGender();
                echo form_dropdown("newtext", $a_gender, 1, 'class="form-control"');
                echo "</div>";

                break;

            case "dob":

                echo '<div class="form-group">';
                echo form_dropdown("newtext_year", yearRange(1970, 2000), 1970, 'class="form-control"');
                echo form_dropdown("newtext_month", getMonths(), 1, 'class="form-control"');
                echo form_dropdown("newtext_day", getDays(), 1, 'class="form-control"');
                echo "</div>";
                break;


            case "password":
                echo '<div class="form-group">';
                $new_text = array('name' => 'newtext', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter...');
                echo form_input($new_text);
                echo '</div>';

                break;


            default:

                echo '<div class="form-group">';
                $new_text = array('name' => 'newtext', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter...');
                echo form_input($new_text);
                echo '</div>';
                break;
        }

        echo form_input($table_field);
        echo form_submit("submit", "send", 'class="btn btn-default"');

        echo '<nav>
  <ul class="pager">
    <li><a href="' . $back . '">Back</a></li>
  </ul>
</nav>';

        echo form_close();
        ?>

 
    </div>

</div>



<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
    }
</style>

<script>$(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                    log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log)
                    alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });</script>