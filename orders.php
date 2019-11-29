
<?php

$sPageTitle = 'Orders';
$sClassActive = 'orders';
require_once(__DIR__.'/includes/top.php');

/* New object of Orders() */
require_once(__DIR__.'/includes/Orders_class.php');
$orders = new Orders();
/* Get a list of all orders in DB */
$result = $orders->list();
?>

   <div class="container">
        <div class="row top-buffer">
            <a href="new_customer.php" class="btn-primary btn">New Order</a>
            <h3>Orders</h3>
            <table class=" table table-striped">
                <tr>
                    <th>Order ID</th>                   
                    <th>Pickup Date</th>
                    <th>Customer Name</th>
                    <th>Goods</th>
                    <th>Size</th>
                    <th>Delivery Date</th>
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