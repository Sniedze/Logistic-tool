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
    <div class="container">
            <h3>New Truck</h3>
            <div class="form_container">
                <form class="form-horizontal" method="POST" action="new_truck_added.php">
                    <div class="form-group">
                        <label for="truck_number" class="">Truck number</label>
                        <input type="text" class="form-control" id="truck_number" placeholder="Truck number" name="truck_number">                       
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="">Capacity</label>
                        <input type="text" class="form-control" id="capacity" placeholder="Capacity" name="capacity">                       
                    </div>
                    <div class="form-group">
                        <label for="registration_date" class="">Registration Date</label>
                        <input type="date" class="form-control" id="registration_date" placeholder="Registration Date" name="registration_date">                       
                    </div>
                    
                    <div class="form-group">                        
                            <input type="submit" id="add_button" class="btn btn-primary" value="Save">                      
                    </div>

                </form>
            </div>
        </div>
</body>

</html>