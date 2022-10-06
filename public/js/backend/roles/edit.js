$(function () {    
    $('#editForm').validate({
        rules: {
            name: {
                required: true                
            },
        },
        messages: {
            name: {
                required: "Please enter name"                
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
});

function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="permission[]"]').each(function() { 
			this.checked = true; 
		});
	} else {
		$('input[name="permission[]"]').each(function() {
			this.checked = false;
		});
	}
}