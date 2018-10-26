$(document).ready(function () {
    $('#historico').DataTable(
        {
            dom:
                "<'row'<'col-sm-2'l><'col-sm-7 text-center'><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-3'i><'col-sm-6 text-center'B><'col-sm-3'p>>",
            buttons: [
                {
                    extend: 'print',
                    text: 'Imprimir',
                    className: 'btn btn-info',
                }
            ],
            "title": "eletroPonto",
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "order": [[ 1, "desc" ]],
            "iDisplayLength": 10,
            "bJQueryUI": true,
            "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando _START_ até _END_, de _TOTAL_ registros.",
                "sInfoEmpty":    "Mostrando de 0 até 0",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
            }
        }
    );
});


function checkAll(bx) {
    var cbs = document.getElementsByTagName('input');
    for (var i = 0; i < cbs.length; i++) {
        if (cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
        }
    }
}