<?php
$sPageTitle = 'New Order';
$sClassActive = 'orders';
require_once(__DIR__. '/includes/Customers_class.php');
require_once(__DIR__. '/includes/Orders_class.php');
$customers = new Customers();
$result = $customers->list();
foreach ($result as $value){    
        $names[] = $value[1];     
};

require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Orders_class.php');
    ?>
    <div class="order_container">
            <h2>New Order</h2>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_order_created.php">
                    <div class="form_section">   
                        <h4>General Information</h3>
                        <div class="form-group">
                            <label for="customer_name" class="">Customer Name</label>
                            <select name="customer_name">
                                <option value=""></option>
                                <?php
                                foreach ($names as $name) {
                                    echo "<option value='$name'>$name</option>";
                                    
                                }
                                ?>
                            
                            </select>                      
                        </div>
                        <div class="form-group">
                            <label for="goods" class="">Goods</label>
                            <input type="text" class="input" id="goods" placeholder="Goods" name="goods">                       
                        </div>
                        <div class="form-group">
                            <label for="size" class="">Size</label>
                            <input type="text" class="input" id="size" placeholder="Size" name="size">                       
                        </div>
                    </div> 
                    <div class="form_section">
                        <h4>Pickup Information</h3>
                        <div class="form-group">
                            <label for="company_name" class="">Pickup Date</label>
                            <input type="date" class="input" id="pickup_date" placeholder="Pickup Date" name="pickup_date">                       
                        </div>
                        <div class="form-group">
                            <label for="pickup_company_name" class="">Pickup Company Name</label>
                            <input type="text" class="input" id="pickup_company_name" placeholder="Company Name" name="pickup_company_name">                       
                        </div>
                        <div class="form-group">
                            <label for="pickup_street" class="">Street</label>
                            <input type="text" class="input" id="pickup_street" placeholder="Pickup Street" name="pickup_street">                       
                        </div>
                        <div class="form-group">
                            <label for="pickup_postal_code" class="">Pickup Postal Code</label>
                            <input type="text" class="input" id="pickup_postal_code" placeholder="Postal Code" name="pickup_postal_code">                       
                        </div>
                        <div class="form-group">
                            <label for="pickup_city" class="">Pickup City</label>
                            <input type="text" class="input" id="pickup_city" placeholder="Pickup City" name="pickup_city">                       
                        </div>
                        <div class="form-group">
                            <label for="pickup_country" class="">Pickup Country</label>
                            <input type="text" class="input" id="pickup_country" placeholder="Pickup Country" name="pickup_country">                       
                        </div>
                    </div>
                    <div class="form_section">
                        <h4>Delivery Information</h3>
                        <div class="form-group">
                            <label for="delivery_date" class="">Delivery Date</label>
                            <input type="date" class="input" id="delivery_date" placeholder="Delivery Date" name="delivery_date">                       
                        </div>
                        
                        <div class="form-group">
                            <label for="delivery_company_name" class="">Delivery Company Name</label>
                            <input type="text" class="input" id="delivery_company_name" placeholder="Delivery Company Name" name="delivery_company_name">                       
                        </div>
                        <div class="form-group">
                            <label for="delivery_street" class="">Delivery Street</label>
                            <input type="text" class="input" id="delivery_street" placeholder="Delivery Street" name="delivery_street">                       
                        </div>
                        <div class="form-group">
                            <label for="delivery_postal_code" class="">Delivery Postal Code</label>
                            <input type="text" class="input" id="delivery_postal_code" placeholder="Postal Code" name="delivery_postal_code">                       
                        </div>
                        <div class="form-group">
                            <label for="delivery_city" class="">Delivery City</label>
                            <input type="text" class="input" id="delivery_city" placeholder="Delivery City" name="delivery_city">                       
                        </div>
                        <div class="form-group">
                            <label for="delivery_country" class="">Delivery Country</label>
                            <input type="text" class="input" id="delivery_country" placeholder="Delivery Country" name="delivery_country">                       
                        </div>
                    </div>
                    <div class="submit_button">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>