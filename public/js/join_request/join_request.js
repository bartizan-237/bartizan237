/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/join_request/join_request.js ***!
  \***************************************************/
var join_request = new Vue({
  el: '#joinRequest',
  methods: {
    showModal: function showModal() {
      var modal = document.getElementById("watchmen-modal");
      modal.style.display = "block";
    },
    join_request: function join_request(user_id, bartizan_id) {
      console.log('join');
      var modal = document.getElementById("watchmen-modal");
      modal.style.display = "none";
      console.log("예");
      axios.post('/bartizan/join', {
        data: {
          user_id: user_id,
          bartizan_id: bartizan_id
        }
      }).then(function (res) {
        console.log('response : ', res.data.message);

        if (res.data.code == 200) {
          toast("success", "신청 성공");
        } else if (res.data.code == 301) {
          toast("warning", "이미 신청되었습니다.");
        } else if (res.data.code == 302) {
          toast("warning", "이미 파수꾼입니다.");
        }
      })["catch"](function (error) {
        console.log('Error : ', error);
      });
    },
    onCancel: function onCancel() {
      var modal = document.getElementById("watchmen-modal");
      modal.style.display = "none";
      toast("info", "취소");
      console.log("아니오");
    }
  }
});
console.log("watchman join_request js -> vue");
/******/ })()
;