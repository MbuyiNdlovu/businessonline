<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<br/><br/>
<div class="container">
    <div class="row">



        <?php
        echo businessnav($business_id, $logo_url);
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <?php
                if ($own_business) {


                    echo '<br/><div class="panel panel-default" align="center"><div class="panel-body"><h3></h3></div></div>';

                    echo '<hr class="colorgraph">
                    <div class="row">';

                    echo '<div class="form-group">';

                    echo "<a href=" . base_url() . "t/product_service_edit_form/$product_service[business_id]/$product_service[productservice_id]/url><img src=$product_service[url] width='100%'></a>";
                    echo '</div>';
                    echo '<hr class="colorgraph">';

                    if ($product_service) {
                        echo '<form method="post" action=' . base_url() . 't/update_product_service>';





                        echo "<input name='business_id' type='hidden' value=$business_id>";
                        echo "<input name='productservice_id' type='hidden' value=$productservice_id>";

                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">On promotion?</label><br/>';
                        $a_promotion = array(0 => "No", 1 => "Yes");
                        echo form_dropdown("on_promotion", $a_promotion, $product_service['on_promotion'], 'class="form-control"');
                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Name:</label><br/>';
                        echo "<input name='productservice_name' type='text' class='form-control input-lg' value='$product_service[productservice_name]'>";
                        echo '</div>';
                        echo '<hr class="colorgraph">';

                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Description:</label><br/>';
                        echo "<input name='productservice_description'  type='text' class='form-control input-lg' value='$product_service[productservice_description]'>";
                        echo '</div>';

                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Code:</label><br/>';
                        echo " <input name='productservice_code' type='text' class='form-control input-lg' value='$product_service[productservice_code]'>";

                        echo '   </div>';
                        echo '<hr class="colorgraph">';
                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Category:</label>';
                        $each_subcat = get_subcategory_by_id((isset($product_service['businesscategorylist_includes_id']) ? $product_service['businesscategorylist_includes_id'] : 1));


                        if ($each_subcat) {
                            echo $each_subcat['includes_item'] . " . <a href=" . base_url() . "t/on_edit_categorylist/$product_service[business_id]/$product_service[productservice_id]/><i class='glyphicon glyphicon-edit'></i></a>";
                        } else {
                            
                        }

                        echo '</div>';

                        echo '<hr class="colorgraph">';

                        echo '<div class="form-group"><label for="on_promotion" class="col-sm-3 control-label">Price:</label>';

                        echo "<p><input name='price' type='text' class='form-control input-lg' value='$product_service[price]'></p>";

                        echo '</div>';
                        echo '<hr class="colorgraph">';
                        /* echo '<tr>';
                          echo "<td>Store details : </td><td>" . $product_service['business_name'] . "/" . $product_service['location'] . "/" . $product_service['contact_no'] . "/" . $product_service['email']."</td>";
                          echo '</tr>'; */


                        echo '<hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-12"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    </div>';

                        echo '</form></div>';
                    }
                } else {
                    if ($product_service) {
                        ?>
                        <div class="row">

                            <div class="col-md-3">
                                <p class="lead"><?php echo $product_service['business_name']; ?></p>

                            </div>

                            <div class="col-md-9">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="<?php echo $product_service['url']; ?>" alt="">
                                    <div class="caption-full">
                                        <h4 class="pull-right"><?php echo "R$product_service[price]"; ?></h4>
                                        <h4><a href="#"><?php echo "$product_service[productservice_name]"; ?></a>
                                        </h4>
                                        <p><?php echo "$product_service[productservice_description]"; ?></p>
                                    </div>
                                    <div class="ratings">
                                        <p>
                                            <b>   
                                                <?php
                                                echo $product_service['productservice_code'];
                                                ?>
                                            </b>
                                        </p>
                                    </div>
                                    <p><?php echo "<a href=" . base_url("contactform/index/$product_service[business_id]/$product_service[productservice_id]") . "><i class='fa fa-envelope-o' ></i></a>" ?></p>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                }
                ?>

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