$(function () {    
    $('#addForm').validate({
        rules: {
            name: {
                required: true                
            },
            description: {
                required: true                
            },
            status: {
                required: true                
            }
        },
        messages: {
            name: {
                required: "Please enter name"                
            },
            description: {
                required: "Please enter description"
            },
            status: {
                required: "Please enter status"                
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

    //Date range picker
    $('#posted_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });

    $('#content').summernote({
        placeholder: 'Content',        
        height: 200
    });
});