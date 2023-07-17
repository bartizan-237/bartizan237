/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************!*\
  !*** ./resources/js/user/basic_info.js ***!
  \*****************************************/
console.log("basic info init 2");
var form_app = new Vue({
  el: '#form_app',
  data: {
    name: null,
    nickname: null,
    birth: null,
    csrf_token: null,
    nickname_validation: false
  },
  mounted: function mounted() {
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    validateNickname: function validateNickname() {
      var _this = this;

      var nickname = this.nickname;
      console.log("blur ", nickname);
      axios.post('/user/validate_nickname', {
        nickname: nickname
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "등록가능한 닉네임입니다👍");
          _this.nickname_validation = true;
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "이미 등록되어있는 닉네임입니다🥲 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else if (res.data.code == 302) {
          toast("warning", "\'" + nickname + "\'은 허용되지 않는 닉네임입니다. 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
          _this.nickname_validation = false;
          return false;
        }
      });
    },
    submitForm: function submitForm() {
      var form_data = this.$data;

      if (!this.nickname_validation) {
        toast("warning", "닉네임을 먼저 확인해주세요");
        return false;
      }

      axios.post('/user/basic_info', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "정보가 저장되었습니다😀<br/> 메인화면으로 이동합니다!");
          setTimeout(function () {
            location.href = "/home";
          }, 2000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "저장에 실패했습니다🥲 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/user/my_fields.js ***!
  \****************************************/
console.log("my fields");
var form_app = new Vue({
  el: '#my_fields_div',
  data: {},
  mounted: function mounted() {
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  },
  methods: {
    validateNickname: function validateNickname() {
      var _this = this;

      var nickname = this.nickname;
      console.log("blur ", nickname);
      axios.post('/user/validate_nickname', {
        nickname: nickname
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "등록가능한 닉네임입니다👍");
          _this.nickname_validation = true;
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "이미 등록되어있는 닉네임입니다🥲 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else if (res.data.code == 302) {
          toast("warning", "\'" + nickname + "\'은 허용되지 않는 닉네임입니다. 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
          _this.nickname_validation = false;
          return false;
        }
      });
    },
    submitForm: function submitForm() {
      var form_data = this.$data;

      if (!this.nickname_validation) {
        toast("warning", "닉네임을 먼저 확인해주세요");
        return false;
      }

      axios.post('/user/basic_info', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "정보가 저장되었습니다😀<br/> 메인화면으로 이동합니다!");
          setTimeout(function () {
            location.href = "/home";
          }, 2000);
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "저장에 실패했습니다🥲 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************!*\
  !*** ./resources/js/user/my_page.js ***!
  \**************************************/
console.log("MY PAGE");
var myPage = new Vue({
  el: '#my_page_form',
  data: {
    name: null,
    nickname: null,
    birth: null,
    officer: null,
    csrf_token: null,
    nickname_validation: false,
    preset_nickname: null,
    appointment: false
  },
  mounted: function mounted() {
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    this.name = document.querySelector('input[id="preset_name"]').value;
    var preset_nickname = document.querySelector('input[id="preset_nickname"]').value;
    console.log("preset_nickname", preset_nickname);
    this.preset_nickname = preset_nickname;
    this.nickname = preset_nickname;
    this.birth = document.querySelector('input[id="preset_birth"]').value;
    this.officer = document.querySelector('input[id="preset_officer"]').value;
    var preset_appointment = document.querySelector('input[id="preset_appointment"]').value;
    console.log("preset_appointment", preset_appointment);

    if (preset_appointment == 1 || preset_appointment == "1") {
      this.appointment = true;
    } else {
      this.appointment = false;
    }
  },
  methods: {
    validateNickname: function validateNickname() {
      var _this = this;

      if (preset_nickname == this.nickname) return false;
      var nickname = this.nickname;
      console.log("blur ", nickname);
      axios.post('/user/validate_nickname', {
        nickname: nickname
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "등록가능한 닉네임입니다👍");
          _this.nickname_validation = true;
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "이미 등록되어있는 닉네임입니다🥲 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else if (res.data.code == 302) {
          toast("warning", "\'" + nickname + "\'은 허용되지 않는 닉네임입니다. 다른 닉네임을 입력해주세요😀");
          _this.nickname_validation = false;
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
          _this.nickname_validation = false;
          return false;
        }
      });
    },
    submitForm: function submitForm() {
      var form_data = this.$data;
      console.log("submitForm", form_data, this);

      if (this.preset_nickname != this.nickname) {
        // 닉네임 변경
        if (!this.nickname_validation) {
          toast("warning", "닉네임을 먼저 확인해주세요");
          return false;
        }
      }

      axios.post('/user/basic_info', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "정보가 저장되었습니다😀<br/>"); // setTimeout(function (){
          //     location.href = "/home";
          // }, 2000);

          return true;
        } else if (res.data.code == 301) {
          toast("warning", "저장에 실패했습니다🥲 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
})();

/******/ })()
;