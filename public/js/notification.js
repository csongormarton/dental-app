/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/notification.js ***!
  \**************************************/
window.toggleNotification = function (type, message) {
  document.getElementById(type + '-notification').classList.toggle('hidden');
  var messageElement = document.getElementById(type + '-notification-message');

  if (messageElement) {
    messageElement.textContent = message;
  }
};
/******/ })()
;