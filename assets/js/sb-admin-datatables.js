var table;

// Call the dataTables jQuery plugin
$(document).ready(function () {
    table = $('#dataTable').DataTable({
        "lengthChange": true,
        dom: 'Brtp',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        responsive: false,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        language: {
            info: "Página _PAGE_ de _PAGES_",
            paginate: {
                previous: "Anterior",
                next: "Próximo",
            },
            emptyTable: "Não existe registro.",
            infoEmpty: "Não existe registro.",
            sInfoEmpty: "Página 0 de 0 possui 0 registros",
            infoFiltered: " - maxímo de _MAX_ registros",
            lengthMenu: "Exibir _MENU_ registros",
            "search": "Buscar:"
        },
        searching: true,
        columnDefs: [
            {responsivePriority: 1, targets: 0},
            {responsivePriority: 2, targets: -1}
        ]
    });    
    
});
    $('#search').on('keyup', function () {
        table.search(this.value).draw();
    });

