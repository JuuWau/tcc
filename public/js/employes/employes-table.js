$(document).ready(function () {
    $('#employes_table').dataTable({
        "searching": false,
        "bLengthChange": true,
        "language": {
            "aria": {
                "sortAscending": ": Ordenar em ordem crescente",
                "sortDescending": ": Ordenar em ordem descrecente"
            },
            "emptyTable": "Nenhum resultado encontrado",
            "info": "",
            "infoEmpty": "Nenhum resultado encontrado",
            "infoFiltered": "(Filtrando de _MAX_ registros)",
            "lengthMenu": "_MENU_ por página",
            "search": "Busca:",
            "zeroRecords": "Nenhum resultado encontrado"
        },

        buttons: [
        ],

        responsive: {
            details: {

            }
        },
        "bPaginate": true,
        "order": [
            [0, 'desc']
        ],
        "pageLength": 10,

        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
    });

    $('#btnNewEmployee').on('click', function () {
        $.ajax({
            url: '/employes/create',
            type: 'GET',
            success: function (html) {
                $('#employes_form_container').html(html);
                $('#employeModal').modal('show');
            },
            error: function (xhr, status, error) {
                alert('Erro ao carregar o formulário: ' + error);
            }
        });
    });
});