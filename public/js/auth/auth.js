/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/auth/register.js ***!
  \***************************************/
console.log("MY PAGE");
var register = new Vue({
  el: '#register',
  data: {
    member_id: null,
    email: null,
    csrf_token: null,
    id_validation: false,
    preset_nickname: null,
    appointment: false
  },
  mounted: function mounted() {
    this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    console.log("this.csrf_token", this.csrf_token);
  },
  methods: {
    validateMemberId: function validateMemberId() {
      var _this = this;

      var member_id = this.member_id;
      console.log("blur ", member_id);
      axios.post('/user/validate_member_id', {
        member_id: member_id
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          toast("success", "등록가능한 아이디입니다👍");
          _this.id_validation = true;
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "이미 등록되어있는 아이디입니다🥲 다른 아이디를 입력해주세요😀");
          _this.id_validation = false;
          return false;
        } else if (res.data.code == 302) {
          toast("warning", "\'" + member_id + "\'은 허용되지 않는 아이디입니다. 다른 아이디를 입력해주세요😀");
          _this.id_validation = false;
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
          _this.id_validation = false;
          return false;
        }
      });
    },
    submitForm: function submitForm(e) {
      e.preventDefault();
      var form_data = this.$data;
      console.log("submitForm", form_data, this);

      if (!this.id_validation) {
        toast("warning", "아이디를 먼저 확인해주세요");
        return false;
      }

      axios.post('/register', {
        data: form_data
      }, {
        headers: {
          'X-CSRF-TOKEN': this.csrf_token
        }
      }).then(function (res) {
        console.log("response", res);

        if (res.data.code == 200) {
          // toast("success", "회원가입 되었습니다😀<br/>");
          alert("회원가입이 완료되었습니다.\n확인 버튼을 누르시면 메인페이지로 이동합니다.");
          var auth_code = res.data.auth_code;
          location.href = "/home?code=" + auth_code;
          return true;
        } else if (res.data.code == 301) {
          toast("warning", "회원가입 중 서버에 일시적인 오류가 발생했습니다🥲. 잠시 후에 다시 시도해주세요 !");
          return false;
        } else {
          toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 잠시 후에 다시 시도해주시기 바랍니다");
          return false;
        }
      });
    }
  }
});
/******/ })()
;