
<?php

$sPageTitle = 'Customers';
$sClassActive = 'customers';
require_once(__DIR__.'/includes/top.php');

/* New object of Customers() */
require_once(__DIR__.'/includes/Customers_class.php');
$customers = new Customers();
/* Get a list of all customers in DB */
$result = $customers->list();

?>

   <div class="container">
        <div class="row top-buffer">
            <a href="add_customer.php" class="action_link"><img src="images/create-button.png"> New Customer</a>
            <h2>Customers</h2>
            <table class="table">
                <tr class="attribute-row">
                    <th>Id</th>                   
                    <th>Name</th>
                    <th>Registration number</th>
                    <th>Email</th>
                    <th class="empty-cell"></th>
                    <th class="empty-cell"></th>
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr id='$val[0]'>";
                    for($i=0; $i < count($val); $i++){
                        echo "<td>$val[$i]</td>";
                    }                   
                    
                    echo "<td class='open'> <a class='btn btn-primary' href='customer.php?id=$val[0]'><img src='images/open-blue.png'</a></td>
                    <td class='remove'><img src='images/delete-button.png'></td>
                     </tr>";
                }

                ?>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/delete_alert.js"></script>
</body>

</html>