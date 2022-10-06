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
            url: backend_url + '/services/list',
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
            {data: 'name', name: 'name'},
            {data: 'category.name', name: 'category.name'},
            {data: 'tags', name: 'tags', orderable: false, searchable: true},
            {data: 'status', name: 'status'},
            {data: 'featured', name: 'featured'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    
});