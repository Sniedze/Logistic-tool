
<?php

$sPageTitle = 'Drivers';
$sClassActive = 'drivers';
require_once(__DIR__.'/includes/top.php');

/* New object of Drivers() */
require_once(__DIR__.'/includes/Drivers_class.php');
$drivers = new Drivers();
/* Get a list of all drivers in DB */
$result = $drivers->list();
?>

   <div class="container">
        <div class="row top-buffer">
            <a href="new_customer.php" class="btn-primary btn">New Driver</a>
            <h3>Drivers</h3>
            <table class=" table table-striped">
                <tr>
                    <th>Driver Id</th>
                    <th>First Name</th>                   
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Truck Assigned</th>
                    
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