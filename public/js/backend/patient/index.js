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
            url: backend_url + '/patient/list',
            type: "POST",
            data: function (d) {
                d.first_name = $('#first_name').val();
            }
        },        
        sPaginationType: "listbox",
        order: [[ 0, "desc" ]],
        columns: [
            {data: 'patient_id', name: 'patient_id'},
            {data: 'first_name', name: 'first_name'},            
            {data: 'last_name', name: 'last_name'},            
            {data: 'contact_number', name: 'contact_number'},            
            {data: 'email', name: 'email'},            
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    
});