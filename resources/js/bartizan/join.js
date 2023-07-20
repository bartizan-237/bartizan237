// var join = new Vue({
//     el:'#joinList',
//     method:{
//         accept : function(){
//             console.log('accpet');
//         }
//     }
// });

function accept(data){ // watchmen 테이블에 user_id와 bartizan_id 삽입
    alert('테스트 '+data);
}
function reject(){ // join_requests 테이블에서 user_id가 있는 부분 삭제
    alert('거부');
}

quill = new Quill('#editor', {
    theme: 'snow',
});