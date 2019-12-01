
<?php

$sPageTitle = 'Customer';
$sClassActive = 'customers';
require_once(__DIR__.'/includes/top.php');

/* New object of Customers() */
require_once(__DIR__.'/includes/Customers_class.php');
$customers = new Customers();

$result = $customers->getCustomerAndAddresses($_GET["id"]);
$customer = $result[0];

?>
<div class="container">
        <div class="row top-buffer">
            <h3>Edit <span id="company_name"><?= $customer[2]?></span></h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal">
                    
                    <input class="input" type="hidden" id="id" name="id" value="<?= $result['customer_id'] ?>">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input class="input" type="text"  class="form-control" id="name" placeholder="Name" name="name" value="<?= $customer[2] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_num" class="col-sm-2 control-label">Registration Number</label>
                        <div class="col-sm-10">
                            <input class="input" type="text" class="form-control" id="reg_num" placeholder="Registration number" name="reg_num" value="<?= $customer[1] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input class="input" type="email"  class="form-control" id="email" placeholder="email" name="email" value="<?= $customer[3] ?>">
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
        <div class="row top-buffer">            
           

            <h4>Saved Addresses</h4>

            <table class="table table-striped">
                <tr>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
                <?php
                foreach ($result as $val) {
                    echo "<tr>";
                    echo "<td>" . $val[4] . "</td>";
                    echo "<td>" . $val[5] . "</td>";
                    echo "<td>" . $val[6] . "</td>";
                    echo "<td>" . $val[7] . "</td>";
                    echo "<td>" . $val[8] . "</td>";

                    // Check if there is an enrollment and if it is graded
                    // if ($val[5] != null & $val[9] == null) {
                    //     echo "<td><a class='btn btn-primary' href='grade_student.php?sid=" . $val[0] . "&cid=" . $val[5] . "'>Grade Student</a></td>";
                    // } else {
                    //     echo "<td>" . $val[9] . "</td>";
                    // }

                    echo "</tr>";
                }
                ?>

            </table>


        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/edit_customer.js"></script>
</body>

</html>