$(function () {    
    $('#addForm').validate({
        ignore: [],        
        focusInvalid: false,
        rules: {
            'first_name': {
                required: true                
            },
            'last_name': {
                required: true                
            },
            'email': {
                required: true,
                email: true,
            },
            'phone': {
                required: true,                
            },
            'password': {
                required: true                
            },
            'password_confirmation': {
                required: true,
                equalTo : "#password"
            },
            'roles[]': {
                required: true                
            },
            'status': {
                required: true                
            },
        },
        messages: {
            'first_name': {
                required: "Please enter first name"                
            },
            'last_name': {
                required: "Please enter last name"                
            },
            'email': {
                required: "Please enter email",
                email: "Please enter a vaild email address"                
            },
            'phone': {
                required: "Please enter phone"
            },
            'password': {
                required: "Please enter password"
            },
            'password_confirmation': {
                required: "Please enter confirm password",
                equalTo : "Please enter same password"
            },
            'roles[]': {
                required: "Please select roles"                
            },
            'status': {
                required: "Please select status"                
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
            
            if($('#add-user-basic-details').find('.is-invalid').length != 0){                                                                
                $('#add-user-basic-details-tab').css('color', 'red');
            }else{
                $('#add-user-basic-details-tab').css('color', '#495057');
            }

            if($('#add-user-roles-and-permissions').find('.is-invalid').length != 0){                                                
                $('#add-user-roles-and-permissions-tab').css('color', 'red');
            }else{
                $('#add-user-roles-and-permissions-tab').css('color', '#495057');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            form.submit();
        },
        invalidHandler: function(form, validator) {

            if (!validator.numberOfInvalids())
                return;
    
            $('html, body').animate({
                scrollTop: $(validator.errorList[0].element).offset().top
            }, 2000);
    
        }
    });

    $('#roles').select2({
        placeholder: "--Please Select--",
        allowClear: true
    });

    $('.checkAll').on("click", function(){        
        $('input:checkbox:not(:disabled)').prop("checked", true);
    });

    $('.unCheckAll').on("click", function(){        
        $('input:checkbox:not(:disabled)').prop("checked", false);
    });

    function disableRolePermissions(roleName = '')
    {
        if(roleName != '')
        {
            if(typeof role_permissions[roleName] !== "undefined" && role_permissions[roleName])
            {
                // console.log(role_permissions[roleName]);
                // console.log(role_permissions[roleName].length)
                
                $("input[name='permissions[]']").each(function (index, obj) {
                    // loop all checked items
                    // console.log($(this).val());
                    var n = role_permissions[roleName].includes(parseInt($(this).val()));
                    // console.log(n);
                    if(n)
                    {
                        $(this).prop("checked", false);
                        $(this).attr("disabled", true);
                        $(this).parent().css("color", "lightgray");
                    }                    
                });
            }            
        }                
    }    

    $("#roles").on('select2:select', function (e) {
        
        //enable all checkboxes
        $("input[name='permissions[]']").each(function (index, obj) {
            // loop all checked items
            $(this).removeAttr("disabled");
            $(this).parent().css("color", "");
        });


        // console.log($(this).val());
        var selectedRoles = $(this).val();
        if(selectedRoles)
        {
            var i;
            for (i = 0; i < selectedRoles.length; i++)
            {            
                // console.log(selectedRoles[i]);
                disableRolePermissions(selectedRoles[i]);
            }
        }        
    });

    $("#roles").on('select2:unselect', function (e) {
        
        //enable all checkboxes
        $("input[name='permissions[]']").each(function (index, obj) {
            // loop all checked items
            $(this).removeAttr("disabled");
            $(this).parent().css("color", "");
        });


        // console.log($(this).val());
        var selectedRoles = $(this).val();
        if(selectedRoles)
        {
            var i;
            for (i = 0; i < selectedRoles.length; i++)
            {            
                // console.log(selectedRoles[i]);
                disableRolePermissions(selectedRoles[i]);
            }
        }        
    });
});