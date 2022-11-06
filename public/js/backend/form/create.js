
$(".radio_button").click(function(){
    // $(this).click(function(){
        if($(this).attr("value") == 1){
            $('.radio_button').parent().parent('.full_question').find('.show_if_yes').addClass('checkedMMMM'); 
            $(this).parent().parent('.full_question').find('.show_if_yes').show(); 
        }
        else {
            console.log("--+++-");
            $('.radio_button').parent().parent('.full_question').find('.show_if_yes').addClass('checkedMMMM'); 
            $(this).parent().parent('.full_question').find('.show_if_yes').hide(); 
        }
    });
// });


$(function () { 
    $('#addForm').validate({
        ignore: [],        
        focusInvalid: false,
        rules: {
            'diagnoses': {
                required: true                
            },
            'past_medical_history': {
                required: true                
            },
            'other_symptoms': {
                required: true,
            },
            'central_nervous_system': {
                required: true,                
            },
            'musculoskeletal': {
                required: true                
            },
            'gastrointestinal': {
                required: true,
            },
            'urogenital_symptoms': {
                required: true,
            },
            'skin': {
                required: true,
            },
            'gynae': {
                required: true,
            },
            'drug_allergies': {
                required: true,
            },
            'updates': {
                required: true,
            },
            'risk_factors_c': {
                required: true,
            },
            'family_history': {
                required: true,
            },
            'interventions': {
                required: true,
            },
            'new_tests': {
                required: true,
            },
        },
        messages: {
            /*'first_name': {
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
            },*/
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