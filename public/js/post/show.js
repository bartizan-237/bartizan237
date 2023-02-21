/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/post/show.js ***!
  \***********************************/
var commentApp = new Vue({
  el: '#commentApp',
  data: {
    post_id: null,
    user_id: null,
    writer: null,
    content: null,
    comment_text: "",
    csrf_token: null
  },
  mounted: function mounted() {
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    createComment: function createComment() {
      console.log("createComment", this.post_id, this.user_id);

      if (this.user_id == "") {
        toast("warning", "댓글을 쓰기 위해서는 먼저 로그인해주세요🙏 ");
        return false;
      }
    }
  }
});
/******/ })()
;