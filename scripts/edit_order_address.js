//////////////////////Update Order///////////////////////////////////////////
$("#save_button").click(function(event) {
    
      event.preventDefault();
      
      var sPickupCompany = $("#pickup_company").val();
      var sPickupStreet = $("#pickup_street").val();     
      var sPickupAddressId = $("#pickup_address_id").val(); 
      var sDeliveryCompany = $("#pickup_company").val();
      var sDeliveryStreet = $("#delivery_street").val();     
      var sDeliveryAddressId = $("#delivery_address_id").val(); 
      
      
       $.ajax({
         url: "orders/edited_order_address.php",
         dataType: "text",
         type: "POST",
         data: {
          
            delivery_company: sDeliveryCompany,
            delivery_street: sDeliveryStreet,
            delivery_address_id: sDeliveryAddressId,
            pickup_company: sPickupCompany,
            pickup_street: sPickupStreet,
            pickup_address_id: sPickupAddressId


     
       }
       })
         .done(data => {
           if (data) {
            
             
          }
         })
         .fail(() => {
           console.log("Failed");
         });
     });
   