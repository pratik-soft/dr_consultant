$(function () {
        
    var table = $('#ajaxDatatable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        // responsive: true,
        autoWidth: true,
        scrollX: true,
        ajax: {
            url: backend_url + '/inquiries/list',
            type: "POST",
            data: function (d) {
                // d.name = $('#name').val();
                // d.email = $('#email').val();
            }
        },
        order: [[ 0, "desc" ]],
        sPaginationType: "listbox",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        rowCallback: function( row, data ) {
            // console.log(data)
            if ( data.read_status == "1" ) {
                $(row).addClass('read-column');
            }
        }
    });
    
});

function readInquiryMessage(id='')
{
    $.ajax({
        url: backend_url + '/inquiries/detail/' + id,
        type: 'GET',        
        success: function(response)
        {            
            $('#inquiry-subject').text(response.subject);            
            $('#inquiry-message').text(response.message);            
    
            // Display Modal            
            $('#inquiry-message-modal').modal();            
        }
    });
    
    $('#inquiry-message-modal').on('hidden.bs.modal', function () {
        $('#ajaxDatatable').DataTable().ajax.reload();
    })
}