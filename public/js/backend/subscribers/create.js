$(function () {    
    $('#addForm').validate({
        rules: {
            email: {
                required: true                
            }
        },
        messages: {
            email: {
                required: "Please enter email"                
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