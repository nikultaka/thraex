$(document).ready(function () {
    console.log(BASE_URL)

    // $("#emailForm").validate({
    //     rules: {
    //         email: {
    //             required: true,
    //             email: true
    //         }
    //     },
    //     messages: {
    //         email: {
    //             required: "email is required",
    //             email: "Email required"
    //         }
    //     },
    //     submitHandler: function (form) {
    //         form.submit();
    //     }
    // });


    $("#emailForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function (form) {
            $('.spinner-border').show();
            var formData = $(form).serialize();
    
            $.ajax({
                url: BASE_URL +"/sendmail",
                type: "POST",
                data: formData,
                success: function(response) {
                 var data = JSON.parse(response);
                    
                    // console.log(data); 
                    if(data.status == 1){
                        alert(data.msg);
                        $('.spinner-border').hide();
                        $("#emailForm")[0].reset();
                        $("#emailForm").validate().resetForm();
                        $("#emailForm").find('.error').removeClass('error');
                    }
                },
                error: function(error) {
                   
                    console.error(error);
                    alert("Error submitting the form. Please try again.");
                }
            });
        }
    });
    
})