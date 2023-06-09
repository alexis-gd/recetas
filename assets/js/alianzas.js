document.getElementById('submit_alianzas').addEventListener('click', function (event) {
  event.preventDefault();
  printSpinner('submit_alianzas');
  disabled('submit_alianzas');

  if (variableName("empresa_alianzas").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe el nombre de tu empresa.")
    inputWarning(variableName("empresa_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("empresa_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("empresa_alianzas").value.length > 50) {
    alertNotify("2500", "warning", "Ups", "Nombre demaciado largo (Máx. 50 caracteres).")
    inputWarning(variableName("empresa_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("empresa_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("nombre_alianzas").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu nombre y apellidos.")
    inputWarning(variableName("nombre_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("nombre_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("nombre_alianzas").value.length > 50) {
    alertNotify("2500", "warning", "Ups", "Nombre demaciado largo (Máx. 50 caracteres).")
    inputWarning(variableName("nombre_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("nombre_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("telefono_alianzas").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu número de teléfono.")
    inputWarning(variableName("telefono_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("telefono_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (isNaN(variableName("telefono_alianzas").value)) {
    alertNotify("2500", "warning", "Ups", "Escribe solo números porfavor.")
    inputWarning(variableName("telefono_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("telefono_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("telefono_alianzas").value.length != 10) {
    alertNotify("2500", "warning", "Ups", "Escribe un número válido (10 caracteres).")
    inputWarning(variableName("telefono_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("telefono_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("correo_alianzas").value == 0) {
    alertNotify("2500", "info", "Espera", "Escribe tu correo electrónico.")
    inputWarning(variableName("correo_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("correo_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }
  if (variableName("correo_alianzas").value.indexOf('@', 0) == -1 || variableName("correo_alianzas").value.indexOf('.', 0) == -1) {
    alertNotify("2500", "warning", "Ups", "Escribe un correo válido.")
    inputWarning(variableName("correo_alianzas"), "submit_alianzas");
    setTimeout(() => { variableName("correo_alianzas").focus() }, 1500);
    deleteSpinner('submit_alianzas', 'Enviar');
    return false;
  }

  const data = new FormData(document.getElementById('form_alianzas'));
  data.append('opcion', 'alianzas');

  fetch('functions/insert_general.php', {
    method: 'POST',
    body: data
  })
    .then(res => res.json())
    .then(data => {
      if (data == 1) {
        alertNotify("5000", "success", "Excelente", "En breve nos pondremos en contacto contigo.");
        document.getElementById('form_alianzas').reset();
        variableId('submit_alianzas').disabled = true;
        variableId('submit_alianzas').innerHTML = "✔";
      } else if (data == 99) {
        alertNotify("5000", "info", "Hey", "En breve te contactamos, gracias por la espera");
        document.getElementById('form_alianzas').reset();
      } else {
        alertNotify("5000", "warning", "Ups", "Al parecer algo salio mal, intenta mas tarde.");
        document.getElementById('form_alianzas').reset();
      }
    })
});

var flkty = new Flickity('.carousel', {
  cellAlign: 'left',
  contain: true,
  draggable: true,
  wrapAround: true,
  autoPlay: true,
  lazyLoad: 6,
  percentPosition: false
});