var join = new Vue({
    el:'#joinList',
    methods:{
        accept : function(user_id, bartizan_id){
            console.log('accept');
            console.log('user id : ', user_id);
            console.log('bartizan id : ', bartizan_id);
            axios.post('/join/accept',
                {
                    data : {
                        user_id : user_id,
                        bartizan_id : bartizan_id
                    }
                }).then(res=>{
                    console.log('response : ', res);
            }).catch(error=>{
                console.log('error : ', error)
            });
            console.log('end')
        },
        reject : function(){
            console.log('reject');
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
