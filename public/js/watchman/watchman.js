/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/watchman/join_request_list.js ***!
  \****************************************************/
var join_request_list = new Vue({
  el: '#joinRequestList',
  methods: {
    test: function test() {
      console.log('test');
    },
    accept: function accept(user_id, bartizan_id) {
      console.log('accept');
      console.log('user id : ', user_id);
      console.log('bartizan id : ', bartizan_id);
      axios.post('/join/accept', {
        data: {
          user_id: user_id,
          bartizan_id: bartizan_id
        }
      }).then(function (res) {
        console.log('response : ', res.data.message);

        if (res.data.code == 200) {
          toast("success", "승인");
        } else if (res.data.code == 301) {
          toast("warning", "이미 존재하는 파수꾼입니다.");
        }

        location.reload();
      })["catch"](function (error) {
        console.log('error : ', error);
      });
    },
    reject: function reject(user_id, bartizan_id) {
      console.log('reject');
      console.log('user id : ', user_id);
      console.log('bartizan id : ', bartizan_id);
      axios.post('/join/reject', {
        data: {
          user_id: user_id,
          bartizan_id: bartizan_id
        }
      }).then(function (res) {
        console.log('response : ', res.data.message);

        if (res.data.code == 200) {
          toast("info", "반려");
        }

        location.reload();
      })["catch"](function (error) {
        console.log('error : ', error);
      });
    }
  }
});
console.log("watchman join_list js -> vue");
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/watchman/join_request.js ***!
  \***********************************************/
// var join_request = new Vue({
//     el: '#joinRequest',
//     methods: {
//         showModal: function (){
//             var modal = document.getElementById("watchmen-modal");
//             modal.style.display = "block";
//         },
//
//         join_request: function (user_id, bartizan_id) {
//             console.log('join');
//             var modal = document.getElementById("watchmen-modal");
//             modal.style.display = "none";
//             console.log("예");
//             axios.post('/bartizan/join',
//                 {
//                     data: {
//                         user_id: user_id,
//                         bartizan_id: bartizan_id
//                     }
//                 }).then(res => {
//                 console.log('response : ', res.data.message);
//                 if (res.data.code == 200) {
//                     toast("success", "신청 성공");
//                 }
//                 else if(res.data.code == 301){
//                     toast("warning", "이미 신청되었습니다.");
//                 }
//                 else if(res.data.code == 302){
//                     toast("warning", "이미 파수꾼입니다.");
//                 }
//             }).catch(error => {
//                 console.log('Error : ', error);
//             });
//         },
//
//         onCancel: function (){
//             var modal = document.getElementById("watchmen-modal");
//             modal.style.display = "none";
//             toast("info", "취소");
//             console.log("아니오");
//         },
//
//
//
//     }
// });
// console.log("watchman join_request js -> vue");
})();

/******/ })()
;