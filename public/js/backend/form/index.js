$(function () {
        
    var oTable = $('#ajaxDatatable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,        
        // responsive: true,
        autoWidth: true,
        // scrollX: true,        
        // fixedHeader: true,
        // scrollY:        300,
        // scrollX:        true,
        // scrollCollapse: true,
        // paging:         false,
        // fixedColumns:   true,
        ajax: {
            url: backend_url + '/users/list',
            type: "POST",
            data: function (d) {
                d.id = $('#ID').val();
                d.name = $('#name').val();
                d.email = $('#email').val();                
                d.roles = $('#roles').val();                
                d.status = $('#status').val();                
                d.created_at = $('#created_at').val();
                d.updated_at = $('#updated_at').val();
            }
        },
        sPaginationType: "listbox",
        order: [[ 1, "desc" ]],
        columns: [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'avatar', name: 'avatar', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'roles', name: 'roles', orderable: false, searchable: false},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".select_all_rows").prop("checked", false);
            select_deselect_rows(false);
        },
        initComplete: function (settings, json) {  
            $("#ajaxDatatable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    //custom filter
    $('#searchForm').on('submit', function(e) {        
        oTable.draw();
        e.preventDefault();
    });        

    $('#roles').select2({
        placeholder: "--Select Roles--",
        allowClear: true
    });
});