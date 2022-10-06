$(function () {    
    $('#editForm').validate({
        rules: {
            status: {
                required: true                
            },
        },
        messages: {
            status: {
                required: "Please enter status"
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