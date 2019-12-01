
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
            <a href="new_customer.php" class="btn-primary btn">New Customer</a>
            <h3>Customers</h3>
            <table class=" table table-striped">
                <tr>
                    <th>ID</th>                   
                    <th>Registration number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php

                foreach ($result as $val) {
                    echo "<tr>";
                    for($i=0; $i < count($val); $i++){
                        echo "<td>" . $val[$i] . "</td>";
                    }                   
                    
                    echo "<td style='text-align: right'> <a class='btn btn-primary' href='customer.php?id=$val[0]'>View</a>
                    <a class='btn btn-primary' href='edit_customer.php?id=$val[0]'>Edit</a> 
                    <a class='btn btn-danger' href='delete_customer.php?id=$val[0]'>Delete</a> 
                     </td> 
                     </tr>";
                }

                ?>
            </table>
        </div>
    </div>
   
</body>

</html>