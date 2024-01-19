$(document).ready(function() {
console.log(window.location.href)
    $('form[id="aboutForm"]').validate({
        rules: {
            title: "required",
            subtitle: "required",
            description: "required",
        },
        messages: {
            title: "required",
            subtitle: "required",
            description: "required",
        },
        submitHandler: function() {
            var formData = new FormData($("#aboutForm")[0]);
            $.ajax({
                url: BASE_URL + '/save/about',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    if(data.status == 1){
                    Swal.fire({
                        title: "Good job!",
                        text: data.msg,
                        icon: "success"
                      });
                      $("#aboutForm")[0].reset();
                      $("#aboutForm").validate().resetForm();
                      $("#aboutForm").find('.error').removeClass('error');
                    }else{
                    alert(data.msg)
                    }
                }
            });
        }
    });


    $('form[id="contactForm"]').validate({
        // url validation

        rules: {
            address: "required",
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            email: {
                required: true,
                email: true
            },
            website: "required"
        },
        messages: {
            address: "Address is required",
            phone: {
                required: "Phone is required",
                number: "Phone must be numeric",
                minlength: "Phone must be 10 digit",
                maxlength: "Phone must be 10 digit"
            },
            email: {
                required: "Email is required",
                email: "Email must be valid"
            },
            website:"Website url is required",
    
        },
        submitHandler: function () {
            $.ajax({
                url: BASE_URL +'/save/contacts',
                type: 'POST',
                data: $('#contactForm').serialize(),
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    if(data.status == 1){
                  
                    Swal.fire({
                        title: "Good job!",
                        text: data.msg,
                        icon: "success"
                      });
                    //   $('#contactRefresh').load(window.location.href + ' #contactRefresh');
                      $("#contactForm")[0].reset();
                      $("#contactForm").validate().resetForm();
                      $("#contactForm").find('.error').removeClass('error');
                    }else{
                    alert(data.msg)
                    }
                }
            });
        },
    });
 });