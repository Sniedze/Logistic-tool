
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
    $sName = $_POST['name'];
    


    

    $searchResults = $orders->getSearchResults($sName);
    

    ?>
     <div class="container" id="search_container">        
            
            <h2>Search Results</h2>          
     
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
            <form action="orders.php" method="POST" id="search_form" >                       
                     <input class="input" type="text"  id="name" placeholder="Search" name="name">
                     <button id="search_button"><img src="images/search-button.png"></button>                        
                            
            </form>
   <div class="clear_search action_link dontDisplay" id="clear_search_button"><img id="clear-search_icon"src="images/clear-search-button.png"> Clear Search</div>
           
            <h2 id="order_title">Orders</h2><table class=" table table-striped" id="order_table">
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