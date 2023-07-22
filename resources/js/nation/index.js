var nationList = new Vue({
    el: '#nation_list',
    data: {
        nations : [],
        page : null,
        search_keyword : null,
        province_keyword : null,
        continent_keyword : null,
    },
    mounted: function(){
        console.log("nationList mounted!");
        this._data.page = 0;
        // this.getNations(0);
        this.observingInfiniteScroll();

        const searchParams = new URLSearchParams(location.search);

        this._data.search_keyword = searchParams.get('search') ?? "";
        this._data.province_keyword = searchParams.get('province') ?? "";
        this._data.continent_keyword = searchParams.get('continent') ?? "";

        console.log(this._data.search_keyword, this._data.province_keyword, this._data.continent_keyword);
    },
    methods: {
        getNations : async function (page) {

            let search_keyword = this._data.search_keyword;
            let province_keyword = this._data.province_keyword;
            let continent_keyword = this._data.continent_keyword;

            let target_url = `/nation/scroll?page=${page}&continent=${continent_keyword}&province=${province_keyword}&search=${search_keyword}`;
            console.log("getNations", target_url);

            await axios.get(target_url)
                .then(function (response) {
                    console.log("response",response);
                    nationList._data.nations.push( ...response.data.nations ); // spread operator

                    // page up
                    nationList._data.page++;
                    if(nationList._data.nations.length == 0){
                        return false;
                    } else {
                        return true;
                    }
                }).catch(function (error) {
                    console.log("error", error);
                    return false;
                });
        },
        getBackgroundImage : function (country_code) {
            let image_url = IMAGE_PATH + "/" + country_code.toLowerCase() + ".png";
            return {
                backgroundImage: 'url(' + image_url + ')'
            };
        },
        moveToNationDetail : function (nation_id) {
            location.href = "/nation/" + nation_id;
        },
        observingInfiniteScroll : function (){

            console.log("observingInfiniteScroll");
            const nation_list = document.querySelector('#nation_list'); // 관찰할 대상(요소)
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
                        let scroll_page = nationList._data.page;
                        let has_next_page = nationList.getNations(scroll_page);
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

