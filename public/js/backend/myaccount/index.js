$(function () {    
    $('#updateProfileForm').validate({
        rules: {
            first_name: {
                required: true                
            },
            last_name: {
                required: true                
            },
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            first_name: {
                required: "Please enter first name"                
            },
            last_name: {
                required: "Please enter last name"                
            },
            email: {
                required: "Please enter email",
                email: "Please enter a vaild email address"                
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            // element.closest('.form-group').append(error);
            element.parent().append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});