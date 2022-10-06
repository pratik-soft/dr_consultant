$(function () {

    // // hold onto the drop down menu                                             
    // var dropdownMenu;

    // // and when you show it, move it to the body                                     
    // $(window).on('show.bs.dropdown', function (e) {
    //     // alert('asd');
    //     // grab the menu        
    //     dropdownMenu = $(e.target).find('.dropdown-menu');

    //     // detach it and append it to the body
    //     $('body').append(dropdownMenu.detach());

    //     // grab the new offset position
    //     var eOffset = $(e.target).offset();

    //     // make sure to place it where it would normally go (this could be improved)
    //     dropdownMenu.css({
    //         // 'display': 'block',
    //             'top': eOffset.top + $(e.target).outerHeight(),
    //             'left': eOffset.left,
    //             'position' : 'absolute'
    //     });
    // });

    // // and when you hide it, reattach the drop down, and hide it normally                                                   
    // $(window).on('hide.bs.dropdown', function (e) {
    //     $(e.target).append(dropdownMenu.detach());
    //     dropdownMenu.hide();
    // });

    // $('.dropdown-menu').parent().on('shown.bs.dropdown', function () {
    //     var $menu = $("ul", this);
    //     offset = $menu.offset();
    //     position = $menu.position();
    //     $('body').append($menu);
    //     $menu.show();
    //     $menu.css('position', 'absolute');
    //     $menu.css('top', (offset.top) + 'px');
    //     $menu.css('left', (offset.left) + 'px');
    //     $(this).data("myDropdownMenu", $menu);
    // });
    // $('.dropdown-menu').parent().on('hide.bs.dropdown', function () {
    //     $(this).append($(this).data("myDropdownMenu"));
    //     $(this).data("myDropdownMenu").removeAttr('style');
    
    // });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ajaxStart(function() { Pace.restart(); });

    //Enable tooltips everywhere
    $('[data-toggle="tooltip"]').tooltip({
        html : false,
    });

    $('#created_at').daterangepicker({
        autoUpdateInput: false,
        timePicker: true,
        timePickerIncrement: 15,
        locale: {
            format: 'MM/DD/YYYY hh:mm A',
            cancelLabel: 'Clear'
        },
        ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
    });
  
    $('#created_at').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY hh:mm A') + ' - ' + picker.endDate.format('MM/DD/YYYY hh:mm A'));
    });
  
    $('#created_at').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('#updated_at').daterangepicker({
        autoUpdateInput: false,
        timePicker: true,
        timePickerIncrement: 15,
        locale: {
            format: 'MM/DD/YYYY hh:mm A',
            cancelLabel: 'Clear'
        },
        ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
    });
  
    $('#updated_at').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY hh:mm A') + ' - ' + picker.endDate.format('MM/DD/YYYY hh:mm A'));
    });
  
    $('#updated_at').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('#deleted_at').daterangepicker({
        autoUpdateInput: false,
        timePicker: true,
        timePickerIncrement: 15,
        locale: {
            format: 'MM/DD/YYYY hh:mm A',
            cancelLabel: 'Clear'
        },
        ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
    });
  
    $('#deleted_at').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY hh:mm A') + ' - ' + picker.endDate.format('MM/DD/YYYY hh:mm A'));
    });
  
    $('#deleted_at').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    /*
    * Actions
    */
    $('#ajaxDatatable tbody').on( 'click', '.select_row', function () {
        $(this).parent().parent().toggleClass('selected');
        
        if($(".select_row").length == $(".select_row:checked").length) {
            $(".select_all_rows").prop("checked", true);
        } else {
            $(".select_all_rows").prop("checked", false);
        }

        if($(".select_row:checked").length == 0){
            $('.datatable_actions').hide();
        } else {
            $('.datatable_actions').show();
        }
    });

    /*
    * clear search form
    */
    $('#clearBtn').on('click', function(e) {                
        $('#searchForm').trigger("reset");
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

function deleteRow(ref)
{        
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-default ml-1'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#444',
        confirmButtonText: '<i class="fas fa-trash"></i> Yes, delete it!',
        cancelButtonText: '<i class="fas fa-times-circle"></i> Cancel'        
    }).then((result) => {
        if (result.isConfirmed)
        {
            $.ajax({
                url:$(ref).attr('url'),
                success:function(data)
                {
                    toastrMsg('success', 'Record deleted successfully.');
                    $('#ajaxDatatable').DataTable().ajax.reload();
                }
            })    
        }
    })    
}

