$(function () {    
    $('#editForm').validate({
        rules: {
            fullname: {
                required: true                
            },
            position_id: {
                required: true                
            },
            status: {
                required: true                
            },
        },
        messages: {
            fullname: {
                required: "Please enter full name"                
            },            
            position_id: {
                required: "Please select position"                
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

    $('#position_id').select2({
        placeholder: "--Select Position--",        
    });
});