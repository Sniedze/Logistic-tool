<?php
$sPageTitle = 'New Address';
$sClassActive = 'customers';
$sId = $_GET['id'];

require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Customers_class.php');
    ?>
    <div class="container">
            <h3>New Saved Address</h3>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_address_saved.php">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$sId?>">                  
                    <div class="form-group">
                        <label for="company_name" class="">Company Name</label>
                        <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name">                       
                    </div>
                    <div class="form-group">
                        <label for="street" class="">Street</label>
                        <input type="text" class="form-control" id="street" placeholder="Street" name="street">                       
                    </div>
                    <div class="form-group">
                        <label for="postal_code" class="">Postal_code</label>
                        <input type="text" class="form-control" id="postal_code" placeholder="Postal_code" name="postal_code">                       
                    </div>
                    <div class="form-group">
                        <label for="city" class="">City</label>
                        <input type="text" class="form-control" id="city" placeholder="City" name="city">                       
                    </div>
                    <div class="form-group">
                        <label for="country" class="">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country" name="country">                       
                    </div>
                    <div class="form-group">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>