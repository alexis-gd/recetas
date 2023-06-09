var flkty = new Flickity('.carousel', {
  cellAlign: 'left',
  contain: true,
  draggable: true,
  wrapAround: true,
  autoPlay: true,
  lazyLoad: 6,
  percentPosition: false
});

// const divMeta = document.getElementById('Meta');
// const counters = document.querySelectorAll('.metas-numero');
// const speed = 350;

// const cargarImagen = (entradas, observador) => {
//   entradas.forEach((entrada) => {
//     if (entrada.isIntersecting) {
//       counters.forEach(counter => {
//         const animacion = () => {
//           const value = +counter.getAttribute('unidad');
//           const data = +counter.innerText;
//           const time = value / speed;
//           if (data < value) {
//             counter.innerText = Math.ceil(data + time);
//             setTimeout(animacion, 1);
//           } else {
//             counter.innerText = value;
//           }
//         }
//         animacion();
//       });
//     } else {
//       counters.forEach(counter => {
//         counter.innerText = 0;
//       });
//     }
//   });
// }

// const observador2 = new IntersectionObserver(cargarImagen, {
//   root: null,
//   rootMargin: '150px 0px 0px 0px',
//   threshold: 0.38
// });

// observador2.observe(divMeta);

