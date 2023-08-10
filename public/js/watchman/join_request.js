/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/watchman/join_request.js ***!
  \***********************************************/
var join_request = new Vue({
  el: '#joinRequest',
  methods: {
    // showModal: function (){
    //     var modal = document.getElementById("watchmen-modal");
    //     modal.style.display = "block";
    // },
    request: function request(user_id, bartizan_id) {
      console.log('join'); // var modal = document.getElementById("watchmen-modal");
      // modal.style.display = "none";

      console.log("예");
      var name = document.getElementById('name').textContent;
      var reason = document.getElementById('reason').value;
      console.log('네임값 : ', name);
      console.log('사유값 : ', reason);

      if (name == "") {
        toast("warning", "마이페이지에서 이름을 작성해주세요.");
        return;
      }

      if (reason == "") {
        toast("warning", "신청 사유를 작성해주세요.");
        return;
      }

      axios.post('/bartizan/join', {
        data: {
          user_id: user_id,
          bartizan_id: bartizan_id,
          reason: reason
        }
      }).then(function (res) {
        console.log('response : ', res.data.message);

        if (res.data.code == 200) {
          toast("success", "신청 성공");
        } else if (res.data.code == 301) {
          toast("warning", "이미 파수꾼입니다.");
        } else if (res.data.code == 302) {
          toast("warning", "이미 신청되었습니다.");
        }
      })["catch"](function (error) {
        console.log('Error : ', error);
      });
    } // onCancel: function (){
    //     var modal = document.getElementById("watchmen-modal");
    //     modal.style.display = "none";
    //     toast("info", "취소");
    //     console.log("아니오");
    // },

  }
});
console.log("watchman join_request js -> vue");
/******/ })()
;