$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ajaxStart(function() { Pace.restart(); });    

    $('#subscribeForm').validate({
        rules: {
            'email': {
                required: true                
            }
        },
        messages: {
            'email': {
                required: "Please enter your email"
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

            $.ajax({
                url: frontend_url + "/subscriber-action",
                type: "POST",
                data:{                    
                    email: $('#subscriptionEmail').val()                    
                },
                success:function(response){
                    //console.log(response);
                    if (response){
                        $("#subscribeForm")[0].reset();
                        toastr.success(response.success);
                    }
                },
                error: function(response) {                                                            
                    $.each(response.responseJSON.errors, function(key,value) {
                        toastr.error(value);
                    });                    
                }
            });

        }
    });

    /**
    * Clients Slider
    */
    new Swiper('.clients-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        // breakpoints: {
        //     320: {
        //         slidesPerView: 2,
        //         spaceBetween: 40
        //     },
        //     480: {
        //         slidesPerView: 3,
        //         spaceBetween: 60
        //     },
        //     640: {
        //         slidesPerView: 4,
        //         spaceBetween: 80
        //     },
        //     992: {
        //         slidesPerView: 6,
        //         spaceBetween: 120
        //     }
        // }                
        breakpoints: {            
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 120,
            }
        }
    });

});

function toastrMsg(icon, title)
{    
    if(icon == 'success')
    {
        toastr.success(title)
    }

    if(icon == 'error')
    {
        toastr.error(title)
    }

    if(icon == 'warning')
    {
        toastr.warning(title)
    }

    if(icon == 'info')
    {
        toastr.info(title)
    }
}

function replaceText() {

    $("body").find(".highlight").removeClass("highlight");

    var searchword = $("#searchtxt").val();

    var custfilter = new RegExp(searchword, "ig");
    var repstr = "<span class='highlight'>" + searchword + "</span>";

    if (searchword != "") {
        $('body').each(function() {
            $(this).html($(this).html().replace(custfilter, repstr));
        })
    }
}