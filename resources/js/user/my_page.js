console.log("MY PAGE");
var myPage = new Vue({
    el: '#my_page_form',
    data: {
        name : null,
        nickname : null,
        birth : null,
        officer : null,
        csrf_token : null,
        nickname_validation : false,
        preset_nickname : null,
    },
    mounted: function(){
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        this.name = document.querySelector('input[id="preset_name"]').value;
        preset_nickname = document.querySelector('input[id="preset_nickname"]').value;
        this.nickname = preset_nickname;
        this.birth = document.querySelector('input[id="preset_birth"]').value;
        this.officer = document.querySelector('input[id="preset_officer"]').value;
    },
    methods: {
        validateNickname : function (){
            if(preset_nickname == this.nickname) return false;

            var nickname = this.nickname;
            console.log("blur ", nickname);
            axios.post('/user/validate_nickname',
                {
                    nickname : nickname
                },
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrf_token
                    }
                })
                .then(res => {
                    console.log("response", res);
                    if(res.data.code == 200){
                        toast("success", "등록가능한 닉네임입니다👍");
                        this.nickname_validation = true;
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "이미 등록되어있는 닉네임입니다🥲 다른 닉네임을 입력해주세요😀");
                        this.nickname_validation = false;
                        return false;
                    }else if(res.data.code == 302){
                        toast("warning", "\'"+ nickname + "\'은 허용되지 않는 닉네임입니다. 다른 닉네임을 입력해주세요😀");
                        this.nickname_validation = false;
                        return false;
                    }
                    else{
                        toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
                        this.nickname_validation = false;
                        return false;
                    }
                });

        },
        submitForm : function (){
            var form_data = this.$data;

            if(!this.nickname_validation) {
                toast("warning", "닉네임을 먼저 확인해주세요");
                return false;
            }

            axios.post('/user/basic_info',
                {
                    data : form_data
                },
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrf_token
                    }
                })
                .then(res => {
                    console.log("response", res);
                    if(res.data.code == 200){
                        toast("success", "정보가 저장되었습니다😀<br/> 메인화면으로 이동합니다!");
                        setTimeout(function (){
                            location.href = "/home";
                        }, 2000);
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "저장에 실패했습니다🥲 잠시 후에 다시 시도해주세요 !");
                        return false;
                    }else{
                        toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 잠시 후에 다시 시도해주시기 바랍니다");
                        return false;
                    }
                });
        }
    }
});
