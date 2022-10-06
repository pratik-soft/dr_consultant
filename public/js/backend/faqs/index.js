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
           url: backend_url + '/faqs/list',
           type: "POST",
           data: function (d) {
               d.question = $('#question').val();
               d.answer = $('#answer').val();
           }
       },        
        sPaginationType: "listbox",
        order: [[ 0, "desc" ]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'question', name: 'question'},            
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