$(function () {    
    $('#registerForm').validate({
        rules: {
            name: {
                required: true                
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true                
            },
            password_confirmation: {
                required: true,
                equalTo : "#password"
            },
        },
        messages: {
            name: {
                required: "Please enter name"                
            },
            email: {
                required: "Please enter email",
                email: "Please enter a vaild email address"                
            },
            password: {
                required: "Please enter password"
            },
            password_confirmation: {
                required: "Please enter retype password",
                equalTo : "Please enter same password"
            },
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