/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/watchman/step.js ***!
  \***************************************/
var stepApp = new Vue({
  el: "step_app",
  data: function data() {
    return {
      currentStep: 1,
      steps: ['Step 1', 'Step 2', 'Step 3']
    };
  },
  mounted: function mounted() {
    console.log("MOUNTED");
  },
  methods: {
    nextStep: function nextStep() {
      console.log("nextStep");

      if (this.currentStep < this.steps.length - 1) {
        this.currentStep++;
      }
    },
    prevStep: function prevStep() {
      console.log("prevStep");

      if (this.currentStep > 0) {
        this.currentStep--;
      }
    }
  }
});
/******/ })()
;