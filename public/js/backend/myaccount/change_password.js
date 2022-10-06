$(function () {    
    $('#changePasswordForm').validate({
        rules: {
            old_password: {
                required: true                
            },                        
            new_password: {
                required: true                
            },
            confirm_password: {
                required: true,
                equalTo : "#new_password"
            },
        },
        messages: {
            old_password: {
                required: "Please enter old password"                
            },            
            new_password: {
                required: "Please enter new password"
            },
            confirm_password: {
                required: "Please enter confirm password",
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