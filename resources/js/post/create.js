var quill = null;
var form_app = new Vue({
    el: '#form_app',
    data: {
        title : null,
        content : null,
        csrf_token : null,
        ddeul_id : null,
    },
    mounted: function(){
        this.title = null;
        this.content = null;
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    },
    methods: {
        submitForm : function (){
            console.log(quill);
            this.content = document.getElementsByClassName("ql-editor")[0].innerHTML;
            this.ddeul_id = document.getElementById("ddeul_id").value;
            console.log(quill.root.innerHtml);
            console.log(this.content);
            var form_data = this.$data;

            console.log("form_data",form_data);

            axios.post('/post',
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
                        toast("success", "저장되었습니다😀");
                        setTimeout(function (){
                            location.href = "/home";
                        }, 2000);
                        return true;
                    }else if(res.data.code == 301){
                        toast("warning", "저장에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
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
