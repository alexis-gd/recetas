$(document).ready(function () {
  // Iniciar sesion
  $('#login-admin').on('submit', function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'si_existe') {
          // Swal.fire({
          //   icon: 'success',
          //   title: '¡Bienvenido ' + resultado.usuario + '!',
          //   text: 'Usuario autenticado',
          // })
          // setTimeout(function () {
          window.location.href = 'admin-area.php';
          // }, 2000)
        } else {
          Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Datos incorrectos',
          })
        }
      }
    })
  })
})