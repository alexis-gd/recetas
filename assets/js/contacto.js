document.getElementById('submit_contacto').addEventListener('click', function (event) {
  event.preventDefault();
  printSpinner('submit_contacto');
  disabled('submit_contacto');

  if (variableName("nombre_contacto").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu nombre y apellidos.")
    inputWarning(variableName("nombre_contacto"), "submit_contacto");
    setTimeout(() => { variableName("nombre_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableName("nombre_contacto").value.length > 50) {
    alertNotify("2500", "warning", "Ups", "Nombre demaciado largo (Máx. 50 caracteres).")
    inputWarning(variableName("nombre_contacto"), "submit_contacto");
    setTimeout(() => { variableName("nombre_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableName("telefono_contacto").value == "") {
    alertNotify("2500", "info", "Espera", "Escribe tu número de teléfono.")
    inputWarning(variableName("telefono_contacto"), "submit_contacto");
    setTimeout(() => { variableName("telefono_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (isNaN(variableName("telefono_contacto").value)) {
    alertNotify("2500", "warning", "Ups", "Escribe solo números porfavor.")
    inputWarning(variableName("telefono_contacto"), "submit_contacto");
    setTimeout(() => { variableName("telefono_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableName("telefono_contacto").value.length != 10) {
    alertNotify("2500", "warning", "Ups", "Escribe un número válido (10 caracteres).")
    inputWarning(variableName("telefono_contacto"), "submit_contacto");
    setTimeout(() => { variableName("telefono_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableName("correo_contacto").value == 0) {
    alertNotify("2500", "info", "Espera", "Escribe tu correo electrónico.")
    inputWarning(variableName("correo_contacto"), "submit_contacto");
    setTimeout(() => { variableName("correo_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableName("correo_contacto").value.indexOf('@', 0) == -1 || variableName("correo_contacto").value.indexOf('.', 0) == -1) {
    alertNotify("2500", "warning", "Ups", "Escribe un correo válido.")
    inputWarning(variableName("correo_contacto"), "submit_contacto");
    setTimeout(() => { variableName("correo_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }
  if (variableSelect("servicio_contacto").value == 0) {
    alertNotify("2500", "warning", "Ups", "Selecciona un servicio")
    inputWarning(variableSelect("servicio_contacto"), "submit_contacto");
    setTimeout(() => { variableSelect("servicio_contacto").focus() }, 1500);
    deleteSpinner('submit_contacto', 'Solicitar Consulta');
    return false;
  }

  const data = new FormData(document.getElementById('form_contacto'));
  data.append('opcion', 'contacto');

  fetch('functions/insert_general.php', {
    method: 'POST',
    body: data
  })
    .then(res => res.json())
    .then(data => {
      if (data == 1) {
        alertNotify("5000", "success", "Excelente", "En breve nos pondremos en contacto contigo.");
        document.getElementById('form_contacto').reset();
        variableId('submit_contacto').disabled = true;
        variableId('submit_contacto').innerHTML = "✔";
      } else if (data == 99) {
        alertNotify("5000", "info", "Hey", "En breve te contactamos, gracias por la espera");
        document.getElementById('form_contacto').reset();
      } else if (data == 98) {
        alertNotify("5000", "warning", "Ups", "Al parecer algo salio mal, en breve te contactamos.");
        document.getElementById('form_contacto').reset();
      } else {
        alertNotify("5000", "warning", "Ups", "Al parecer algo salio mal, intenta mas tarde.");
        document.getElementById('form_contacto').reset();
      }
    })
});