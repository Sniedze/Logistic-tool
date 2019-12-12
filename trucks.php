
<?php

$sPageTitle = 'Trucks';
$sClassActive = 'trucks';
require_once(__DIR__.'/includes/top.php');

/* New object of Customers() */
require_once(__DIR__.'/includes/Trucks_class.php');
$trucks = new Trucks();
/* Get a list of all customers in DB */
$result = $trucks->list();
?>

   <div class="container">
        <div class="row top-buffer">
            <a href="add_truck.php" class="btn-primary btn">New Truck</a>
            <h3>Trucks</h3>
            <table class=" table table-striped">
                <tr>                     
                    <th>Registration number</th>
                    <th>Capacity</th>
                    <th>Registration Date</th>
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr>";
                    for($i=0; $i < count($val); $i++){
                        echo "<td>" . $val[$i] . "</td>";
                    }  
                    
                    
                    
                    echo "<td style='text-align: right'> <a class='btn btn-primary' href='view_student.php?id=" . $val[0] . "'>View</a> 
                    <a class='btn btn-danger' href='delete_student.php?id=" . $val[0] . "'>Delete</a> 
                    <a class='btn btn-primary' href='edit_student.php?id=" . $val[0] . "'>Edit</a> </td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>