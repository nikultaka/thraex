$(document).ready(function(){

    productList();


    $("#productsModal").on("hidden.bs.modal", function () {
        $("#productsForm")[0].reset();
        $("#hid").val("");
        $("#productsForm").validate().resetForm();
        $("#productsForm").find('.error').removeClass('error');
    });



    $('form[id="productsForm"]').validate({
        rules: {
            productname: "required",
        },
        messages: {
            productname: "Product Name is required.",
        },
        submitHandler: function () {
            $.ajax({
                url: BASE_URL +'/product/save',
                type: 'POST',
                data: $('#productsForm').serialize(),
                success: function (response) {
                    var data = JSON.parse(response);
                    if(data.status == 1){
                    // alert(data.msg)
                    Swal.fire({
                        title: "Good job!",
                        text: data.msg,
                        icon: "success"
                      });
                    $('#productsModal').modal('hide');
                    productList();

                    }else{
                    alert(data.msg)
                    }
                }
            });
        },
    });

})

$(document).on('click','#addProduct',function(){
    $('#productsModal').modal('show');
});



$(document).on('click','#productEdit',function(){
    var editId = $(this).data("id");

    // console.log(editId)
        $.ajax({
            type: "post",
            url: BASE_URL + "/product/edit",
            data: {
                _token: $("[name='_token']").val(),
                id: editId,
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status == 1) {
                    $('#hid').val(data.data.id);
                    $('#productname').val(data.data.product_name);
                    $('#productsModal').modal('show');

                } else if (data.status == 0) {
                    alert(data.msg);
                }
            },
        });
});

$(document).on('click','#productDelete',function(){
    var deleteId = $(this).data("id");

    Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
                
    $.ajax({
        type: "post",
        url: BASE_URL +"/product/delete",
        data: {
            _token: $("[name='_token']").val(),
            id: deleteId,
        },
        success: function (response) {
            var data = JSON.parse(response);
            
            if(data.status == 1){
                // alert()
                Swal.fire(data.msg, "", "success");
                productList();

            }else{
                Swal.fire(data.msg, "", "info");
            }
           
        },
    });
          
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
  
});


function productList() {
    $("#productsTable").DataTable({
        processing: true,
        bDestroy: true,
        bAutoWidth: false,
        serverSide: true,
        ajax: {
            type: "POST",
            url: BASE_URL + "/products",
            data: {
                _token: $("[name='_token']").val(),
            },
        },
        columns: [
            { data: "id", name: "id" },
            { data: "product_name", name: "product_name" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            {
                targets: [],
                orderable: false,
                // searchable: true,
            },
        ],
    });
}