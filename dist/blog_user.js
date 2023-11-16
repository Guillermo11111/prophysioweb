/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./public/js/blog_user.js":
/*!********************************!*\
  !*** ./public/js/blog_user.js ***!
  \********************************/
/***/ (() => {

var opcionCambiada = function opcionCambiada() {
  if ($etiquetas.value === 'all') {
    verBlogs();
  } else {
    verBlogsEtiqueta($etiquetas.value);
  }
};
var $etiquetas = document.getElementById('etiquetasLista');
$etiquetas.addEventListener("change", opcionCambiada);
function verBlogs() {
  document.getElementById('circulo').classList.remove('hide');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#blogs").empty();
  $.ajax({
    url: "http://localhost/prophysio/public/api/blogsApi",
    type: "POST",
    success: function success(result) {
      var resultado = JSON.parse(result);
      document.getElementById('circulo').classList.add('hide');
      resultado.forEach(function (blog) {
        if (blog.estado === 1) {
          $registro = "            <div class=\"col s12 m6 l4 contBlog\">\n                    <div class=\"card\">\n                        <div class=\"card-image\">\n                            <img alt=\"".concat(blog.alt, "\" style=\"width: 100%;\" class=\"responsive-img\" src=\"../").concat(blog.imagen, " \">\n                        </div>\n                        <div class=\"card-content\">\n                            <span class=\"card-title\"> ").concat(blog.nombre, "</span>\n                            ").concat(blog.contenido, "\n                        </div>\n                        <div id=\"blog").concat(blog.id, "\" class=\"card-action\"> </div>\n                    </div> </div>");
          $("#blogs").append($registro);
          $.ajax({
            url: "http://localhost/prophysio/public/api/etiquetaApi",
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
    url: "http://localhost/prophysio/public/api/blogEtiquetaApi",
    type: "POST",
    data: 'id=' + idEtiqueta,
    success: function success(result) {
      var resultado = JSON.parse(result);
      document.getElementById('circulo').classList.add('hide');
      resultado.forEach(function (blog) {
        if (blog.estado === 1) {
          $registro = "            <div class=\"col s12 m6 l4 contBlog\">\n                    <div class=\"card\">\n                        <div class=\"card-image\">\n                            <img alt=\"".concat(blog.alt, "\" style=\"width: 100%;\" class=\"responsive-img\" src=\"../").concat(blog.imagen, " \">\n                        </div>\n                        <div class=\"card-content\">\n                            <span class=\"card-title\"> ").concat(blog.nombre, "</span>\n                            ").concat(blog.contenido, "\n                        </div>\n                        <div id=\"blog").concat(blog.id, "\" class=\"card-action\"> </div>\n                    </div> </div>");
          $("#blogs").append($registro);
          $.ajax({
            url: "http://localhost/prophysio/public/api/etiquetaApi",
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
    url: "http://localhost/prophysio/public/api/mostrarEtiquetaApi",
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

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/blog_user": 0,
/******/ 			"app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["app"], () => (__webpack_require__("./public/js/blog_user.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;