$(function () {    
    $('#addForm').validate({
        ignore: ".ql-container *",
        rules: {
            title: {
                required: true                
            },
            slug: {
                required: true                
            },
            posted_at: {
                required: true                
            },
            content: {
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
            title: {
                required: "Please enter title"                
            },
            slug: {
                required: "Please enter slug"
            },
            posted_at: {
                required: "Please enter posted at"                
            },
            content: {
                required: "Please enter content"
            },
            image: {
                required: "Please enter content"                
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

    $('#title').on('change', function() {
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

    $('#category_id').select2({
        placeholder: "--Select Category--",        
    });

    $('#tags').select2({
        placeholder: "--Please Select--",
        allowClear: true
    });
});