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
