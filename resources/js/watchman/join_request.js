var join = new Vue({
    el: '#joinRequest',
    methods: {
        join_request: function (user_id, bartizan_id) {
            console.log('join');
            axios.post('/join',
                {
                    data: {
                        user_id: user_id,
                        bartizan_id: bartizan_id
                    }
                }).then(res => {
                console.log('response : ', message);
                if (res.data.code == 200) {
                    toast("신청 성공");
                }
            }).catch(error => {
                console.log('Error : ', error);
            });
        },
    }
});
console.log("watchman join_request js -> vue");