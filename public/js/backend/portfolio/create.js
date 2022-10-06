$(function () {    
    $('#addForm').validate({
        ignore: ".ql-container *",
        rules: {
            name: {
                required: true                
            },
            slug: {
                required: true                
            },            
            detail: {
                required: true                
            },
            image: {
                required: true                
            },
            category_id: {
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
            slug: {
                required: "Please enter slug"
            },
            detail: {
                required: "Please enter detail"
            },
            image: {
                required: "Please select image"                
            },
            category_id: {
                required: "Please select category"                
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

    $('#name').on('change', function() {
        var slug = slugify(this.value);
        $('#slug').val(slug);
    });

    function slugify(text)
    {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    $('#detail').summernote({
        placeholder: 'Detail',        
        height: 200
    });

    $('#category').select2({
        placeholder: "--Select Category--",        
    });

    $('#tags').select2({
        placeholder: "--Please Select--",
        allowClear: true
    });
});