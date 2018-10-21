<br/><br/>
<div class="container">
    <div class="row">

        
        <div align="right">
        <?php
 
    echo "<img src=$product_service[url] width=30%>";
    
        ?>
        </div>
         
        
<?php
echo '<form name="contactform" method="post" action="' . base_url() . 'contactform/send_mail_out">';
?>
       
<table width="100%">

    <?php
       $product_service_link = base_url() . "trading/view_other_product_service/$product_service[business_id]/$product_service[productservice_id]";    
    
    echo "<input  type='hidden' name='emailto' value=" . $product_service['email'] . ">";
    
    echo '<input  type=hidden name=product_service_link value=' . $product_service_link . '>';
    ?>
        <div class="form-group">

    <tr>

        <td valign="top">

            <label for="subject">Subject *</label>

        </td>

        <td valign="top">

            <?php
            $subject = $product_service['productservice_name'] . ":" . $product_service['productservice_code'];
            echo '<input class="form-control" type=text name=subject value=' . $subject . '>';
            ?>

        </td>

    </tr>
    
        </div>
    
    
      <div class="form-group">
    <tr>

        <td valign="top">

            <label for="first_name">First Name *</label>

        </td>

        <td valign="top">

            <input class="form-control" type="text" name="first_name" maxlength="50" size="30">

        </td>

    </tr>
    
    </div>

    
    <div class="form-group">
    <tr>

        <td valign="top"">

            <label for="last_name">Last Name *</label>

        </td>

        <td valign="top">

            <input class="form-control" type="text" name="last_name" maxlength="50" size="30">

        </td>

    </tr>
 </div>
    
    
    <div class="form-group">
    <tr>

        <td valign="top">

            <label for="email">Email Address *</label>

        </td>

        <td valign="top">

            <input class="form-control"  type="text" name="email" maxlength="80" size="30">

        </td>

    </tr>
 </div>
    
    <div class="form-group">
    <tr>

        <td valign="top">

            <label for="telephone">Telephone Number</label>

        </td>

        <td valign="top">

            <input class="form-control"  type="text" name="telephone" maxlength="30" size="30">

        </td>

    </tr>
 </div>
    
    <div class="form-group">
    <tr>

        <td valign="top">

            <label for="comments">Comments *</label>

        </td>

        <td valign="top">

            <textarea class="form-control"  name="comments" maxlength="1000" cols="25" rows="6"></textarea>

        </td>

    </tr>
 </div>
    
    <div class="form-group">
    <tr>
        
         <td style="text-align:center">

           
        </td>


        <td style="text-align:center">

            <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit">

        </td>

    </tr>
    
     </div>

</table>

</form>

<?php

//echo "<p align=center><a href=" . $back . ">Back</a></p>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

   </div>   </div>