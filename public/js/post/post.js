/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************!*\
  !*** ./resources/js/post/create.js ***!
  \*************************************/
var quill = null;
var form_app = new Vue({
  el: '#form_app',
  data: {
    title: null,
    content: null,
    csrf_token: null,
    ddeul_id: null
  },
  mounted: function mounted() {
    this.title = null;
    this.content = null;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    submitForm: function submitForm() {
      console.log(quill);
      this.content = document.getElementsByClassName("ql-editor")[0].innerHTML;
      this.ddeul_id = document.getElementById("ddeul_id").value;
      console.log(quill.root.innerHtml);
      console.log(this.content);
      var form_data = this.$data;
      console.log("form_data", form_data);
      axios.post('/post', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "저장되었습니다😀");
          setTimeout(function () {
            location.href = "/home";
          }, 2000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "저장에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 <br/>잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
var toolbarOptions = [['bold', 'italic', 'underline', 'strike'], // toggled buttons
['blockquote', 'code-block'], [{
  'header': 1
}, {
  'header': 2
}], // custom button values
[{
  'list': 'ordered'
}, {
  'list': 'bullet'
}], [{
  'script': 'sub'
}, {
  'script': 'super'
}], // superscript/subscript
[{
  'indent': '-1'
}, {
  'indent': '+1'
}], // outdent/indent
[{
  'direction': 'rtl'
}], // text direction
[{
  'size': ['small', false, 'large', 'huge']
}], // custom dropdown
[{
  'header': [1, 2, 3, 4, 5, 6, false]
}], [{
  'color': []
}, {
  'background': []
}], // dropdown with defaults from theme
[{
  'font': []
}], [{
  'align': []
}], ['clean'] // remove formatting button
];
quill = new Quill('#editor', {
  theme: 'snow',
  modules: {
    toolbar: '#toolbar' // toolbar : toolbarOptions
    // toolbar:    [
    //     [ { header: [1, 2, false] }],
    //     ['bold', 'italic', 'underline'],
    //     ['image', 'code-block']
    //     [
    //         { 'color': [] },
    //         { 'background': [] }
    //     ],          // dropdown with defaults from theme
    // ]

  },
  placeholder: '내용을 입력하세요'
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
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
})();

/******/ })()
;