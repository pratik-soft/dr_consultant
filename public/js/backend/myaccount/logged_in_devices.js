$(function () {
        
    var table = $('#ajaxDatatable').DataTable({        
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        // responsive: true,
        scrollX: true,
        sPaginationType: "listbox",
    });
    
});