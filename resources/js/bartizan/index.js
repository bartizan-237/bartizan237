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
                    bartizanList._data.bartizans.push( ...response.data.bartizans ); // spread operator

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
        getRoundFlagImage : function (country_code) {
            let image_url = IMAGE_PATH + "/round/" + country_code.toLowerCase() + ".svg";
            return {
                backgroundImage: 'url(' + image_url + ')'
            };
        },
        moveToBartizanDetail : function (bartizan_id) {
            location.href = "/bartizan/" + bartizan_id;
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

