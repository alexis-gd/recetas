// Ejecuciones
editarOnClickSetModal("btn_modal_es1_2", "titulo", "modal_id_servicio_editar", "servicio_general_editar");
// validarStatusSelect("btn_modal_es1_2", "titulo", "modal_es1_2", "box_servicio_general");
actualizarServicio("form_edit_mc_editar", "update_servicio_general", "modal_es1_2");
borrarServicio("borrar_sg", "servicio_general", "modal_id_servicio_editar");

editarOnClickSetModal("btn_modal_es2_2", "servicio", "modal_id_servicio_editar2", "servicio_editar");
// validarStatusSelect("btn_modal_es2_2", "servicio", "modal_es2_2", "box_servicio_general2");
actualizarServicio("form_edit_mc_editar2", "update_servicio", "modal_es2_2");
borrarServicio("borrar_s", "servicio", "modal_id_servicio_editar2");

editarOnClickSetModal("btn_modal_es3_2", "subservicio", "modal_id_servicio_editar3", "subservicio_editar");
// validarStatusSelect("btn_modal_es3_2", "subservicio", "modal_es3_2", "box_servicio_general3");
actualizarServicio("form_edit_mc_editar3", "update_subservicio", "modal_es3_2");
borrarServicio("borrar_ss", "subservicio", "modal_id_servicio_editar3");

editarOnClickSetModal("btn_modal_es4_2", "op_subservicio", "modal_id_servicio_editar4", "op_subservicio_editar");
// validarStatusSelect("btn_modal_es4_2", "op_subservicio", "modal_es4_2", "box_servicio_general4");
actualizarServicio("form_edit_mc_editar4", "update_opsubservicio", "modal_es4_2");
borrarServicio("borrar_oss", "op_subservicio", "modal_id_servicio_editar4");

borrarServicio("borrar_icono", "icono", "id_icono");

// Función setear el modal con valores para agregar nuevo elemento
$(document).on('click', '#btn_modal_add1', function () {
  let id_servicio = $("#id_servicio").val(); // servicio principal
  $("#modal_id_servicio1").val(id_servicio);
});

document.getElementById('form_edit_mc').addEventListener('submit', function (event) {
  event.preventDefault();
  var datos = new FormData(this);
  datos.append('opcion', 'nuevo_servicio_general');
  fetch('funciones/modelo-editar-servicio-general.php', {
    method: 'POST',
    body: datos
  }).then(res => res.json())
    .then(data => {
      if (data == 1) {
        location.reload();
      } else {
        $('#modal_add1').modal('hide');
      }
    })
});

$(document).on('click', '#btn_modal_add2', function () {
  let id_servicio = $("#id_servicio").val(); // servicio principal
  let titulo = $("#titulo").val(); // servicio general
  $("#modal_id_servicio2").val(id_servicio);
  $("#modal_id_servicio_general2").val(titulo);
});

document.getElementById('form_edit_mc2').addEventListener('submit', function (event) {
  event.preventDefault();
  var datos = new FormData(this);
  datos.append('opcion', 'nuevo_servicio');
  fetch('funciones/modelo-editar-servicio-general.php', {
    method: 'POST',
    body: datos
  }).then(res => res.json())
    .then(data => {
      if (data == 1) {
        // alertNotify("1500", "success", "¡Listo!", "Servicio agregado.");
        location.reload();
      } else {
        $('#modal_add2').modal('hide');
      }
    })
});

$(document).on('click', '#btn_modal_add3', function () {
  let id_servicio = $("#id_servicio").val(); // servicio principal
  let titulo = $("#titulo").val(); // servicio general
  let servicio = $("#servicio").val(); // servicio
  $("#modal_id_servicio3").val(id_servicio);
  $("#modal_id_servicio_general3").val(titulo);
  $("#modal_id_subservicio3").val(servicio);
});

document.getElementById('form_edit_mc3').addEventListener('submit', function (event) {
  event.preventDefault();
  var datos = new FormData(this);
  datos.append('opcion', 'nuevo_subservicio');
  fetch('funciones/modelo-editar-servicio-general.php', {
    method: 'POST',
    body: datos
  }).then(res => res.json())
    .then(data => {
      if (data == 1) {
        // alertNotify("1500", "success", "¡Listo!", "Servicio agregado.");
        location.reload();
      } else {
        $('#modal_add3').modal('hide');
      }
    })
});

$(document).on('click', '#btn_modal_add4', function () {
  let id_servicio = $("#id_servicio").val(); // servicio principal
  let titulo = $("#titulo").val(); // servicio general
  let subservicio = $("#subservicio").val(); // opcion de subservicio
  $("#modal_id_servicio4").val(id_servicio);
  $("#modal_id_servicio_general4").val(titulo);
  $("#modal_id_subservicio4").val(subservicio);
});

