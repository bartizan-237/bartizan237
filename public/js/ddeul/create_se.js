/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************!*\
  !*** ./resources/js/ddeul/create_se.js ***!
  \*****************************************/
// $(document).ready(function (){
//
//     var submit_result;
//     var oEditors = [];
//     var oEditors2 = [];
//     var oEditors3 = [];
//
//     $(function (){
//         nhn.husky.EZCreator.createInIFrame({
//             oAppRef: oEditors,
//             elPlaceHolder: "description",
//             //SmartEditor2Skin.html 파일이 존재하는 경로
//             sSkinURI: "/smarteditor2/se_editor.html",
//             htParams : {
//                 // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
//                 bUseToolbar : true,
//                 // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
//                 bUseVerticalResizer : true,
//                 // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
//                 bUseModeChanger : true,
//                 fOnBeforeUnload : function(){
//
//                 }
//             },
//             fOnAppLoad : function(){
//                 //textarea 내용을 에디터상에 바로 뿌려주고자 할때 사용
//                 oEditors.getById["description"].exec("PASTE_HTML", [""]);
//             },
//             fCreator: "createSEditor2"
//         });
//     })
//
//
//     function submitContents() {
//         oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []); // 에디터의 내용이 textarea에 적용됩니다.
//     }
//
//     // 전송버튼 클릭이벤트
//     $("#submit_btn").click(function(event){
//         //submit 막기
//         event.preventDefault();
//         event.stopPropagation();
//
//         oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
//
//         //input 값 전부 긁어오기
//         // var input_json = {};
//         // input_json = json_info();
//
//         //등록 유효성 검사
//         createValidation();
//
//         var formData = new FormData();
//         formData.append('title', $('#title').val());
//         formData.append('board', $('#board').val());
//         formData.append('writer', $('input[name=writer]').val());
//         formData.append('title', $('#title').val());
//         formData.append('content', $('#content').val());
//
//         for(var i=0, filesTempArrLen = filesTempArr.length; i<filesTempArrLen; i++) {
//             formData.append("attachment["+i+"]", filesTempArr[i]);
//         }
//
//         console.log("SUBMIT FORM");
//         console.log($('#content').val());
//
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').val()
//             },
//             url: '/admin/article_store',
//             data: formData,
//             type: 'POST',
//             dataType: "json",
//             //enctype: 'multipart/form-data',
//             processData: false,
//             contentType: false,
//             //cache: false,
//             success: function (json) {
//
//                 location.reload();
//             },
//             error: function (response) {
//                 alert('ERROR');
//             }
//         });
//     });
// });
//
// function createValidation(){
//     submit_result = false;
//
//     submit_result = true;
// }
//
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/ddeul/create_toastui.js ***!
  \**********************************************/
// console.log("create js");
//
// const Editor = require('@toast-ui/editor');
// // const Editor = require('@toast-ui/vue-editor');
// const editor = new Editor({
//     el: document.querySelector('#editor'),
//     height: '500px',
//     initialEditType: 'wysiwyg',
//     previewStyle: 'vertical',
//     toolbarItems: [
//         // ['heading', 'bold', 'italic', 'strike'],
//         // ['hr', 'quote'],
//         // ['ul', 'ol', 'indent', 'outdent'],
//         ['heading', 'bold', 'italic', 'strike'],
//         ['hr', 'quote'],
//         ['ul', 'ol', 'task', 'indent', 'outdent'],
//         ['table', 'image', 'link'],
//         ['code', 'codeblock'],
//         ['scrollSync'],
//     ],
//     uiSize: {
//         width: '100%',
//         height: '500px'
//     },
// });
//
// editor.getMarkdown();
//
// var form_app = new Vue({
//     el: '#form_app',
//     data: {
//         name : null,
//         theme_color : null,
//         category : null,
//         description : null,
//         csrf_token : null,
//         name_validation : false
//     },
//     mounted: function(){
//         this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
//     },
//     methods: {
//         validateName : function (){
//             var name = this.name;
//             console.log("blur ", name);
//             axios.post('/ddeul/validate_name',
//                 {
//                     name : name
//                 },
//                 {
//                     headers: {
//                         'X-CSRF-TOKEN': this.csrf_token
//                     }
//                 })
//                 .then(res => {
//                     console.log("response", res);
//                     if(res.data.code == 200){
//                         toast("success", "등록가능한 뜰 이름입니다👍");
//                         this.name_validation = true;
//                         return true;
//                     }else if(res.data.code == 301){
//                         toast("warning", "이미 등록되어있는 뜰 이름입니다🥲 다른 이름으로 입력해주세요😀");
//                         this.name_validation = false;
//                         return false;
//                     }else{
//                         toast("warning", "서버에 일시적인 오류가 발생했습니다. 잠시 후에 다시 시도해주시기 바랍니다");
//                         this.name_validation = false;
//                         return false;
//                     }
//                 });
//
//         },
//         submitForm : function (){
//             var form_data = this.$data;
//
//             if(!this.name_validation) {
//                 toast("warning", "뜰 이름을 먼저 확인해주세요");
//                 return false;
//             }
//
//             axios.post('/ddeul',
//                 {
//                     data : form_data
//                 },
//                 {
//                     headers: {
//                         'X-CSRF-TOKEN': this.csrf_token
//                     }
//                 })
//                 .then(res => {
//                     console.log("response", res);
//                     if(res.data.code == 200){
//                         toast("success", "뜰이 생성되었습니다😀<br/> 메인화면으로 이동합니다!");
//                         setTimeout(function (){
//                             location.href = "/home";
//                         }, 2000);
//                         return true;
//                     }else if(res.data.code == 301){
//                         toast("warning", "뜰 생성에 실패했습니다🥲<br/> 잠시 후에 다시 시도해주세요 !");
//                         return false;
//                     }else{
//                         toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 <br/>잠시 후에 다시 시도해주시기 바랍니다");
//                         return false;
//                     }
//                 });
//         }
//     }
// });
//
//
//
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************!*\
  !*** ./resources/js/ddeul/create.js ***!
  \**************************************/
var quill = new Quill('#editor', {
  theme: 'snow'
});
})();

/******/ })()
;