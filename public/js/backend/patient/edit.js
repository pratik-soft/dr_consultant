$(function () {    
    $('#editForm').validate({
        rules: {
            first_name: {
                required: true                
            },
            last_name: {
                required: true                
            },
            contact_number: {
                required: true                
            },
            email: {
                required: true                
            },
            status: {
                required: true                
            },
        },
        messages: {
            first_name: {
                required: "Please enter First name"                
            },            
            last_name: {
                required: "Please enter Last name"                
            },            
            contact_number: {
                required: "Please enter Contact Number"                
            },            
            email: {
                required: "Please enter Email"                
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