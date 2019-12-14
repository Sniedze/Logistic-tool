
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
            <a href="add_driver.php" class="action_link"><img src="images/create-button.png"> New Driver</a>
            <h2>Drivers</h2>
            <table class=" table table-striped">
                <tr class="attribute-row">
                    <th>Driver Id</th>
                    <th>First Name</th>                   
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>CPR</th>
                    <th>Salary DKK</th>
                    <th>Truck Assigned</th>
                    <th class="empty-cell"></th>
                    <th class="empty-cell"></th>
                    
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr>";
                    for($i=0; $i < count($val); $i++){
                        echo "<td>" . $val[$i] . "</td>";
                    }                   
                    
                    echo "<td class='open'> <a class='btn btn-primary' href='view_driver.php?id=$val[0]'><img src='images/open-blue.png'</a></td>
                    <td class='remove'><img src='images/delete-button.png'></td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>