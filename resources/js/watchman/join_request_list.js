var join_request_list = new Vue({
    el:'#joinRequestList',
    methods:{
        test : function (){
            console.log('test');
        },
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
                console.log('response : ', res.data.message);
                if(res.data.code == 200){
                    toast("success", "승인");
                }
                else if(res.data.code == 301){
                    toast("warning", "이미 존재하는 파수꾼입니다.")
                }
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
                console.log('response : ', res.data.message);
                if(res.data.code == 200){
                    toast("info", "반려")
                }
                location.reload();
            }).catch(error=>{
                console.log('error : ', error)
            });
        }
    }
});

console.log("watchman join_request_list js -> vue");