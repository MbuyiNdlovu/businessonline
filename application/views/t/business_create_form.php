<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<div class="container">
    <div class="row">

        <?php
        echo form_open_multipart(base_url("t/submit_create_business", 'role="form"'));
        ?>


        <h2 align="center">Capture Your Business Details <small></small></h2>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="business_name" id="business_name" class="form-control input-lg" placeholder="Business" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="contact_no" id="contact_no" class="form-control input-lg" placeholder="Contact Number" tabindex="2">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">

                    <?php
                    $countries = getAllCountries();

                    $a_countries = array();

                    foreach ($countries as $country) {
                        $a_countries[$country['country_id']] = $country['country_name'];
                    }
                    echo form_dropdown("country_id", $a_countries, 101, 'class="form-control"');
                    ?>

                </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <?php
                    $provinces = getProvincesByCountryID(101);

                    $a_provinces = array();

                    foreach ($provinces as $province) {
                        $a_provinces[$province['province_id']] = $province['province_name'];
                    }



                    echo form_dropdown("province_id", $a_provinces, 1, 'class="form-control"');
                    ?>
                </div>
            </div>

        </div>






        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="fax" id="fax" class="form-control input-lg" placeholder="Fax" tabindex="2">
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="website_url" name="website_url" id="fax" class="form-control input-lg" placeholder="Website Url" tabindex="2">
                </div>
            </div>
        </div>




 

        
        
        <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="userfile" id="imgInp">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload'/>
    </div>


        <hr class="colorgraph">
        <div class="row">
            <div align="center"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>

        </div>
        </form>

    </div></div>

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
    
    <script>$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
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

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});</script>