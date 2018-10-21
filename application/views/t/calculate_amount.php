<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">


            <?php
            echo form_open(base_url() . "trading/calculate_amount");
            echo form_input(array("name" => "business_id", "type" => "hidden", "value" => $business_id));
            echo '<div align="center"><h3>Number of days:</h3></div>';
            echo '<br/>';
            echo ' <div class="form-group input-group"> <span class="input-group-addon">+</span> <input type="text" class="form-control" name="days" placeholder="0" value="' . $days . '"></div>';
            if (isset($calculated_amount)) {
                echo "<div align='center'>[ Over <b>$days day(s)</b>, you will be charged <b>R$calculated_amount ]</b><br/><br/>";
                echo "<a href=" . base_url() . "trading/calculate_amount>Recalculate</a><br/><br/>";
                echo "<a href=" . base_url() . "trading/accept_quotation/$business_id/$days>Accept quote</a> - email will be sent to us.</div>";
            } else {
                echo '<div align="center" class="well"><button type="submit" class="btn btn-primary">Submit</button></div>';
            }
            echo form_close();
            ?>

        </div>
    </div>
</div>