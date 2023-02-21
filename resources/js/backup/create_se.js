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
