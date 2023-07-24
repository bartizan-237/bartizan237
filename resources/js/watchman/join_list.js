var join = new Vue({
    el:'#joinList',
    methods:{
        // join_request : function (user_id, bartizan_id){
        //     console.log('join');
        //     axios.post('/join',
        //         {
        //             data : {
        //                 user_id : user_id,
        //                 bartizan_id : bartizan_id
        //             }
        //         }).then(res => {
        //         console.log('response : ', message);
        //         if (res.data.code == 200) {
        //             toast("신청 성공");
        //         }
        //     }).catch(error => {
        //         console.log('Error : ', error);
        //     });
        // },

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
                    location.reload();
            }).catch(error=>{
                console.log('error : ', error);
            });
        },

        reject : function(user_id, bartizan_id){
            console.log('reject');
            console.log('user id : ', user_id);
            console.log('bartizan id : ', bartizan_id);
            axios.post('/join/reject',
                {
                    data : {
                        user_id : user_id,
                        bartizan_id : bartizan_id
                    }
                }).then(res=>{
                    console.log('response : ', res);
                    location.reload();
            }).catch(error=>{
                console.log('error : ', error)
            });
        }
    }
});

console.log("watchman join_list js -> vue");

// function accept1(){ // watchmen 테이블에 user_id와 bartizan_id 삽입
//     console.log('수락');
// }
// function reject(){ // join_requests 테이블에서 user_id가 있는 부분 삭제
//     alert('거부');
// }
