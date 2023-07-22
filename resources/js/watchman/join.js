var join = new Vue({
    el:'#joinList',
    methods:{
        accept1 : function(){
            console.log('accpet');
        }
    }
});

console.log("watchman join js -> vue");

// function accept1(){ // watchmen 테이블에 user_id와 bartizan_id 삽입
//     console.log('수락');
// }
// function reject(){ // join_requests 테이블에서 user_id가 있는 부분 삭제
//     alert('거부');
// }
