
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
if($_POST){
    
    //$sCity = $_POST['city'];
    //$sCountry = $_POST['country'];
    empty($_POST['name'])? $sCustomerName = '[A-Z]':$sCustomerName = $_POST['name'];
    empty($_POST['city'])? $sCity = '[A-Z]':$sCity = $_POST['city'];
    empty($_POST['country'])? $sCountry = '[A-Z]':$sCountry = $_POST['country'];

    echo $sCustomerName;
    echo $sCity;
    echo $sCountry;


    

    print_r($searchResults = $orders->getSearchResults($sCustomerName, $sCity, $sCountry));
    

    ?>
     <div class="container" id="search_container">        
            
            <h2>Search Results</h2>
            <div class="clear_search action_link" id="clear_search_button"><img id="clear-search_icon"src="images/clear-search-button.png"> Clear Search</div>
     
            <table class=" table table-striped" id="search_results">
                <tr class="attribute-row">
                    <th>Order Id</th> 
                    <th>Customer Name</th>                                   
                    <th>Pickup Date</th>
                    <th>Loading at</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Postal code</th>
                    <th>Country</th>                                       
                    <th>Goods</th>
                    <th>Size</th>
                    <th>Delivery Date</th>
                    <th>Truck Number</th>
                    <th>Status</th>
                    <th class='empty-cell'></th>
                    <th class='empty-cell'></th>
                    
                  
                </tr>

                <?php

                foreach ($searchResults as $record) {
                    echo "<tr id='$record[0]'>";
                    for($i=0; $i < count($record); $i++){
                        echo "<td> $record[$i] </td>
                        ";
                    }                                 
                                      
                    echo "<td class='open'> <a href='edit_order.php?id=$record[0]'><img src='images/open-blue.png'></a> 
                    <td class='remove'><img src='images/delete-button.png'></td> 
                     </td> 
                     </tr>";
                    }
                    

                ?>
            </table>
     </div>
  <?php          
}
?>





   <div class="container" id="order_container">
        
            <a href="new_order.php" class="action_link"><img src="images/create-button.png"> New Order</a>
            <h2 id="order_title">Orders</h2>
            <div class="action_link" id="trigger"><img id="search_icon"src="images/search-button.png"> Search</div>
            <div class="modal">
                <div class="modal-content">
                    <img class="close-button" src="images/close-button.png">
                    <form class="form-horizontal" action="orders.php" method="POST" >                    
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Customer</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="city"  name="city">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="">Country</label>
                        <div class="col-sm-10">
                            <input class="input" type="text" id="country"  name="country">
                        </div>
                    </div>
                    <div class="submit_button" id="submit_button">
                            
                            <input type="submit" class="btn" id="save_button" value="Search">
                        </div>
                    </form>
                </div>
            </div>
            <table class=" table table-striped" id="order_table">
                <tr class="attribute-row">
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
                    <th class='empty-cell'></th>
                    <th class='empty-cell'></th>
                    
                  
                </tr>

                <?php

                foreach ($res as $val) {
                    echo "<tr id='$val[0]'>";
                    for($i=0; $i < 8; $i++){
                        echo "<td> $val[$i] </td>
                        ";
                    }                                 
                                      
                    echo "<td> $val[11]</td>
                    <td> $val[16]</td>
                    <td class='open'> <a href='edit_order.php?id=$val[0]'><img src='images/open-blue.png'></a> 
                    <td class='remove'><img src='images/delete-button.png'></td> 
                     </td> 
                     </tr>";
                    }
                    

                ?>
           
            </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/delete_order_alert.js"></script>
    <script src="scripts/search_modal.js"></script>
</body>

</html>