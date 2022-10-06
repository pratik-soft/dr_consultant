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
            url: backend_url + '/permissions/list',
            type: "POST",
            data: function (d) {
                d.id = $('#ID').val();
                d.name = $('#name').val();
                d.email = $('#email').val();
            }
        },
        order: [[ 1, "desc" ]],
        sPaginationType: "listbox",
        columns: [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},            
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
});