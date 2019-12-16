<?php
$sPageTitle = 'New Driver';
$sClassActive = 'drivers';
require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Trucks_class.php');
$trucks = new Trucks();
$result = $trucks->list();
foreach ($result as $value){    
        $numbers[] = $value[0];     
};
print_r($result);
print_r($numbers);

    ?>
    <div class="table_container">
            <h2>New Driver</h2>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_driver_added.php">
                    <div class="form-group">
                        <label for="first_name" class="">First Name</label>
                        <input type="text" class="input form-control" id="first_name"  name="first_name">                       
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="">Last Name</label>
                        <input type="text" class="input form-control" id="last_name"  name="last_name">                       
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email</label>
                        <input type="text" class="input form-control" id="email"  name="email">                       
                    </div>
                    <div class="form-group">
                        <label for="truck_number" class="">Truck number</label>
                        <select class="input" name="truck_number">
                            <option value=""></option>
                            <?php
                            foreach ($numbers as $number) {
                                echo "<option value='$number'>$number</option>";
                                
                             }
                            ?>
                           
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label for="cpr" class="">Cpr</label>
                        <input type="text" class="input form-control" id="cpr" name="cpr">                       
                    </div>
                    <div class="form-group">
                        <label for="salary" class="">Salary</label>
                        <input type="text" class="input form-control" id="salary"name="salary">                       
                    </div>
                    <div class="submit_button">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>