document.getElementById('form_edit_mc4').addEventListener('submit', function (event) {
  event.preventDefault();
  var datos = new FormData(this);
  datos.append('opcion', 'nuevo_op_subservicio');
  fetch('funciones/modelo-editar-servicio-general.php', {
    method: 'POST',
    body: datos
  }).then(res => res.json())
    .then(data => {
      if (data == 1) {
        // alertNotify("1500", "success", "¡Listo!", "Servicio agregado.");
        location.reload();
      } else {
        $('#modal_add4').modal('hide');
      }
    })
});

// Función setear el modal con valores para editar
function editarOnClickSetModal(id_boton_edit, id_select, id_hidden_modal, id_value_modal) {
  $(document).on('click', '#' + id_boton_edit + '', function () {
    let titulo = document.getElementById(id_select);
    let titulo_txt = document.getElementById(id_select).options[titulo.selectedIndex].text;
    document.getElementById(id_hidden_modal).value = titulo.value;
    document.getElementById(id_value_modal).value = titulo_txt;
  });
}

// Función validar los cambios en el select
function validarStatusSelect(id_btn_editar, id_select, id_modal_target, id_box_botones) {
  let flag = 0;
  document.getElementById(id_select).addEventListener('change', function (event) {
    let titulo = this.value;
    if (titulo != "" && flag == 0) {
      flag++;
      let boton = '<button type="button" class="btn btn-success ml-2 p-1" id="' + id_btn_editar + '" data-toggle="modal" data-target="#' + id_modal_target + '">Editar</button>';
      document.getElementById(id_box_botones).innerHTML += boton;
    } else if (titulo !== "" && flag == 1) {
    } else {
      flag--;
      document.getElementById(id_btn_editar).remove();
    }
  });
}

// Función actualizar los servicios
function actualizarServicio(id_formulario, opcion, id_modal) {
  document.getElementById(id_formulario).addEventListener('submit', function (event) {
    event.preventDefault();
    var datos = new FormData(this);
    datos.append('opcion', opcion);
    fetch('funciones/modelo-editar-servicio-general.php', {
      method: 'POST',
      body: datos
    }).then(res => res.json())
      .then(data => {
        if (data == 1) {
          $('#' + id_modal + '').modal('hide');
          alertNotify("2500", "success", "¡Servicio actualizado!", "Refrescando página.");
          // setTimeout(() => { location.reload(); }, 2500);
        } else {
          $('#' + id_modal + '').modal('hide');
          alertNotify("5000", "error", "Ups!", "Al parecer algo salio mal contacta a soporte ERROR: 404 BORR REQ");
          setTimeout(() => { location.reload(); }, 5000);
        }
      })
  });
}

// Función borrar los servicios
function borrarServicio(id_btn_borrar, opcion, id_borrar) {
  document.getElementById(id_btn_borrar).addEventListener('click', function (event) {
    var datos = new FormData();
    datos.append('opcion', opcion);
    datos.append('id_borrar', document.getElementById(id_borrar).value);

    Swal.fire({
      title: '¿Estás seguro?',
      text: "Se eliminará para siempre el registro",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2A4686',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, Eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        fetch('funciones/modelo-borrar.php', {
          method: 'POST',
          body: datos
        }).then(res => res.json())
          .then(data => {
            if (data == 1) {
              location.reload();
            } else {
              location.reload();
            }
          })
      } else if (result.isDismissed) {
        Swal.fire('¡Has cancelado correctamente!', 'Uff casi lo perdemos', 'info')
      }
    })
  });
}

document.getElementById('titulo').addEventListener('change', function (event) {
  document.getElementById("id_icono").value = this.value;
  var datos = new FormData();
  datos.append('opcion', "getIconoServicio");
  datos.append('id_servicio', document.getElementById("id_icono").value);
  fetch('funciones/modelo-select-servicio-general.php', {
    method: 'POST',
    body: datos
  }).then(res => res.json())
    .then(data => {
      if (data[0] == 1) {
        if (data[1] == "") {
          document.getElementById("img_icono").src = "img/default.svg";
          // disabled("guardar_icono");
          disabled("borrar_icono");
        } else {
          enabled("guardar_icono");
          enabled("borrar_icono");
          document.getElementById("img_icono").src = "img/seccion_servicios/iconos/" + data[1];
        }
      } else {
        console.log(data)
      }
    })
});

