/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/appbar.js ***!
  \********************************/
console.log("APPBAR.JS");
var app = new Vue({
  el: "#app",
  data: {
    menu_open: false
  },
  mounted: function mounted() {},
  methods: {
    toggleMenu: function toggleMenu() {
      this.menu_open = !this.menu_open;
      console.log("toggleMenu", this.menu_open);
    }
  }
});
/******/ })()
;