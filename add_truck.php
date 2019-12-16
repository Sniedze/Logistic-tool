<?php
$sPageTitle = 'New Truck';
$sClassActive = 'trucks';
require_once(__DIR__. '/includes/top.php');
require_once(__DIR__ . '/includes/Trucks_class.php');
$trucks = new Trucks();
$result = $trucks->list();
foreach ($result as $value){    
        $numbers[] = $value[0];     
};

    ?>
    <div class="table_container">
            <h2>New Truck</h2>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_truck_added.php">
                    <div class="form-group">
                        <label for="truck_number" class="">Truck number</label>
                        <input type="text" class="input form-control" id="truck_number" name="truck_number">                       
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="">Capacity</label>
                        <input type="text" class="input form-control" id="capacity" name="capacity">                       
                    </div>
                    <div class="form-group">
                        <label for="registration_date" class="">Registration Date</label>
                        <input type="date" class="input form-control" id="registration_date" name="registration_date">                       
                    </div>
                    
                    <div class="submit_button">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>