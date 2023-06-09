$(function () {
  $("#registros").DataTable({
    "responsive": true,
    "autoWidth": false,
    'language': {
      paginate: {
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Ultimo',
        first: 'Primero'
      },
      info: 'Mostrando del _START_ al _END_ de _TOTAL_ resultados',
      emptyTable: 'No hay registros disponibles',
      infoEmpty: 'Sin Registros',
      sLengthMenu: "Mostrar _MENU_ registros",
      search: 'Buscar:'
    },
    dom: '<"top"fp>rt<"bottom"ilp><"clear">',
  });
  // boton submit desabilitado
  $('#crear_registro_admin').attr('disabled', true);
  // Validar password y activar boton
  $('#repetir_password').on('input', function () {
    var password_nuevo = $('#password').val();
    if ($(this).val() == password_nuevo) {
      $('#resultado_password').text('¡Correcto!');
      $('#resultado_password').parents('.form-group').addClass('success').removeClass('invalid');
      $('input#password').parents('.form-group').addClass('success').removeClass('invalid');
      $('#crear_registro_admin').attr('disabled', false);
    } else {
      $('#resultado_password').text('¡Incorrecto!');
      $('#resultado_password').parents('.form-group').addClass('invalid').removeClass('success');
      $('input#password').parents('.form-group').addClass('invalid').removeClass('success');
      $('#crear_registro_admin').attr('disabled', true);
    }
  })
});
$(document).ready(function () {
  $('#icono').iconpicker();
  $('.iconpicker-popover').removeClass('fade');
})
$(document).on("change", 'input[type="file"]', function () {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings("label").html(fileName);
});