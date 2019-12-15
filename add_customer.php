<?php
$sPageTitle = 'New Customer';
$sClassActive = 'customers';
require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Customers_class.php');
    ?>
    <div class="container">
            <h2>New Customer</h2>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_customer_created.php">
                    <div class="form-group">
                        <label for="customer_name" class="">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name">                       
                    </div>
                    <div class="form-group">
                        <label for="reg_num" class="">Registration number</label>
                        <input type="text" class="form-control" id="reg_num" placeholder="Registration number" name="reg_num">                       
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">                       
                    </div>
                    <div class="form-group">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>