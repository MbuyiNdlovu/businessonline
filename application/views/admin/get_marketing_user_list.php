<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="row">
           <br/>
              <?php
                echo adminnav();
                ?>
     

        <div class="panel panel-default" align="center">
            <div class="panel-body"> 
                <h3>Marketing List</h3>
            </div>

        </div>
        
        
        
        <?php
//displaying the records of attribute person

if (isset($all_members) && sizeof($all_members) > 0) {
    echo "<table class='table' width=100%> ";
    echo "<tr> <th>Firstname</th><th>Surname</th><th>Username</th></tr>";
    foreach ($all_members as $am) {
        echo "<tr>";
        echo "<td>" . $am['name'] . "</td>";
        echo "<td>" . $am['surname'] . "</td>";
        echo "<td>" . $am['username'] . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p align=center>No records yet</a>";
}

 
?>

         
    </div>
</div>