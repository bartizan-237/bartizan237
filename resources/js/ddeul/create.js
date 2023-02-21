var quill = null;
var form_app = new Vue({
    el: '#form_app',
    data: {
        name : null,
        theme_color : null,
        category : null,
        description : null,
        csrf_token : null,
        name_validation : false
    },
    mounted: function(){
        this.name = null;
        this.theme_color = null;
        this.category = null;
        this.description = null;
        this.name_validation = null;
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    },
    methods: {
        validateName : function (){
            var name = this.name;
            console.log("blur ", name);
            axios.post('/ddeul/validate_name',
                {
                    name : name
                },
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrf_token
                    }
                })
                .then(res => {
                    console.log("response", res);
                    if(res.data.code == 200){
                        toast("success", "등록가능한 뜰 이름입니다👍");
                        this.name_validation = true;
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "이미 등록되어있는 뜰 이름입니다. 다른 이름으로 입력해주세요😀");
                        this.name_validation = false;
                        return false;
                    }else{
                        toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
                        this.name_validation = false;
                        return false;
                    }
                });

        },
        submitForm : function (){
            console.log(quill);
            this.description = document.getElementsByClassName("ql-editor")[0].innerHTML;

            console.log(quill.root.innerHtml);
            console.log(this.description);
            var form_data = this.$data;

            console.log("form_data",form_data);

            if(!this.name_validation) {
                toast("warning", "뜰 이름을 먼저 확인해주세요");
                return false;
            }

            axios.post('/ddeul',
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
                        toast("success", "뜰이 생성되었습니다😀<br/> 메인화면으로 이동합니다!");
                        setTimeout(function (){
                            location.href = "/home";
                        }, 2000);
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "뜰 생성에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
                        return false;
                    }else{
                        toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 <br/>잠시 후에 다시 시도해주시기 바랍니다");
                        return false;
                    }
                });
        }
    }
});




var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
];


quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: '#toolbar'
        // toolbar : toolbarOptions
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
    placeholder: '내용을 입력하세요',
});
