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