//////////////////////Update Customer///////////////////////////////////////////
$("#save_button").click(function(event) {
    event.preventDefault();
    var sCustomerId = $("#customer_id").val();
    var sName = $("#name").val();
    var sRegNum = $("#reg_num").val();
    var sEmail = $("#email").val()
     $.ajax({
       url: "customers/edited_customer.php",
       dataType: "text",
       type: "POST",
       data: {
         id: sCustomerId,
         name: sName,
         reg_num: sRegNum,
         email: sEmail
      }
     })
       .done(data => {
         if (data) {
           $("#company_name").text(sName);
           $("#reg_num").text(sRegNum);
           $("#email").text(sEmail);
         }
       })
       .fail(() => {});
   });
 