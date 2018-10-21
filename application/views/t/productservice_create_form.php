<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<div class="container">
    <div class="row">
        <?php
        echo form_open_multipart(base_url("t/submit_create_productservice"), "role='form'");
        ?>
        <h2>Create Product/Service<small></small></h2>
        <hr class="colorgraph">
        
        <div class="form-group">
            <label for="on_promotion" class="col-sm-3 control-label">Is this item on promotion?</label><br/>
            <?php
            $a_promotion = array(0=>"No",1=>"Yes");
            echo form_dropdown("on_promotion", $a_promotion, 0, 'class="form-control"');
            ?>
        </div>
        
        
        <div class="form-group">
            <?php
            $a_subcategories = array();

            foreach ($subcategories as $subcategory) {
                $a_subcategories[$subcategory['id']] = $subcategory['includes_item'];
            }
            echo form_dropdown("businesscategorylist_includes_id", $a_subcategories, 1, 'class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_input(array("name" => "productsevicename", "type" => "text", 'class' => 'form-control', 'placeholder' => 'Product/Service Name...'));
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_input(array("name" => "productsevicedescription", "type" => "text", 'class' => 'form-control', 'placeholder' => 'Description'));
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_input(array("name" => "productsevicecode", "type" => "text", 'class' => 'form-control', 'placeholder' => 'Code'));
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">

                    <?php
                    echo form_input(array("name" => "business_id", "type" => "hidden", "value" => $business_id, 'class' => 'form-control', 'placeholder' => 'Enter...'));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?php
     
            
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

            ?>
        </div>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-md-12"><input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        </div>
        </form>
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