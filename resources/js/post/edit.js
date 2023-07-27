console.log("POST EDIT");
var quill = null;
var form_app = new Vue({
    el: '#form_app',
    data: {
        post_id : null,
        title : null,
        content : null,
        csrf_token : null,
        bartizan_id : null,
    },
    mounted: function(){
        console.log(post_data);
        this.title = post_data.title;
        this.content = post_data.content;
        this.post_id = document.querySelector('#post_id').value;
        this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    },
    methods: {
        submitForm : function (){
            console.log(quill);
            this.content = document.getElementsByClassName("ql-editor")[0].innerHTML;
            this.bartizan_id = document.getElementById("bartizan_id").value;
            console.log(quill.root.innerHtml);
            console.log(this.content);
            let bartizan_id = this.bartizan_id;
            var form_data = this.$data;

            console.log("form_data",form_data);

            let post_id = this.post_id;
            axios.put('/post/' + post_id,
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
                        toast("success", "게시글이 수정되었습니다😀<br/> 잠시 후 이전 페이지로 이동합니다!");
                        setTimeout(function (){
                            location.href = "/bartizan/" + bartizan_id + "/posts/" + post_id;
                        }, 1500);
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



function selectLocalImage() {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.click();

    input.onchange = function() {
        var file = input.files[0];

        if (/^image\//.test(file.type)) {
            saveToServer(file);
        } else {
            console.warn('You could only upload images.');
        }
    };
}


function saveToServer(file) {
    var fd = new FormData();
    fd.append('image', file);

    console.log("FormData",fd);

    fetch('/upload_image', {
        method: 'POST',
        body: fd
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            console.log("saveToServer response json", json);
            insertToEditor(json.url);
        });
}

function insertToEditor(url) {
    console.log("insertToEditor", url);
    var range = quill.getSelection();

    if(url.indexOf("http") != -1){
        quill.insertEmbed(range.index, 'image', url);
    } else {
        quill.insertEmbed(range.index, 'image', "https://platform.237.co.kr/" + url);
    }
}


quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: '#toolbar',
        // handlers: {
        //     'image': function() {
        //         // 23.3.9. Dynamic Image Upload
        //         // POST data to server
        //         // UPLOAD image to CLOUD
        //         selectLocalImage();
        //     }
        // }
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

quill.getModule("toolbar").addHandler("image", selectLocalImage);
quill.clipboard.dangerouslyPasteHTML(post_data.content); // 이전 게시글 데이터