
<?php

$sPageTitle = 'Order';
$sClassActive = 'orders';
require_once(__DIR__.'/includes/top.php');

/* New object of orders() */
require_once(__DIR__.'/includes/Orders_class.php');
$orders = new orders();
$ordersList = $orders->list();
$statusNames = $orders->getStatusNames();
foreach ($statusNames as $statusName){
    $stNames[]= $statusName[0];
}
$id = $_GET["id"];
$result = $orders->getOneOrder($id);
$pickupAddress = $orders->getOnePickupAdddress($id);
$deliveryAddress = $orders->getOneDeliveryAdddress($id);

for($i=0; $i<count($result);$i++){
    $res[] = array_merge_recursive($result[$i], $pickupAddress[$i], $deliveryAddress[$i]);
};
print_r($res);
$order = $res[0];
foreach ($ordersList as $ord){    
    $names[] = $ord[2];     
};
?>
<div class="container">
        <div class="row top-buffer">
            <h3>Edit order from <span id="company_name"><?= $order[2]?></span></h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal" id="form">
                    
                    <input class="input" type="hidden" id="order_id" name="order_id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="customer_name">Select Customer</label>
                        <select name="customer_name">
                            <option value="<?= $order[2] ?>" selected><?= $order[2] ?></option>
                            <?php
                            foreach ($names as $name) {
                                echo "<option value='$name'>$name</option>";
                                
                             }
                            ?>
                           
                        </select>                      
                    </div>
                   
                    <div class="form-group">
                        <label for="pickup_date" class="col-sm-2 control-label">Pickup Date</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_date"  name="pickup_date" value="<?= $order[1] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup_company" class="col-sm-2 control-label">Pickup Company</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_company"  name="pickup_company" value="<?= $order[8] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="goods" class="col-sm-2 control-label">Goods</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="goods"  name="goods" value="<?= $order[3] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="size" class="col-sm-2 control-label">Size</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="size"  name="size" value="<?= $order[4] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup_street" class="col-sm-2 control-label">Pickup Street</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_street"  name="pickup_street" value="<?= $order[9] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup_city" class="col-sm-2 control-label">Pickup city</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_city"  name="pickup_city" value="<?= $order[10] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup_postal_code" class="col-sm-2 control-label">Pickup postal code</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_postal_code"  name="pickup_postal_code" value="<?= $order[11] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pickup_country" class="col-sm-2 control-label">Pickup country</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="pickup_country"  name="pickup_country" value="<?= $order[12] ?>">
                        </div>
                    </div>
                                       <div class="form-group">
                        <label for="delivery_date" class="col-sm-2 control-label">Delivery Date</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_date"  name="delivery_date" value="<?= $order[5] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_company" class="col-sm-2 control-label">Delivery Company</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_company"  name="delivery_company" value="<?= $order[13] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_street" class="col-sm-2 control-label">Delivery Street</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_street"  name="delivery_street" value="<?= $order[14] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_city" class="col-sm-2 control-label">Delivery City</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_city"  name="delivery_city" value="<?= $order[15] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_postal_code" class="col-sm-2 control-label">Delivery postal code</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_postal_code"  name="delivery_postal_code" value="<?= $order[16] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_country" class="col-sm-2 control-label">Delivery country</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="delivery_country"  name="delivery_country" value="<?= $order[17] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="truck_number" class="col-sm-2 control-label">Truck Number</label>
                        <div id="truck_number"  name="truck_number"><?= $order[6] ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Select Customer</label>
                        <select name="customer_name">
                            <option value="<?= $order[7] ?>" selected><?= $order[7] ?></option>
                            <?php
                            foreach ($stNames as $stName) {
                                echo "<option value='$stName'>$stName</option>";
                                
                             }
                            ?>
                           
                        </select>                      
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input class="btn btn-primary" id="save_button" value="Save">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="container">          

            <h4>Saved Addresses</h4>
            <?php
            if($order[4]!=null){
                echo "<table id='$id' class='table table-striped'>
                <tr>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>Country</th>
                    <th></th>
                </tr>";
                foreach ($result as $val) {
                    echo "<tr>";
                    for($i=4; $i < count($val); $i++){
                        echo "<td>$val[$i]</td>";
                    }                   
                    
                    echo "<td><a class='btn btn-danger' href='delete_saved_address.php?id=$id'>Delete</a></td>
                   </tr>";
                }
                echo ' </table>';
            }               
                ?>
                <br><a class='btn' href='save_new_address.php?id=<?=$id?>'>Add New Address</a>
            
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/edit_order.js"></script>
</body>

</html>