// Funciones para las acciones de los select
document.getElementById("titulo").addEventListener("change", function (event) {
  let select = document.getElementById("servicio");
  let nextSelect = document.getElementById("subservicio");
  let nextSelect2 = document.getElementById("op_subservicio");

  if (this.value != "") {
    enabled("guardar_icono");
    enabled("btn_modal_add2");
    enabled("btn_modal_es1_2");
    var datos = new FormData();
    datos.append('opcion', 'selectServicio');
    datos.append('id_servicio', document.getElementById('id_servicio').value); // servicio principal
    datos.append('titulo', this.value); // titulo

    fetch('funciones/modelo-select-servicio-general.php', {
      method: 'POST',
      body: datos
    }).then(res => res.json())
      .then(data => {
        if (data[0] == 1) {
          select.innerHTML = data[1];
          select.disabled = false;

        } else {
          alertNotify("5000", "warning", "Ups!", "Sin datos por el momento");
          select.selectedIndex = 0;
          nextSelect.selectedIndex = 0;
          nextSelect2.selectedIndex = 0;
          disabled("servicio");
          disabled("subservicio");
          disabled("op_subservicio");
          enabled("btn_modal_add2");
          disabled("btn_modal_add3");
          disabled("btn_modal_add4");
          disabled("btn_modal_es2_2");
          disabled("btn_modal_es3_2");
          disabled("btn_modal_es4_2");
        }
      })

  } else {

    select.selectedIndex = 0;
    nextSelect.selectedIndex = 0;
    nextSelect2.selectedIndex = 0;
    disabled("servicio");
    disabled("subservicio");
    disabled("op_subservicio");
    disabled("btn_modal_add2");
    disabled("btn_modal_add3");
    disabled("btn_modal_add4");
    disabled("btn_modal_es1_2");
    disabled("btn_modal_es2_2");
    disabled("btn_modal_es3_2");
    disabled("btn_modal_es4_2");
    disabled("guardar_icono");

  }
});
document.getElementById("servicio").addEventListener("change", function (event) {
  let select = document.getElementById("subservicio");
  let nextSelect2 = document.getElementById("op_subservicio");

  if (this.value != "") {

    enabled("btn_modal_add3");
    enabled("btn_modal_es2_2");
    var datos = new FormData();
    datos.append('opcion', 'selectSubServicio');
    datos.append('id_servicio', document.getElementById('id_servicio').value); // servicio principal
    datos.append('titulo', document.getElementById('titulo').value); // titulo
    datos.append('servicio', document.getElementById('servicio').value); // servicio

    fetch('funciones/modelo-select-servicio-general.php', {
      method: 'POST',
      body: datos
    }).then(res => res.json())
      .then(data => {
        if (data[0] == 1) {
          select.innerHTML = data[1];
          select.disabled = false;
        } else {
          alertNotify("5000", "warning", "Ups!", "Sin datos por el momento");
          select.selectedIndex = 0;
          nextSelect2.selectedIndex = 0;
          select.disabled = true;
          nextSelect2.disabled = true;
          disabled("btn_modal_add4");
          disabled("btn_modal_es3_2");
          disabled("btn_modal_es4_2");

        }
      })

  } else {

    select.selectedIndex = 0;
    nextSelect2.selectedIndex = 0;
    select.disabled = true;
    nextSelect2.disabled = true;
    disabled("btn_modal_es2_2");
    disabled("btn_modal_add3");
    disabled("btn_modal_add4");
    disabled("btn_modal_es3_2");
    disabled("btn_modal_es4_2");

  }
});
document.getElementById("subservicio").addEventListener("change", function (event) {
  let select = document.getElementById("op_subservicio");

  if (this.value != "") {

    enabled("btn_modal_add4");
    enabled("btn_modal_es3_2");
    var datos = new FormData();
    datos.append('opcion', 'selectOpSubServicio');
    datos.append('id_servicio', document.getElementById('id_servicio').value); // servicio principal
    datos.append('titulo', document.getElementById('titulo').value); // titulo
    datos.append('subservicio', document.getElementById('subservicio').value); // subservicio

    fetch('funciones/modelo-select-servicio-general.php', {
      method: 'POST',
      body: datos
    }).then(res => res.json())
      .then(data => {
        if (data[0] == 1) {
          select.innerHTML = data[1];
          select.disabled = false;
        } else {
          alertNotify("5000", "warning", "Ups!", "Sin datos por el momento");
          select.selectedIndex = 0;
          select.disabled = true;
          disabled("btn_modal_es4_2");
        }
      })

  } else {

    select.selectedIndex = 0;
    select.disabled = true;
    disabled("btn_modal_add4");
    disabled("btn_modal_es3_2");
    disabled("btn_modal_es4_2");
  }
});
document.getElementById("op_subservicio").addEventListener("change", function (event) {
  if (this.value != "") {
    enabled("btn_modal_es4_2");
  } else {
    disabled("btn_modal_es4_2");
  }
});