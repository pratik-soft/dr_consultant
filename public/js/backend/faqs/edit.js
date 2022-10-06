$(function () {    
    $('#editForm').validate({
        rules: {
            question: {
                required: true                
            },
            answer: {
                required: true                
            },
            status: {
                required: true                
            },
        },
        messages: {
            question: {
                required: "Please enter question"                
            },
            answer: {
                required: "Please enter answer"
            },
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