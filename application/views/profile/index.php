<br/><br/>
<div class="container">

    <div class="row">
        <?php
        if ($email == get_default_username()) {

            echo '<nav>
  <ul class="pager">';
            echo "Current user account is not authorised to update a profile.";
            echo '</ul>
</nav>';
        } else {
            echo '<div class="panel panel-default" align=center>';
            echo"<h3>" . $name . " " . $surname . "</h3>";
            echo '</div>';

            echo '<div class="panel panel-default">
             <div class="panel-heading"  align="center"><a href=' . base_url() . 'profile/edit_profile/profile_pic_url><img src=' . $profile_pic_url . ' class="img-rounded" alt="Phangisa"  width="20%"></a></div>
              </div>';
            echo '<div class="table-responsive"> <table class="table table-bordered">
            <tbody>';

            $a_gender = getGender();

            if ($num == 1) {
                echo '<tr>';
                echo "<td>Name</td> <td>" . $name . "</td> <td><a href=" . base_url() . "profile/edit_profile/name><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';

                echo '<tr>';
                echo "<td>Surname </td><td> " . $surname . "</td> <td> <a href=" . base_url() . "profile/edit_profile/surname><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';

                echo '<tr>';
                echo "<td>Gender </td><td> " . $a_gender[$gender] . "</td> <td> <a href=" . base_url() . "profile/edit_profile/gender><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';
            } else if ($num == 2) {


                echo '<tr>';
                echo "<td>Country </td><td> " . $country_name . "</td> <td> <a href=" . base_url() . "profile/edit_profile/country_id><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';


                echo '<tr>';
                echo "<td>Province </td><td> " . $province_name . "</td> <td> <a href=" . base_url() . "profile/edit_profile/province_id><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';

                echo '<tr>';
                echo "<td>Location </td><td> " . $location . "</td> <td> <a href=" . base_url() . "profile/edit_profile/location><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';


                echo '<tr>';
                echo "<td>Contact Number </td><td> " . $contact_no . "</td> <td> <a href=" . base_url() . "profile/edit_profile/member_contact_no><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';
            } else if ($num == 3) {

                echo '<tr>';
                echo "<td>Date Of Birth</td><td> " . $dob . "</td> <td> <a href=" . base_url() . "profile/edit_profile/dob><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';

                echo '<tr>';
                echo "<td>Email</td><td> " . $email . "</td> <td> <a href=" . base_url() . "profile/edit_profile/email><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';

                echo '<tr>';
                echo "<td>Password</td><td> ***** </td> <td> <a href=" . base_url() . "profile/edit_profile/password><i class='glyphicon glyphicon-edit'></i></a></td>";
                echo '</tr>';
            }


            $prev = $num - 1;
            echo '<tr><td colspan=3 align=center>';
            if ($num > 1) {
                echo "";
                echo "<a class='previous' href=" . base_url() . "profile/index/$prev>&laquo; Previous</a>";
            }

            $next = $num + 1;

            if ($num < 3) {
                echo "<a class='next' href=" . base_url() . "profile/index/$next>Next &raquo;</a>";
            }
            echo '</td></tr>';
            echo ' </tbody>
</table></div>';
        }
        ?>

    </div>
</div>


<style>a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }

    a:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        background-color: #f1f1f1;
        color: black;
    }

    .next {
        background-color: #4CAF50;
        color: white;
    }

    .round {
        border-radius: 50%;
    }</style>