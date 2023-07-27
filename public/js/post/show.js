/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/post/show.js ***!
  \***********************************/
console.log("POST SHOW JS");
var postApp = new Vue({
  el: '#postApp',
  data: {
    bartizan_id: null,
    post_id: null,
    user_id: null,
    csrf_token: null,
    is_like: null
  },
  mounted: function mounted() {
    this.bartizan_id = document.querySelector('#bartizan_id').value;
    this.post_id = document.querySelector('#post_id').value;
    this.user_id = document.querySelector('#user_id').value;
    this.is_like = document.querySelector('#like_by_this_user').value == "1" ? true : false;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    console.log(this._data);
  },
  methods: {
    shareTo: function shareTo() {
      console.log("shareTo");
    },
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
        bartizan_id: this.bartizan_id,
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
        toast("warning", "댓글을 쓰시려면 먼저 로그인해주세요.");
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
          toast("success", "댓글이 작성 되었습니다😀");
          setTimeout(function () {
            location.reload();
          }, 1000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "댓글을 작성하는 중 오류가 발생했습니다😢<br/> 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다😢<br/>잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
var userActionApp = new Vue({
  el: '#userActionApp',
  data: {
    bartizan_id: null,
    post_id: null,
    user_id: null,
    csrf_token: null
  },
  mounted: function mounted() {
    this.bartizan_id = document.querySelector('#bartizan_id').value;
    this.post_id = document.querySelector('#post_id').value;
    this.user_id = document.querySelector('#user_id').value;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    editPost: function editPost() {
      location.href = '/post/' + this.post_id + '/edit';
    },
    deletePost: function deletePost() {
      if (!confirm("게시글을 정말 삭제하시겠습니까?")) return false;
      var post_id = this.post_id;
      var bartizan_id = this.bartizan_id;
      axios["delete"]('/post/' + post_id, {
        data: null
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "게시글이 삭제 되었습니다😀<br/> 잠시 후 이전 페이지로 이동합니다!");
          setTimeout(function () {
            location.href = "/bartizan/" + bartizan_id + "/posts";
          }, 1500);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "게시글 삭제 중 오류가 발생했습니다😢<br/> 잠시 후에 다시 시도해주세요 !");
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