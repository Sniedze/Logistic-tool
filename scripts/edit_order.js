//////////////////////Update Order///////////////////////////////////////////
$(".submit_button").click(function(event) {
  
    event.preventDefault();
    
    
    var sOrderId = $("#order_id").val();
    var sCustomerName = $("#customer_name").val();
    var sPickupDate = $("#pickup_date").val();
    var sDeliveryDate = $('#delivery_date').val();
    var sStatus = $("#status").val();
   var sGoods = $("#goods").val();
    var sSize = $("#size").val();
    
     $.ajax({
       url: "orders/edited_order.php",
       dataType: "text",
       type: "POST",
       data: 
        {order_id: sOrderId,
          customer_name: sCustomerName,
          pickup_date: sPickupDate,
          delivery_date: sDeliveryDate,
          goods: sGoods,
          status_name: sStatus,
          size: sSize
     }
     })
       .done(data => {
         if (data) {
           $("#company_name").text(sCustomerName);
           
          
        }
       })
       .fail(() => {
         console.log("Failed");
       });
   });
 