function deleteFile(ref)
{        
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-default ml-1'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#444',
        confirmButtonText: '<i class="fas fa-trash"></i> Yes, delete it!',
        cancelButtonText: '<i class="fas fa-times-circle"></i> Cancel'        
    }).then((result) => {
        if (result.isConfirmed)
        {
            $.ajax({
                url:$(ref).attr('url'),
                success:function(data)
                {
                    toastrMsg('success', 'Record deleted successfully.');
                    location.reload();
                }
            })    
        }
    })    
}

function apply_action(action_name, action_url)
{       
    var oTable = $('#ajaxDatatable').DataTable();
    var selected_records = oTable.rows('.selected').data().length;
    // console.log(oTable.rows('.selected').data())

    var confirmButton = 'btn btn-danger';
    var confirmButtonColor = '#d33';
    var fa_icon = 'fas fa-check';
    var fa_btn = 'apply action';
    if(action_name == 'DELETE'){
        confirmButtonColor = '#dc3545';
        confirmButton = 'btn btn-danger';
        fa_icon = 'fas fa-trash';
        fa_btn = 'delete';
    }

    if(action_name == 'ACTIVE'){
        confirmButtonColor = '#28a745';
        confirmButton = 'btn btn-success';
        fa_icon = 'fas fa-check';
        fa_btn = 'active';
    }

    if(action_name == 'INACTIVE'){
        confirmButtonColor = '#ffc107';
        confirmButton = 'btn btn-warning';
        fa_icon = 'fas fa-ban';
        fa_btn = 'inactive';
    }

    if(action_name == 'BLOCK'){
        confirmButtonColor = '#343a40';
        confirmButton = 'btn btn-dark';
        fa_icon = 'fas fa-lock';
        fa_btn = 'block';
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: confirmButton,
            cancelButton: 'btn btn-default ml-1'
        },
        buttonsStyling: false
    })

    

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert these record(s)!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: confirmButtonColor,
        cancelButtonColor: '#444',
        confirmButtonText: '<i class="'+fa_icon+'"></i> Yes, '+fa_btn+' '+selected_records+' record(s) !',
        cancelButtonText: '<i class="fas fa-times-circle"></i> Cancel'        
    }).then((result) => {
        if (result.isConfirmed)
        {      
            var ids = [];
            $(".select_row:checked").each(function(){
                ids.push($(this).val());
            });

            var data = {
                action_name: action_name,
                ids: ids                                
            }

            $.ajax({
                type: 'POST',
                url: action_url,
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success:function(response) {
                    if (response) {
                        oTable.draw();
                        toastrMsg('success', response.message);
                        // $('#ajaxDatatable').DataTable().ajax.reload();                        
                    }                    
                },
                error: function(response) {
                    // console.log(response);
                    $.each(response.responseJSON.errors, function(key,value) {                        
                        toastr.error(value);
                    });                    
                }
            })
        }
    })    
}

function select_deselect_rows(isChecked) {
	if(isChecked) {
		$('.select_row').each(function() { 
			this.checked = true;
            $(this).parent().parent().addClass('selected');
            $('.datatable_actions').show();
		});
	} else {
		$('.select_row').each(function() {
			this.checked = false;
            $(this).parent().parent().removeClass('selected');
            $('.datatable_actions').hide();
		});
	}
}