$(document).ready(function () {
  let rutaPDF = window.location.origin + "/admin/documentos/curriculum/";
  let url = window.location.search;

  switch (url) {
    case "?tc":
      datosTabla = "serversideTablaContacto.php";
      tipoTabla = "";
      break;
    case "?tbt":
      datosTabla = "serversideTablaBolsaTrabajo.php";
      tipoTabla = "bt";
      break;
    case "?alia":
      datosTabla = "serversideTablaAlianzas.php";
      tipoTabla = "alia";
      break;

    default:
      window.location.href = "admin-area.php";
      break;
  }

  $("#tablaContacto").DataTable({
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
    "processing": true,
    "serverSide": true,
    "sAjaxSource": "ServerSide/" + datosTabla + "",
    "columnDefs": [{
      "data": null
    }],
    "createdRow": function (row, data, index) {
      rutaFinal = rutaPDF + data[5];
      switch (tipoTabla) {
        case 'bt':
          $('td', row).eq(5).addClass('td-center');
          $('td', row).eq(5).html('<a href="' + rutaFinal + '" class="btn btn-pdf py-1 m-0" target="_blank">Ver<i class="pl-2 fas fa-file-pdf"></i></a>');
          break;
        default:
          break;
      }
    },
    // stateSave: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sSearchPlaceholder: "Filtrar",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    },
    responsive: "true",
    // dom: "Bfrtilp",
    dom: '<"top"Bf>rt<"bottom"ilp><"clear">',
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: "Exportar a Excel",
        className: "btn btn-excel",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: "Exportar a PDF",
        className: "btn btn-pdf",
      },
      {
        extend: "print",
        text: '<i class="fas fa-print"></i>',
        titleAttr: "Imprimir",
        className: "btn btn-print",
      },
    ],

  });
  $(".btn-excel").removeClass("btn-secondary buttons-excel buttons-html5")
  $(".btn-pdf").removeClass("btn-secondary buttons-pdf buttons-html5")
  $(".btn-print").removeClass("btn-secondary buttons-print")

});
