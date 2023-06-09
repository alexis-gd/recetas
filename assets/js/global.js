AOS.init({
  duration: 2000,
  easing: 'ease-in-out-back'
});

$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');

  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
    $('.dropdown-submenu .show').removeClass("show");
  });
  return false;
});

document.addEventListener('DOMContentLoaded', function (event) {
  const btnHoverAll = document.querySelectorAll('.btn-special');
  btnHoverAll.forEach(btnHover => {
    btnHover.onmousemove = function (event) {
      const x = event.pageX - btnHover.offsetLeft;
      const y = event.pageY - btnHover.offsetTop;
      btnHover.style.setProperty('--x', x + 'px');
      btnHover.style.setProperty('--y', y + 'px');
    }
  });
});

const navbar = document.querySelector('.navbar');
const header = document.querySelector('header');

const navegacion = (entradas, observador) => {
  entradas.forEach((entrada) => {
    if (entrada.isIntersecting) {
      navbar.classList.remove("nav-active");
    } else {
      navbar.classList.add("nav-active");
    }
  });
}

const observador = new IntersectionObserver(navegacion, {
  root: null,
  rootMargin: '0px 0px 0px 0px',
  threshold: 0.35
});

observador.observe(header);

const style = 'padding-bottom:6px;font-weight: bold; font-size: 20px;color: white; text-shadow: 2px 2px 0 #20AA99 ';
console.log('%c Develop by NodosMx.com', style);


// Crear variables por name
function variableName(name) {
  var name = document.querySelector("input[name=" + name + "]");
  return name;
}

// Crear variables select
function variableSelect(name) {
  var name = document.querySelector("select[name=" + name + "]");
  return name;
}

// Crear variables por id
function variableId(id) {
  var element = document.getElementById(id);
  return element;
}

// Marcar un input con error y desabilitar un botón
function inputWarning(element, id_btn) {
  element.classList.add("input-error");
  disabled(id_btn);
  setTimeout(() => {
    element.classList.remove("input-error");
    enabled(id_btn);
  }, 1500);
}

// Desahabilitar un elemento
function disabled(id) {
  variableId(id).disabled = true;
}

// Habilitar un elemento
function enabled(id) {
  variableId(id).disabled = false;
}

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
    title: '¡' + msj1 + '! ' + msj2
  })
}

// Spinner de carga
function printSpinner(btn) {
  variableId(btn).innerHTML = '<i class="fas fa-spinner fa-pulse fa-estilo"></i>';
}

function deleteSpinner(btn, text) {
  variableId(btn).innerHTML = text;
}
