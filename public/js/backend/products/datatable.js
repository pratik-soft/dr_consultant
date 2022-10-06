$(function () {
    $("#simpleDatatable").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable_buttons');    
});