
<?php

$sPageTitle = 'Customers';
$sClassActive = 'customers';
require_once(__DIR__.'/includes/top.php');

/* New object of Customers() */
require_once(__DIR__.'/includes/Customers_class.php');
$customers = new Customers();
/* Get a list of all customers in DB */
$result = $customers->list();

?>

   <div class="container">
        <div class="row top-buffer">
            <a href="add_customer.php" class="btn-primary btn">New Customer</a>
            <h3>Customers</h3>
            <table class="table">
                <tr>
                    <th>Id</th>                   
                    <th>Name</th>
                    <th>Registration number</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr id='$val[0]'>";
                    for($i=0; $i < count($val); $i++){
                        echo "<td>$val[$i]</td>";
                    }                   
                    
                    echo "<td style='text-align: right'> 
                            <a class='btn btn-primary' href='customer.php?id=$val[0]&$val[1]'>View and Edit</a>
                            <button class='remove'>Delete</button> 
                          </td> 
                     </tr>";
                }

                ?>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/delete_alert.js"></script>
</body>

</html>