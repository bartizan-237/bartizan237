var quill = null;

var form_app = new Vue({
    el: '#edit_form_app',
    data: {
        bartizan_id : null,
        name : null,
        nation_id : null,
        description : null,
        csrf_token : null,
    },
    mounted: function(){
        console.log("edit_form_app");
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        this.bartizan_id = document.querySelector("#bartizan_id").value;
        this.name = document.querySelector("#preset_name").value;
        this.nation_id = document.querySelector("#preset_nation_id").value;

        // 수정 전 description 데이터 적용
        this.description = document.querySelector("#preset_description").textContent;
        console.log("this.description", this.description);
    },
    methods: {
        submitForm : function (){
            console.log(quill);
            this.description = document.getElementsByClassName("ql-editor")[0].innerHTML;

            console.log(quill.root.innerHtml);
            console.log(this.description);
            var form_data = this.$data;

            console.log("form_data",form_data);

            let bartizan_id = this.bartizan_id;
            axios.put('/bartizan/' + bartizan_id,
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
                        toast("success", "망대 정보가 수정되었습니다😀<br/> 메인화면으로 이동합니다!");
                        setTimeout(function (){
                            location.href = "/home";
                        }, 2000);
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "망대 정보 수정에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
                        return false;
                    }else{
                        toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 <br/>잠시 후에 다시 시도해주시기 바랍니다");
                        return false;
                    }
                });
        }
    }
});


quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: '#toolbar'
    },
    // placeholder: '내용을 입력하세요',
});
let preset_description = document.querySelector("#preset_description").textContent;
const delta = quill.clipboard.convert(preset_description); // UPDATE Preset Data
quill.setContents(delta, 'silent')
// quill.setContents(preset_description);
