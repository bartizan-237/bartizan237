/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/post/show.js ***!
  \***********************************/
console.log("POST SHOW JS");
var postApp = new Vue({
  el: '#postApp',
  data: {
    ddeul_id: null,
    post_id: null,
    user_id: null,
    csrf_token: null,
    is_like: null
  },
  mounted: function mounted() {
    this.ddeul_id = document.querySelector('#ddeul_id').value;
    this.post_id = document.querySelector('#post_id').value;
    this.user_id = document.querySelector('#user_id').value;
    this.is_like = document.querySelector('#like_by_this_user').value == "1" ? true : false;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    console.log(this._data);
  },
  methods: {
    clickLike: function clickLike() {
      if (this.user_id == "") {
        toast("warning", "좋아요! 하시려면 먼저 로그인해주세요🙏");
        return false;
      }

      var to_like;

      if (this.is_like) {
        // 1 -> 0
        to_like = 0;
        this.is_like = 0;
      } else {
        // 0 -> 1
        to_like = 1;
        this.is_like = 1;
      }

      console.log("clickLike", this.post_id, this.user_id);
      console.log("clickLike TO", to_like);
      var like_data = {
        like: to_like,
        ddeul_id: this.ddeul_id,
        target_type: "post",
        // POST or COMMNET
        target_id: this.post_id,
        user_id: this.user_id
      };
      axios.post('/like', {
        data: like_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);
      });
    }
  }
});
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
    this.post_id = document.querySelector('#post_id').value;
    this.user_id = document.querySelector('#user_id').value;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    createComment: function createComment() {
      console.log("createComment", this.post_id, this.user_id);

      if (this.user_id == "") {
        toast("warning", "댓글을 쓰시려면 먼저 로그인해주세요🙏");
        return false;
      }

      var comment_data = {
        post_id: this.post_id,
        user_id: this.user_id,
        comment_text: this.comment_text
      };
      axios.post('/comment', {
        data: comment_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "댓글이 저장되었습니다😀");
          setTimeout(function () {
            location.reload();
          }, 1000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "댓글 저장에 실패했습니다😢<br/> 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다😢<br/>잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
/******/ })()
;