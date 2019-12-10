/////////////////////Update Order///////////////////////////////////////////
$("#save_button").click(function(event) {
    console.log("Clicked");
      event.preventDefault();
     
      var sPickupCity = $("#pickup_city").val();
      var sPickupPostalCode = $("#pickup_postal_code").val();
      var sPickupCountry = $("#pickup_country").val();
      var sDeliveryCity = $("#delivery_city").val();
      var sDeliveryPostalCode = $("#delivery_postal_code").val();
      var sDeliveryCountry = $("#delivery_country").val();
      var sPickupLocationId = $("#pickup_location_id").val();
      var sDeliveryLocationId = $("#delivery_location_id").val();   
      
  
      
       $.ajax({
         url: "orders/edited_order_location.php",
         dataType: "text",
         type: "POST",
         data: 
          {
            pickup_city: sPickupCity,
            pickup_postal_code: sPickupPostalCode,
            pickup_country: sPickupCountry,
            delivery_city: sDeliveryCity,
            delivery_postal_code: sDeliveryPostalCode,
            delivery_country: sDeliveryCountry,
            pickup_location_id: sPickupLocationId,
            delivery_location_id: sDeliveryLocationId,
            
            
       }
       })
         .done(data => {
           if (data) {
            
             console.log(data);
          }
         })
         .fail(() => {
           console.log("Failed");
         });
     });
   