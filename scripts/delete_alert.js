$(".remove").click(function(){
    var id = $(this).closest("tr").attr("id");
    console.log(id);

    if(confirm('Are you sure to remove this record?'))
    {
        $.ajax({
           url: 'customers/delete_customer.php',
           type: 'GET',
           data: {id: id},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
                $(`#${id}`).remove();
                alert("Record removed successfully");  
           }
        });
        
    }
});