<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<br/><br/>
<div class="container">

<div class="row" align="center">
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<div class="panel panel-default">
<div class="panel-body">';


switch ($fieldname) {

    case 'productservice_name':
        echo "Enter new name below";
        break;
    case 'productservice_description':
        echo "Enter new description below";
        break;

    case 'productservice_code':

        echo "Enter new code below";
        break;

    case 'price':

        echo "Enter new price below";
        break;
    
    
    case 'url':
         echo "Please upload a file";
        break;

    default :

        echo die("Opps. Something went wrong.");
}


echo ' </div>
</div>';

//$attributes = array('class' => 'navbar-form navbar-left', 'role' => 'search');

echo form_open_multipart("/t/update_product_service", 'role="form"');

echo form_input(array("name" => "business_id", "type" => "hidden", "value" => $business_id));

echo form_input(array("name" => "productservice_id", "type" => "hidden", "value" => $productservice_id));

echo form_input(array("name" => "fieldname", "type" => "hidden", "value" => $fieldname));

if ($fieldname == 'url') {
     echo '<div class="form-group">
 
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
echo form_input(array("name" => "vtfileupload", "type" => "hidden", 'class' => 'form-control', 'value' => 1));

} else {
    echo '<div class="form-group">';
    echo form_input(array("name" => "new_input", "type" => "text", 'class' => 'form-control', 'placeholder' => 'Enter...'));
    echo '</div>';
}

echo '';

echo '<div align="center"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>';

echo form_close();



echo '<nav>
  <ul class="pager">';
echo "<li><a href=$back>Back</a></li>";

echo '</ul>
</nav>';
?>

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