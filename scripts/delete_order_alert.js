$(".remove").click(function(){
    var id = $(this).closest("tr").attr("id");
    console.log(id);

    if(confirm('Are you sure to remove this order?'))
    {
        $.ajax({
           url: 'orders/delete_order.php',
           type: 'POST',
           data: {id: id},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                $(`#${id}`).remove();
                alert("Order removed successfully");  
           }
        });
        
    }
});