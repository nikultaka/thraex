$(document).ready(function(){

    subproductList();



    
    $("#subproductModal").on("hidden.bs.modal", function () {
        $("#subproductsForm")[0].reset();
        $("#hid").val("");
        $("#subproductsForm").validate().resetForm();
        $("#subproductsForm").find('.error').removeClass('error');
    });




    $('form[id="subproductsForm"]').validate({
        rules: {
            subproductname: "required",
            productid: "required",
        },
        messages: {
            subproductname: "Sub-Product Name is required.",
            productid: "Please Select the Product.",
        },
        submitHandler: function () {
            $.ajax({
                url: BASE_URL +'/subproducts/save',
                type: 'POST',
                data: $('#subproductsForm').serialize(),
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data)
                    if(data.status == 1){
                    alert(data.msg)
                    $('#subproductModal').modal('hide');
                    subproductList();

                    }else{
                    alert(data.msg)
                    }
                }
            });
        },
    });


})
$(document).on('click','#addSubProduct',function(){
    $('#subproductModal').modal('show');
});



$(document).on('click','#subproductEdit',function(){

    var editId = $(this).data("id");

        $.ajax({
            type: "post",
            url: BASE_URL + "/subproducts/edit",
            data: {
                _token: $("[name='_token']").val(),
                id: editId,
            },
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data)
                if (data.status == 1) {
                    $('#hid').val(data.data.id);
                    $('#subproductname').val(data.data.subproduct_name);
                    $('#productid option[value="' + data.data.product_id + '"]').prop('selected', true);
                    $('#subproductModal').modal('show');

                } else if (data.status == 0) {
                    alert(data.msg);
                }
            },
        });
});

$(document).on('click','#subproductDelete',function(){
    var deleteId = $(this).data("id");
    $.ajax({
        type: "post",
        url: BASE_URL +"/subproducts/delete",
        data: {
            _token: $("[name='_token']").val(),
            id: deleteId,
        },
        success: function (response) {
            var data = JSON.parse(response);
            // console.log(data)
            if(data.status == 1){
                alert(data.msg)
                subproductList();
            }else{
                alert(data.msg)
            }
           
        },
    });
});

function subproductList(){
    $("#subproductsTable").DataTable({
        processing: true,
        bDestroy: true,
        bAutoWidth: false,
        serverSide: true,
        ajax: {
            type: "POST",
            url: BASE_URL + "/subproducts",
            data: {
                _token: $("[name='_token']").val(),
            },
        },
        columns: [
            { data: "id", name: "id" },
            { data: "subproduct_name", name: "subproduct_name" },
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

