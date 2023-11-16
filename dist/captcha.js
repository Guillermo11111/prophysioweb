/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./public/js/captcha.js ***!
  \******************************/
document.addEventListener('submit', function (e) {
  e.preventDefault();
  grecaptcha.ready(function () {
    grecaptcha.execute('6LcztLgkAAAAAAkhcLxVC0asNYzPNM6A-CGgGK5Q', {
      action: 'submit'
    }).then(function (token) {
      var form = e.target;
      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'g-recaptcha-response';
      input.value = token;
      form.appendChild(input);
      form.submit();
    });
  });
});
/******/ })()
;