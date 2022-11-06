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
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},            
            {data: 'last_name', name: 'last_name'},            
            {data: 'email', name: 'email'},            
            {data: 'phone', name: 'phone'},            
            {data: 'symptoms_form', name: 'symptoms_form', orderable: false, searchable: false},
            {data: 'assessment_form', name: 'assessment_form', orderable: false, searchable: false},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    
});