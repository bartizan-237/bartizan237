/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/bartizan/create.js ***!
  \*****************************************/
var quill = null;
var form_app = new Vue({
  el: '#form_app',
  data: {
    name: null,
    nation_id: null,
    description: null,
    csrf_token: null
  },
  mounted: function mounted() {
    this.name = null;
    this.nation_id = null;
    this.category = null;
    this.description = null;
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  computed: {
    selectedtext: {
      cache: false,
      //get selectedtext by jquery
      get: function get() {
        return $(this.$el).find(":selected").text();
      }
    }
  },
  methods: {
    setBartizanName: function setBartizanName() {
      var selectElement = document.querySelector('#nation_id');
      var selectedOption = selectElement.options[selectElement.selectedIndex];
      var selectedOptionText = selectedOption.textContent;
      this.name = selectedOptionText;
      console.log("setBartizanName", this.nation_id, this.name); // var nation_name = this.
    },
    submitForm: function submitForm() {
      console.log(quill);
      this.description = document.getElementsByClassName("ql-editor")[0].innerHTML;
      console.log(quill.root.innerHtml);
      console.log(this.description);
      var form_data = this.$data;
      console.log("form_data", form_data);

      if (!this.nation_id) {
        toast("warning", "국가를 먼저 선택해주세요!");
        return false;
      }

      axios.post('/bartizan', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "망대가 생성되었습니다😀<br/> 메인화면으로 이동합니다!");
          setTimeout(function () {
            location.href = "/home";
          }, 2000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "망대 생성에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
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
/******/ })()
;