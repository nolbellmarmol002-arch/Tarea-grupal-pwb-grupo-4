// Validación del formulario de comentarios (sin depender de ningún servicio externo).
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('form-comentario');
  if (!form) return;

  var nombre = document.getElementById('nombre');
  var comentario = document.getElementById('comentario');
  var letras = document.getElementById('letras');

  // Marca un campo como válido o inválido; devuelve true si es válido.
  function revisar(campo) {
    var ok = campo.value.trim() !== '';
    campo.classList.toggle('is-invalid', !ok);
    return ok;
  }

  form.addEventListener('submit', function (e) {
    var okNombre = revisar(nombre);
    var okComentario = revisar(comentario);
    if (!okNombre || !okComentario) {
      e.preventDefault();
      (okNombre ? comentario : nombre).focus();
    }
  });

  [nombre, comentario].forEach(function (campo) {
    campo.addEventListener('input', function () {
      if (campo.classList.contains('is-invalid')) revisar(campo);
    });
  });

  // Contador de caracteres del comentario.
  comentario.addEventListener('input', function () {
    letras.textContent = comentario.value.length;
  });
});
