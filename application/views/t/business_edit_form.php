<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<br/><br/>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
 


<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if ($business_id && $fieldname) {
    
    $attributes = array('class' => 'class="form-control"', 'role' => 'search');
    
    echo form_open_multipart("/t/update_business",$attributes);
    
    switch ($fieldname) {
    case 'logo_url':
    
echo "<br/>";

echo '  <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="userfile" id="imgInp">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id="img-upload"/>
    </div>
';

            
            break;
        
       
        
            
            
        case "package_id":
            $packages = all_packages();
            
            
               $a_packages = array();

            foreach ($packages as $package) {
                $a_packages[$package['package_id']] = $package['package_name']."(R".$package['package_monthly_fee']." P/M)";
            }

            echo form_dropdown("new_input", $a_packages,1,'class="form-control"');
          break;

        default : 
            
            echo  '<div class="form-group">';
            
            echo form_label("Enter new text:<br/>");
            echo form_input(array("name" => "new_input", "type" => "text",'class'=>'form-control','placeholder'=>'Enter...'));
            echo '</div>';
            
    }
    echo form_input(array("name" => "business_id", "type" => "hidden", "value" => $business_id));
    echo form_input(array("name" => "fieldname", "type" => "hidden", "value" => $fieldname));   
 }
?>

        			<hr class="colorgraph">
			<div class="row">
				<div align="center"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				 
			</div>
		</form>
	</div>
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