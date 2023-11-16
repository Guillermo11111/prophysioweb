/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************!*\
  !*** ./public/js/chat.js ***!
  \***************************/
function ocultarChat() {
  var x = document.getElementById("chat");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
var linkLocal = 'http://127.0.0.1:8000/api/';
var linkHosting = 'https://prophysio.tagme.uno/public/api/';
$(document).ready(function () {
  $("#send-btn").on("click", function () {
    $value = $("#data").val();
    if ($value == "") {
      M.toast({
        html: 'Por favor, ingresa tu pregunta!'
      });
      return;
    }
    $msg = " <div class=\"col s12\">\n        <div class=\"row\">\n            <div class=\"col s1\"></div>\n            <div class=\"col s8\" style=\"border-radius: 15px; background: #efefef; padding: 12px 15px ;\">\n                <label class=\"black-text\" style=\"word-break: break-all;  font-size: 15px;\"> <b> ".concat($value, " </b> </label>\n            </div>\n            <div class=\"col s2\">\n                <center><i class=\"material-icons left black-text\" style=\"padding: 10px 10px; border-radius:50%;  margin-right:10px; background: #efefef; \" >person</i> </center>\n            </div>\n        </div>\n        </div>");
    //$("#form").append($msg);
    document.getElementById("form").innerHTML += $msg;
    $("#data").val('');

    // start ajax code
    $.ajax({
      url: linkLocal + "chatApi",
      type: 'GET',
      data: 'pregunta=' + $value,
      success: function success(result) {
        $replay = " <div class=\"col s12\">\n                    <div class=\"row\">\n                        <div class=\"col s2\">\n                            <center><i class=\"material-icons left black-text\" style=\"padding: 10px 10px; border-radius:50%; background: #C7F7F7; \" >person</i> </center>\n                        </div>\n                        <div class=\"col s8\" style=\"border-radius: 15px; background: #C7F7F7; padding: 12px 15px ; margin-left:10px;\">\n                            <label class=\"black-text\" style=\"word-break: break-all;  font-size: 15px;\"> <b> ".concat(result, " </b> </label>\n                        </div>\n                        <div class=\"col s2\"></div>\n                    </div>\n                </div>");
        $("#form").append($replay);
        // when chat goes down the scroll bar automatically comes to the bottom
        $("#form").scrollTop($("#form")[0].scrollHeight);
      }
    });
  });
});
/******/ })()
;