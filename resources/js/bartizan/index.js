var bartizanList = new Vue({
    el: '#bartizan_list',
    data: {
        bartizans : [],
        page : null,
        search_keyword : null,
        province_keyword : null,
        continent_keyword : null,
    },
    mounted: function(){
        console.log("bartizanList mounted!");
        this._data.page = 0;
        // this.getBartizans(0);
        this.observingInfiniteScroll();
        const searchParams = new URLSearchParams(location.search);

        this._data.search_keyword = searchParams.get('search') ?? "";
        this._data.province_keyword = searchParams.get('province') ?? "";
        this._data.continent_keyword = searchParams.get('continent') ?? "";

        console.log(this._data.search_keyword, this._data.province_keyword, this._data.continent_keyword);
    },
    methods: {
        refineBartizanName : function (name){
            // 국가명에서 () 괄호 안의 텍스트 폰트크기를 작게 변환
            // ex) 그린란드(덴마크령) 에서 (덴마크령) 을 작게

            // 괄호 안의 문자열을 추출하는 정규식
            const regex = /\((.*?)\)/;
            // 정규식과 일치하는 부분을 추출
            const matches = name.match(regex);
            let result;
            if(matches && matches.length > 0) {
                let small_text = matches[0];
                let change_text = "<span class='text-xs'>" + small_text + "</span>";
                result = name.replace(small_text, change_text);
                return result;
            }else {
                return name;
            }
        },
        getBartizans : async function (page) {
            let search_keyword = this._data.search_keyword;
            let province_keyword = this._data.province_keyword;
            let continent_keyword = this._data.continent_keyword;

            let target_url = `/bartizan/scroll?page=${page}&continent=${continent_keyword}&province=${province_keyword}&search=${search_keyword}`;
            console.log("getBartizans", target_url);

            await axios.get(target_url)
                .then(function (response) {
                    console.log("response",response);

                    // 23.7.27. bartizan.watchman_info (JSON) 추가됨 >> DB 쿼리 최소화
                    // bartizan.watchman_info 를 JSON 파싱하여
                    // bartizan.watchman_obj 에 세팅

                    let new_bartizans = response.data.bartizans; // 로드된 망대 데이터

                    new_bartizans = new_bartizans.map(function(bartizan) {
                        if(bartizan.watchman_infos != null){
                            let watchman_obj = JSON.parse(bartizan.watchman_infos);
                            console.log(bartizan.name + " has watchman_infos!", watchman_obj);
                            return {
                                ...bartizan, // 기존 object
                                watchman_obj: watchman_obj // 파싱된 데이터 추가
                            };
                        } else {
                            return {
                                ...bartizan, // 기존 object
                                watchman_obj: {}
                            };
                        }
                    });

                    // bartizanList._data.bartizans.push( ...response.data.bartizans ); // spread operator
                    bartizanList._data.bartizans.push( ...new_bartizans ); // spread operator

                    // page up
                    bartizanList._data.page++;
                    if(bartizanList._data.bartizans.length == 0){
                        return false;
                    } else {
                        return true;
                    }
                }).catch(function (error) {
                    console.log("error", error);
                    return false;
                });
        },
        getBgColor : function (user_id){
            console.log("getBgColor", user_id);
            if(user_id == null || user_id == ""){
                user_id = Math.floor(Math.random() * 8); // 0부터 7 사이의 랜덤 정수 생성
            }
            let token = user_id % 8;
            let bg_color_class = "";
            switch (token){
                case 0 : bg_color_class = "bg-blue-500"; break;
                case 1 : bg_color_class = "bg-orange-500"; break;
                case 2 : bg_color_class = "bg-pink-500"; break;
                case 3 : bg_color_class = "bg-purple-500"; break;
                case 4 : bg_color_class = "bg-green-500"; break;
                case 5 : bg_color_class = "bg-teal-500"; break;
                case 6 : bg_color_class = "bg-sky-500"; break;
                case 7 : bg_color_class = "bg-yellow-500"; break;
                default : bg_color_class = "bg-blue-500";
            }
            return bg_color_class;
        },
        getRepresentativeName : function (bartizan){
            return bartizan?.watchman_obj?.representative?.name ?? "-";
        },
        getTychicusName : function (bartizan){
            return bartizan?.watchman_obj?.tychicus?.name ?? "-";
        },
        getRoundFlagImage : function (country_code) {
            let image_url = IMAGE_PATH + "/round/" + country_code.toLowerCase() + ".svg";
            return {
                backgroundImage: 'url(' + image_url + ')'
            };
        },
        moveToBartizanDetail : function (bartizan_id) {
            // location.href = "/bartizan/" + bartizan_id;

            // 23.8.26. 임시 변경
            location.href = "/bartizan/" + bartizan_id + "/nation";
        },
        observingInfiniteScroll : function (){

            console.log("observingInfiniteScroll");
            const bartizan_list = document.querySelector('#bartizan_list'); // 관찰할 대상(요소)
            const scroll_point = document.querySelector('#scroll_point'); // 관찰할 대상(요소)
            const options = {
                root: null, // 뷰포트를 기준으로 타켓의 가시성 검사
                rootMargin: '0px 0px 0px 0px', // 확장 또는 축소 X
                threshold: 0, // 타켓의 가시성 0%일 때 옵저버 실행
            };

            const onIntersect = (entries, observer) => {
                entries.forEach(async (entry) => {
                    if (entry.isIntersecting) {
                        console.log('무한 스크롤 실행');
                        let scroll_page = bartizanList._data.page;
                        let has_next_page = bartizanList.getBartizans(scroll_page);
                        console.log('scroll_page: ' + scroll_page);
                        console.log('has_next_page: ' + has_next_page);
                        if (has_next_page == false) {
                            observer.unobserve(scroll_point); // 특정 대상(요소)에 대한 관찰 중단
                            return;
                        }
                    } else {
                        console.log('무한 스크롤 X');
                    }
                });
            };

            const observer = new IntersectionObserver(onIntersect, options); // 관찰자 초기화
            observer.observe(scroll_point); // 관찰할 대상(요소) 등록
        }
    },
});

