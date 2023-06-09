// crear admin
$(document).ready(function () {
  $('#guardar-registro').on('submit', function (e) {
    e.preventDefault();
    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Correcto',
            text: 'Se guardó correctamente',
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El usuario ya existe',
          })
        }
      }
    })
  })

  // crear invitado con imagen o archivo
  $('#guardar-registro-archivo').on('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(this);

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          Swal.fire({
            icon: 'success',
            title: 'Correcto',
            text: 'Se guardó correctamente',
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El usuario ya existe',
          })
        }
      }
    })
  })

  // Eliminar un admin
  $('.borrar_registro').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');

    Swal.fire({
      title: 'Estás seguro?',
      text: "Un registro eliminado no se puede recuperar!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {

      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          data: {
            'id': id,
            'registro': 'eliminar'
          },
          url: 'funciones/modelo-' + tipo + '.php',
          success: function (data) {
            var resultado = JSON.parse(data);
            if (resultado.respuesta == 'exito') {
              Swal.fire(
                'Eliminado!',
                'Registro Eliminado.',
                'success'
              )
              jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo eliminar!',
              })
            }
          }
        })
        // Swal.fire('Eliminado!', 'Registro Eliminado.', 'success')        
      } else if (result.isDismissed) {
        Swal.fire('Cancelado!', 'No se han guardado los cambios', 'info')
      }
    })
  })
})

// Mostrar Alerta
function alertNotify(timer, type, msj1, msj2) {
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: timer,
    timerProgressBar: true
  })
  Toast.fire({
    icon: type,
    title: msj1 + ' ' + msj2
  })
}

// Crear variables por id
function variableId(id) {
  var element = document.getElementById(id);
  return element;
}

// Desahabilitar un elemento
function disabled(id) {
  variableId(id).disabled = true;
}

// Habilitar un elemento
function enabled(id) {
  variableId(id).disabled = false;
}