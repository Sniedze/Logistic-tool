
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
            <a href="add_truck.php" class="action_link"><img src="images/create-button.png"> New Truck</a>
            <h2>Trucks</h2>
            <table class=" table table-striped">
                <tr class="attribute-row">                     
                    <th>Registration number</th>
                    <th>Capacity</th>
                    <th>Registration Date</th>
                    <th class="empty-cell"></th>
                    <th class="empty-cell"></th>
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr>";
                    
                    for($i=0; $i < count($val); $i++){
                        echo "<td>" . $val[$i] . "</td>";
                    }  
                    
                    
                    
                    echo "<td class='open'> <a  href='view_truck.php?id=$val[0]'><img src='images/open-blue.png'></a></td>
                           <td class='remove'><img src='images/delete-button.png'></td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>