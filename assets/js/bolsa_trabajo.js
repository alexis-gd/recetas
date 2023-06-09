document.getElementById('submit_bt').addEventListener('click', function (event) {
  event.preventDefault();
  printSpinner('submit_bt');
  disabled('submit_bt');

  if (variableName("nombre_bt").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu nombre y apellidos.")
    inputWarning(variableName("nombre_bt"), "submit_bt");
    setTimeout(() => { variableName("nombre_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("nombre_bt").value.length > 50) {
    alertNotify("2500", "warning", "Ups", "Nombre demaciado largo (Máx. 50 caracteres).")
    inputWarning(variableName("nombre_bt"), "submit_bt");
    setTimeout(() => { variableName("nombre_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("telefono_bt").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu número de teléfono.")
    inputWarning(variableName("telefono_bt"), "submit_bt");
    setTimeout(() => { variableName("telefono_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (isNaN(variableName("telefono_bt").value)) {
    alertNotify("2500", "warning", "Ups", "Escribe solo números porfavor.")
    inputWarning(variableName("telefono_bt"), "submit_bt");
    setTimeout(() => { variableName("telefono_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("telefono_bt").value.length != 10) {
    alertNotify("2500", "warning", "Ups", "Escribe un número válido (10 caracteres).")
    inputWarning(variableName("telefono_bt"), "submit_bt");
    setTimeout(() => { variableName("telefono_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("correo_bt").value == 0) {
    alertNotify("2500", "info", "Espera", "Escribe tu correo electrónico.")
    inputWarning(variableName("correo_bt"), "submit_bt");
    setTimeout(() => { variableName("correo_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("correo_bt").value.indexOf('@', 0) == -1 || variableName("correo_bt").value.indexOf('.', 0) == -1) {
    alertNotify("2500", "warning", "Ups", "Escribe un correo válido.")
    inputWarning(variableName("correo_bt"), "submit_bt");
    setTimeout(() => { variableName("correo_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("puesto_bt").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe el puesto solicitado.")
    inputWarning(variableName("puesto_bt"), "submit_bt");
    setTimeout(() => { variableName("puesto_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("puesto_bt").value.length > 50) {
    alertNotify("2500", "warning", "Ups", "Nombre demaciado largo (Máx. 50 caracteres).")
    inputWarning(variableName("puesto_bt"), "submit_bt");
    setTimeout(() => { variableName("puesto_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }
  if (variableName("curriculum_bt").value == "") {
    alertNotify("2500", "info", "Espera", "Por favor adjunta un archivo")
    variableName("curriculum_bt").nextElementSibling.classList.add("input-error");
    disabled("submit_bt");
    setTimeout(() => { variableName("curriculum_bt").nextElementSibling.classList.remove("input-error"); enabled("submit_bt"); }, 1500);
    setTimeout(() => { variableName("curriculum_bt").focus() }, 1500);
    deleteSpinner('submit_bt', 'Enviar Solicitud');
    return false;
  }

  const data = new FormData(document.getElementById('form_bt'));
  data.append('opcion', 'bolsa_trabajo');

  fetch('functions/insert_general.php', {
    method: 'POST',
    body: data
  })
    .then(res => res.json())
    .then(data => {
      if (data == 1) {
        alertNotify("5000", "success", "Excelente", "En breve nos pondremos en contacto contigo.");
        document.getElementById('form_bt').reset();
        variableId('submit_bt').disabled = true;
        variableId('submit_bt').innerHTML = "✔";
      } else if (data == 99) {
        alertNotify("5000", "info", "Hey", "En breve te contactamos, gracias por la espera");
        document.getElementById('form_bt').reset();
      } else {
        alertNotify("5000", "warning", "Ups", "Al parecer algo salio mal, intenta mas tarde.");
        document.getElementById('form_bt').reset();
      }
    })
});

// Subir título
//validar Imagen tamaño y extension
$(document).on("change", "#curriculum", function () {
  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;
  var fileName = $(this).val().split("\\").pop();

  // si el peso excede 1MB
  if (fileSize > 1048576) {
    var peso = parseInt(fileSize / 1024 / 1024);
    var conDecimal = peso.toFixed(1);
    Swal.fire({
      title: '<span class="text-left">El archivo supera el tamaño máximo (1MB).</span>',
      icon: 'error',
      html: '<li class="text-justify pb-1 pt-2">El tamaño de tu archivo es: <b>' + conDecimal + 'MB+</b></li>' +
        '<li class="text-left pb-1">Te sugerimos este link para disminuir el tamaño de tu archivo:</li>' +
        '<li class="text-justify pb-1"><a target="_blank" href="https://www.ilovepdf.com/es/comprimir_pdf">https://www.ilovepdf.com/es/comprimir_pdf</a> </li>',
      focusConfirm: true,
      confirmButtonText: 'Aceptar'
    })
    this.value = ""; // reset del valor
    this.nextElementSibling.innerText = "Error";
    this.nextElementSibling.classList.remove("input-success");
    this.nextElementSibling.classList.add("input-error");
  } else {
    // recuperamos la extensión del archivo
    var ext = fileName.split(".").pop();
    ext = ext.toLowerCase();

    switch (ext) {
      case "pdf":
        this.nextElementSibling.innerText = fileName;
        this.nextElementSibling.classList.remove("input-error");
        this.nextElementSibling.classList.add("input-success");
        break;
      default:
        Swal.fire({
          title: '<span class="text-left">El archivo no es formato (pdf).</span>',
          icon: 'error',
          html: '<li class="text-justify pb-1 pt-2">es un: <b>.' + ext + '</b></li>',
          focusConfirm: true,
          confirmButtonText: 'Aceptar'
        })
        this.value = ""; // reset del valor
        this.nextElementSibling.innerText = "Error";
        this.nextElementSibling.classList.remove("input-success");
        this.nextElementSibling.classList.add("input-error");
    }
  }
});