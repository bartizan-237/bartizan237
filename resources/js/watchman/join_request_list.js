var join_request_list = new Vue({
    el:'#joinRequestList',
    methods:{
        showReason: function (user_id){
            var reason = document.getElementById(user_id);
            var reject_reason = document.getElementById("reject_"+user_id);
            if(reason.classList.contains("hidden")){
                reason.classList.remove("hidden");
                return
            }
            reason.classList.add("hidden");
            reject_reason.classList.add("hidden");
        },
        reject_input : function (user_id){
            var reason = document.getElementById("reject_"+user_id);
            if(reason.classList.contains("hidden")){
                reason.classList.remove("hidden");
                return
            }
            reason.classList.add("hidden");
        },

        // accept : function(user_id, bartizan_id){
        //     console.log('accept');
        //     console.log('user id : ', user_id);
        //     console.log('bartizan id : ', bartizan_id);
        //     axios.post('/join/accept',
        //         {
        //             data : {
        //                 user_id : user_id,
        //                 bartizan_id : bartizan_id
        //             }
        //         }).then(res=>{
        //         console.log('response : ', res.data.message);
        //         if(res.data.code == 200){
        //             toast("success", "승인");
        //         }
        //         else if(res.data.code == 301){
        //             toast("warning", "이미 존재하는 파수꾼입니다.")
        //         }
        //         location.reload();
        //     }).catch(error=>{
        //         console.log('error : ', error);
        //     });
        // },

        reject : function(user_id, bartizan_id){
            console.log('reject');
            const reject_confirm = confirm("반려하시겠습니까?");
            if(reject_confirm){
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
    }
});

console.log("watchman join_request_list js -> vue");