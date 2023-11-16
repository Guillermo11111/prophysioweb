/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************!*\
  !*** ./public/js/blog.js ***!
  \***************************/
var opcionCambiada = function opcionCambiada() {
  if ($etiquetas.value === 'all') {
    verBlogs();
  } else {
    verBlogsEtiqueta($etiquetas.value);
  }
};
var $etiquetas = document.getElementById('etiquetasLista');
$etiquetas.addEventListener("change", opcionCambiada);
var link = 'http://127.0.0.1:8000/';
var link2 = 'https://prophysio.tagme.uno/public/';
function verBlogs() {
  document.getElementById('circulo').classList.remove('hide');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#blogs").empty();
  $.ajax({
    url: link + "api/blogsApi",
    //url: link2 "api/blogsApi",
    type: "POST",
    success: function success(result) {
      var resultado = JSON.parse(result);
      document.getElementById('circulo').classList.add('hide');
      resultado.forEach(function (blog) {
        if (blog.estado === 1) {
          $registro = "            <div class=\"col s12 m6 l4 contBlog\">\n                    <div class=\"card\">\n                        <div class=\"card-image\">\n                            <img alt=\"".concat(blog.alt, "\" style=\"width: 100%;\" class=\"\" src=\"").concat(link).concat(blog.imagen, " \">\n                        </div>\n                        <div class=\"card-content\">\n                            <span class=\"card-title\"> ").concat(blog.nombre, "</span>\n                            ").concat(blog.contenido, "\n                        </div>\n                        <div id=\"blog").concat(blog.id, "\" class=\"card-action\"> </div>\n                    </div> </div>");
          $("#blogs").append($registro);
          $.ajax({
            url: link + "api/etiquetaApi",
            //url: link2 +"api/etiquetaApi",
            type: "POST",
            data: 'id=' + blog.id,
            success: function success(resultadoT) {
              resultadoT.forEach(function (etiqueta) {
                $tags = "<button onclick=\"verBlogsEtiqueta(".concat(etiqueta.id, ")\" class=\"enlace\"> ").concat(etiqueta.nombre, "</button>");
                document.getElementById('blog' + blog.id).innerHTML += $tags;
              });
            }
          });
        }
      });
    }
  });
}
function verBlogsEtiqueta(idEtiqueta) {
  document.getElementById('circulo').classList.remove('hide');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#blogs").empty();
  $.ajax({
    url: link + "api/blogEtiquetaApi",
    //url: link2 + "api/blogEtiquetaApi",
    type: "POST",
    data: 'id=' + idEtiqueta,
    success: function success(result) {
      var resultado = JSON.parse(result);
      document.getElementById('circulo').classList.add('hide');
      resultado.forEach(function (blog) {
        if (blog.estado === 1) {
          $registro = "            <div class=\"col s12 m6 l4 contBlog\">\n                    <div class=\"card\">\n                        <div class=\"card-image\">\n                            <img alt=\"".concat(blog.alt, "\" style=\"width: 100%;\" class=\"\" src=\"").concat(link).concat(blog.imagen, " \">\n                        </div>\n                        <div class=\"card-content\">\n                            <span class=\"card-title\"> ").concat(blog.nombre, "</span>\n                            ").concat(blog.contenido, "\n                        </div>\n                        <div id=\"blog").concat(blog.id, "\" class=\"card-action\"> </div>\n                    </div> </div>");
          $("#blogs").append($registro);
          $.ajax({
            url: link + "api/etiquetaApi",
            //url: link2 + "api/etiquetaApi",
            type: "POST",
            data: 'id=' + blog.id,
            success: function success(resultadoT) {
              resultadoT.forEach(function (etiqueta) {
                $tags = "<button onclick=\"verBlogsEtiqueta(".concat(etiqueta.id, ")\"  class=\"enlace\"> ").concat(etiqueta.nombre, "</button>");
                document.getElementById('blog' + blog.id).innerHTML += $tags;
              });
            }
          });
        }
      });
    }
  });
}
function obtenerEtiquetas() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: link + "api/mostrarEtiquetaApi",
    //url: link2 + "api/mostrarEtiquetaApi",
    type: "POST",
    success: function success(resultado) {
      var $etiquetas = document.getElementById('etiquetasLista');
      resultado = JSON.parse(resultado);
      resultado.forEach(function (etiqueta) {
        console.log(etiqueta.nombre);
        var option = document.createElement('option');
        option.value = etiqueta.id;
        option.text = etiqueta.nombre;
        //$tag = `<option value="${etiqueta.id}">${etiqueta.nombre}</option>`;
        $etiquetas.appendChild(option);
      });
    }
  });
}
/******/ })()
;