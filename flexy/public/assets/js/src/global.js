function getFormData($form,json){
    var unindexed_array = $form.serializeArray();
    if(json) {
        return JSON.stringify(unindexed_array);
    }
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return JSON.stringify(indexed_array);
}


$(function(){
    form = function () {
        // $("#newProduct [type=submit]").on("click",function(e) {
        //     e.preventDefault();
        //     $form = $(this).closest('form');
        //     console.log($form);
        //     $formData = getFormData($form);
        //     console.log($formData);
        //     $.ajax({
        //         url: "/api/products",
        //         type: 'post',
        //         dataType: 'json',
        //         contentType: 'application/json',
        //         data: $formData
        //       }).done(function() {
        //         $( this ).addClass( "done" );
        //       });
        // });
        $('.table-edit .oi-trash').on('click',function() {
            let id = $(this).closest('tr').attr('data-id');
            $confirmModal = $('#confirmModal');
            $confirmModal.modal('show');
            $('#modal-btn-yes').on('click',function() {
                $.ajax({
                    url: "/api/products/delete/"+id,
                    type: 'post',
                    dataType: 'json',
                    contentType: 'application/j$son'
                }).done(function() {
                    $confirmModal.modal('hide');
                    $('.table-edit tr[data-id='+id+']').fadeOut().remove();
                });
            });
        });
    }
    
    form();
    
});