$(document).ready(function(){
    
    productDetailsList();
    
    //Banner Setting 
    $('form[id="bannerSettingForm"]').validate({
        rules: {
            title: 'required',
            subTitle: 'required',
            banneDescription: 'required',
        },
        messages: {
            title: 'title is required',
            subTitle: 'sub-title is required',
            banneDescription: 'banner description is required',
        },
        submitHandler: function() {
            var formData = new FormData($("#bannerSettingForm")[0]);
            $.ajax({
                url: BASE_URL + '/save/products/details',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    var data = JSON.parse(response);
                //    console.log(data);
                   if(data.status == 1){

                    $("#bannerSettingForm")[0].reset();
                    $("#hid").val("");
                    $("#bannerSettingForm").validate().resetForm();
                    $("#bannerSettingForm").find('.error').removeClass('error');
                    alert(data.msg)
                    productDetailsList();
                  
                }else{
                    alert(data.msg)
                   }
                }
            });
        }
});

// Product Description Save
$('form[id="descriptionForm"]').validate({
    rules: {
        description1: "required",
    },
    messages: {
        description1: "description is required.",
    },
    submitHandler: function () {
        $.ajax({
            url: BASE_URL +'/save/products/description',
            type: 'POST',
            data: $('#descriptionForm').serialize(),
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data)
                if(data.status == 1){
                    alert(data.msg)
                    $("#descriptionForm")[0].reset();
                    $("#hid").val("");
                    $("#descriptionForm").validate().resetForm();
                    $("#descriptionForm").find('.error').removeClass('error');

                }else{
                alert(data.msg)
                }
            }
        });
    },
});

// Save technology details
$('form[id="technologyForm"]').validate({
    rules: {
        tectitle: "required",
        tecdescription: "required",
    },
    messages: {
        tectitle: "title is required.",
        tecdescription: "description is required.",
    },
    submitHandler: function() {
        var formData = new FormData($("#technologyForm")[0]);
        $.ajax({
            url: BASE_URL + '/save/products/technology',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                var data = JSON.parse(response);
            //    console.log(data);
               if(data.status == 1){

                $("#technologyForm")[0].reset();
                $("#hid").val("");
                $("#technologyForm").validate().resetForm();
                $("#technologyForm").find('.error').removeClass('error');
                alert(data.msg)
              
            }else{
                alert(data.msg)
               }
            }
        });
    }
});


// Save Sub-technology details

$('form[id="technologySubForm"]').validate({
    rules: {
        tecSubtitle: "required",
        tecSubdescription: "required",
    },
    messages: {
        tecSubtitle: "title is required.",
        tecSubdescription: "description is required.",
    },
    submitHandler: function () {
        $.ajax({
            url: BASE_URL +'/subtechnology/save',
            type: 'POST',
            data: $('#technologySubForm').serialize(),
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data)
                if(data.status == 1){
                    alert(data.msg)
                    $("#technologySubForm")[0].reset();
                    $("#hid").val("");
                    $("#technologySubForm").validate().resetForm();
                    $("#technologySubForm").find('.error').removeClass('error');

                }else{
                alert(data.msg)
                }
            }
        });
    },
});


// Save Addon details
$('form[id="addonForm"]').validate({
    rules: {
        addontitle: "required",
        addOndescription: "required",
    },
    messages: {
        addontitle: "title is required.",
        addOndescription: "description is required.",
    },
    submitHandler: function() {
        var formData = new FormData($("#addonForm")[0]);
        $.ajax({
            url: BASE_URL + '/save/products/addon',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                var data = JSON.parse(response);
            //    console.log(data);
               if(data.status == 1){

                $("#addonForm")[0].reset();
                $("#hid").val("");
                $("#addonForm").validate().resetForm();
                $("#addonForm").find('.error').removeClass('error');
                alert(data.msg)
              
            }else{
                alert(data.msg)
               }
            }
        });
    }
});


})


$(document).on('click','#productDetailsDelete',function(){

    var deleteId = $(this).data("id");

    console.log(deleteId)
    $.ajax({
        type: "post",
        url: BASE_URL +"/delete/products/details",
        data: {
            _token: $("[name='_token']").val(),
            id: deleteId,
        },
        success: function (response) {
            var data = JSON.parse(response);
            
            if(data.status == 1){
                alert(data.msg)
                productDetailsList();

            }else{
                alert(data.msg)
            }
           
        },
    });
});


$(document).on('click','#productDetailsEdit',function(){
    var editId = $(this).data("id");
    console.log(editId);

        $.ajax({
            type: "post",
            url: BASE_URL + "/edit/products/details",
            data: {
                _token: $("[name='_token']").val(),
                id: editId,
            },
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data)
                if (data.status == 1) {
                    $('#hid').val(data.data.id);
                    $('#title').val(data.data.title);
                    $('#subTitle').val(data.data.sub_title);
                    $('#imgHid').val(data.data.banner_img);
                    $('#banneDescription').val(data.data.banner_description);
                } else if (data.status == 0) {
                    alert(data.msg);
                }
            },
        });
});

function productDetailsList(){

    $("#productDetailsTable").DataTable({
        processing: true,
        bDestroy: true,
        bAutoWidth: false,
        serverSide: true,
        ajax: {
            type: "POST",
            url: BASE_URL + "/products/details",
            data: {
                _token: $("[name='_token']").val(),
            },
        },
        columns: [
            { data: "id", name: "id" },
            { data: "title", name: "title" },
            { data: "sub_title", name: "sub_title" },
            { data: "banner_img", name: "banner_img" },
            { data: "banner_description", name: "banner_description" },
            { data: "product_id", name: "product_id" },
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


