
<?php

$sPageTitle = 'Orders';
$sClassActive = 'orders';
require_once(__DIR__.'/includes/top.php');

/* New object of Orders() */
require_once(__DIR__.'/includes/Orders_class.php');
$orders = new Orders();
/* Get a list of all orders in DB */
$result = $orders->list();
$pickupAddress = $orders->getPickupAdddress();
$deliveryAddress = $orders->getDeliveryAdddress();

for($i=0; $i<count($result);$i++){
    $res[] = array_merge_recursive($result[$i], $pickupAddress[$i], $deliveryAddress[$i]);
};

print_r($result);
?>

   <div class="container">
        <div class="row top-buffer">
            <a href="new_order.php" class="btn-primary btn">New Order</a>
            <h3>Orders</h3>
            <table class=" table table-striped">
                <tr>
                    <th>Order Id</th>                   
                    <th>Pickup Date</th>
                    <th>Customer Name</th>
                    <th>Goods</th>
                    <th>Size</th>
                    <th>Delivery Date</th>
                    <th>Truck Number</th>
                    <th>Status</th>
                    <th>Pickup Address</th>
                    <th>Delivery Address</th>
                    
                    <th></th>
                </tr>

                <?php

                foreach ($res as $val) {
                    echo "<tr>";
                    for($i=0; $i < 8; $i++){
                        echo "<td> $val[$i] </td>
                        ";
                    }                                 
                    
                    echo "<td> $val[11]</td>
                    <td> $val[16]</td><td style='text-align: right'> <a class='btn btn-primary' href='edit_order.php?id=$val[0]'>View and Edit</a> 
                    <a class='btn btn-danger' href='delete_order.php?id=$val[0]'>Delete</a> 
                     </td> 
                     </tr>";
                    }
                    

                ?>
            </table>
        </div>
    </div>
</body>

</html>