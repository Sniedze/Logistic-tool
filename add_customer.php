<?php
$sPageTitle = 'New Customer';
$sClassActive = 'customers';
require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Customers_class.php');
    ?>
    <div class="table_container">
            <h2>New Customer</h2>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_customer_created.php">
                    <div class="form-group">
                        <label for="customer_name" class="">Customer Name</label>
                        <input type="text" class="input form-control" id="customer_name" name="customer_name">                       
                    </div>
                    <div class="form-group">
                        <label for="reg_num" class="">Registration number</label>
                        <input type="text" class="input form-control" id="reg_num" name="reg_num">                       
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email</label>
                        <input type="text" class="input form-control" id="email" name="email">                       
                    </div>
                    <div class="submit_button">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>