
<?php

$sPageTitle = 'Customer';
$sClassActive = 'customers';
require_once(__DIR__.'/includes/top.php');

/* New object of Customers() */
require_once(__DIR__.'/includes/Customers_class.php');
$customers = new Customers();
$id = $_GET["id"];
$result = $customers->getCustomerAndAddresses($id);
$customer = $result[0];

?>
<div class="container">
        <div class="row top-buffer">
            <h3>Edit <span id="company_name"><?= $customer[2]?></span></h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal">
                    
                    <input class="input" type="hidden" id="customer_id" name="customer_id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="name" placeholder="Name" name="name" value="<?= $customer[2] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_num" class="col-sm-2 control-label">Registration Number</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  id="reg_num" placeholder="Registration number" name="reg_num" value="<?= $customer[1] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input class="input" type="email" id="email" placeholder="email" name="email" value="<?= $customer[3] ?>">
                        </div>
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
            if($customer[4]!=null){
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
    <script src="scripts/edit_customer.js"></script>
</body>

</html>