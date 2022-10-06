$(function () {    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#searchBlogForm').validate({
        rules: {
            'search': {
                required: true                
            }
        },
        messages: {
            'search': {
                required: "Please enter search word"
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
            // $('.loading').slideDown();

            // $.ajax({
            //     url: frontend_url + "/contact-action",
            //     type: "POST",
            //     data:{
            //         name: $('#name').val(),
            //         email: $('#email').val(),
            //         phone: $('#phone').val(),
            //         subject: $('#subject').val(),
            //         message: $('#message').val(),
            //     },
            //     success:function(response){
            //         //console.log(response);
            //         if (response){
            //             $("#contactForm")[0].reset();
            //             $('.loading').slideUp();
            //             toastr.success(response.success);
            //         }
            //     },
            //     error: function(response) {                                        
            //         // console.log(response);
            //         // $('.loading').slideUp();
            //         // $('.error-message').html('');
            //         $.each(response.responseJSON.errors, function(key,value) {
            //             // $('.error-message').append('<div class="alert alert-danger">'+value+'</div');
            //             // $('.error-message').append(value+'<br>');
            //             toastr.error(value);
            //         });
            //         // $('.error-message').slideDown();
            //     }
            // });            
        }
    });
});