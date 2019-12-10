//////////////////////Update Order///////////////////////////////////////////
$("#save_button").click(function(event) {
  console.log("Clicked");
    event.preventDefault();
    var values = $("#form").serialize();
    console.log(values);
    var sOrderId = $("#order_id").val();
    var sCustomerName = $("#customer_name").val();
    var sPickupDate = $("#pickup_date").val();
    //var sPickupCompany = $("#pickup_company").val();
    //var sPickupStreet = $("#pickup_street").val();
    // var sPickupCity = $("#pickup_city").val();
    // var sPickupPostalCode = $("#pickup_postal_code").val();
    // var sPickupCountry = $("#pickup_country").val();
    var sDeliveryDate = $('#delivery_date').val();
    var sStatus = $("#status");
    // var sDeliveryCompany = $("#delivery_company").val();
    // var sDeliveryStreet = $("#delivery_street").val();
    // var sDeliveryCity = $("#delivery_city").val();
    // var sDeliveryPostalCode = $("#delivery_postal_code").val();
    // var sDeliveryCountry = $("#delivery_country").val();
    // var sTruckNumber = $("#truck_number").val();
    // var sStatus = $("#status").val();
    var sGoods = $("#goods").val();
    var sSize = $("#size").val();
    // var sPickupLocationId = $("#pickup_location_id");
    // var sDeliveryLocationId = $("#delivery_location_id");
    //var sPickupAddressId = $("#pickup_address_id");
    // var sDeliveryAddressId = $("#delivery_address_id");

    
     $.ajax({
       url: "orders/edited_order.php",
       dataType: "text",
       type: "POST",
       data: 
        {order_id: sOrderId,
          customer_name: sCustomerName,
          pickup_date: sPickupDate,
          
          //pickup_company: sPickupCompany,
          //pickup_street: sPickupStreet,
    //      pickup_city: sPickupCity,
    //      pickup_postal_code: sPickupPostalCode,
    //      pickup_country: sPickupCountry,
          delivery_date: sDeliveryDate,
    //      delivery_company: sDeliveryCompany,
    //      delivery_street: sDeliveryStreet,
    //      delivery_city: sDeliveryCity,
    //      delivery_postal_code: sDeliveryPostalCode,
    //      delivery_country: sDeliveryCountry,
    //      truck_number: sTruckNumber,
    //      status: sStatus,
          goods: sGoods,
          status_name: sStatus,
          size: sSize,
    //      pickup_location_id: sPickupLocationId,
    //      delivery_location_id: sDeliveryLocationId,
          //pickup_address_id: sPickupAddressId,
    //      delivery_address_id: sDeliveryAddressId
     }
     })
       .done(data => {
         if (data) {
           $("#company_name").text(sCustomerName);
           console.log(data);
        }
       })
       .fail(() => {
         console.log("Failed");
       });
   });
 