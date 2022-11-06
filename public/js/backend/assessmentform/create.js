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
            'blood_sample': {
                required: true                
            },
            'ecg': {
                required: true                
            },
            'echocardiogram': {
                required: true                
            },
            'cmr': {
                required: true                
            },
            'holt': {
                required: true                
            },
            'pacemaker': {
                required: true                
            },
            'ett': {
                required: true                
            },
            'computed_tomography': {
                required: true                
            },
            'other': {
                required: true                
            },
            'on_examination': {
                required: true                
            },
            'blood_pressure': {
                required: true                
            },
            'heart_rate': {
                required: true                
            },
            'weight': {
                required: true                
            },
            'plans': {
                required: true                
            },
            'nota_bene': {
                required: true                
            },
            'ask_about': {
                required: true                
            },
            'main_diagnosis': {
                required: true                
            },
            'md_tests': {
                required: true                
            },
            'md_treatment': {
                required: true                
            },
            'risk_strat': {
                required: true                
            },
            'driving_dvla': {
                required: true                
            },
            'anticoagulation': {
                required: true                
            },
            'has_bled_score': {
                required: true                
            },
            'icd': {
                required: true                
            },
            'discharge': {
                required: true                
            },
            'date_of_next_follow_up': {
                required: true                
            },
            'genetics': {
                required: true                
            },
            'bp_recorder': {
                required: true                
            },
            'lipid': {
                required: true                
            },
            'family_screening': {
                required: true                
            },
            'chase': {
                required: true                
            },
            'diagnosis_other': {
                required: true                
            },
            'covid': {
                required: true                
            },
            'dental_check': {
                required: true                
            },
            'exercise': {
                required: true                
            },
            'alcohol_smoking': {
                required: true                
            },
            'dtf': {
                required: true                
            },
            'dt': {
                required: true                
            },
            'stop_ace_arb': {
                required: true                
            },
            'stop_meds': {
                required: true                
            },
            'ocp_card_preg_service': {
                required: true                
            },
            'cmuk': {
                required: true                
            },
            'bhf': {
                required: true                
            },
            'red_flags': {
                required: true                
            },
            'follow_up_mention': {
                required: true                
            },
            'call_after_tests': {
                required: true                
            },
            'time_of_follow_up': {
                required: true                
            },
            'follow_up_mdt': {
                required: true                
            },
            'follow_up_cc': {
                required: true                
            },
            'follow_up_red_flags': {
                required: true                
            },
        },
        messages: {
            
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
            alert('aaa');
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
    //Date range picker
    $('#date_of_next_follow_up').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });

});