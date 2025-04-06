import $ from "jquery";

export function inicializarContadores() {
  const contadores = document.querySelectorAll('.customContador');
  let contadoresIniciados = new Set();

  verificarContadoresVisibles();

  window.addEventListener('scroll', verificarContadoresVisibles);

  function verificarContadoresVisibles() {
    contadores.forEach(contador => {
      if (!contadoresIniciados.has(contador) && estaEnViewport(contador)) {
        iniciarContador($(contador));
        contadoresIniciados.add(contador);
      }
    });

    if (contadoresIniciados.size === contadores.length) {
      window.removeEventListener('scroll', verificarContadoresVisibles);
    }
  }

  function formatearNumero(numero) {
    return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function iniciarContador($elemento) {
    const valorOriginal = $elemento.text().trim();

    const soloDigitos = valorOriginal.replace(/[^\d]/g, '');
    const valorFinal = parseInt(soloDigitos);

    if (isNaN(valorFinal) || valorFinal === 0) {
      return;
    }

    const $unidad = $elemento.find('span');
    let unidadHTML = '';
    if ($unidad.length) {
      unidadHTML = $unidad[0].outerHTML;
    }

    $elemento.html("0 " + unidadHTML);

    const duracion = 2000;
    const pasos = duracion / 30;
    const incrementoPorPaso = valorFinal / pasos;
    let valorActual = 0;

    const intervalo = setInterval(function () {
      valorActual += incrementoPorPaso;

      if (valorActual >= valorFinal) {
        $elemento.html(formatearNumero(valorFinal) + " " + unidadHTML);
        clearInterval(intervalo);
      } else {
        $elemento.html(formatearNumero(Math.floor(valorActual)) + " " + unidadHTML);
      }
    }, 30);
  }

  function estaEnViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
}

$(document).ready(function () {
  inicializarContadores();
});
