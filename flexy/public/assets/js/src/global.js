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
function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#uploadedImage img').attr('src', e.target.result);
        $('#uploadNewImage').hide();
        $('#uploadedImage').show();
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

$(function(){
    form = function () {
        $('.table-edit .btn-delete').on('click',function() {
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
        $("input#image").change(function() {
            readURL(this);
          });
        $('#uploadedImage .oi-x').on('click',function() {
            $(this).closest('#uploadedImage').hide().siblings('#uploadNewImage').show();
        });
        $("#newProduct .btn-back, #editProduct .btn-back").on('click',function(e) {
            e.preventDefault();
            window.location.replace("/products");
        });
        $("#create-tag").on('click',function() {
            $.ajax({
                url: "/api/tags/create",
                type: 'post'
            }).done(function(resp) {
                alert(resp);
                window.location.replace("/tags");
            });
        })
    }
    formValidate = function() {
        $("#newProduct, #editProduct").validate({
            submitHandler: function(form) {
                form.submit();
              },
              rules: {
                title: {
                  required: true,
                  maxlength: 6
                }
            }
        });
    }
    
    form();
    formValidate();
});