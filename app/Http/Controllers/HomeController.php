<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Nation;
use App\Models\User;
use App\Models\AuthCode;
use App\Models\Post;
use App\Models\OfficialVideo;
use App\Models\Bartizan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;
    public function __construct()
    {
//        $this->middleware('auth');
//
//        $this->middleware(function ($request, $next) {
//            $this->user = \Auth::user();
//            return $next($request);
//        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 23.7.24. 회원가입 완료 후 리디렉션될 때 유저 세션 추가
        if(isset($request->code) AND strlen($request->code) == 10){
            info("HOME : AUTH CODE = $request->code");
            if($auth_code = AuthCode::where('code', $request->code)->get()->last()){
                if($user_of_auth = User::find($auth_code->user_id)){
                    info("HOME : CREATE LOGIN SESSION = $user_of_auth->member_id");
                    \Auth::login($user_of_auth);
                }
            }
        }

        if(isset($this->user)){
            $USER = $this->user;
            if($USER->name == null OR $USER->nickname == null){
//                return view('user.basic_info'); // 이름 & 닉네임 설정은 필수
                return redirect("/user/basic_info");
            }
        }

        // 메인화면
        // 최근 망대
        // 최근 게시글

        $new_posts = Post::orderBy("id", "desc")->take(3)->get();
        $hot_posts = Post::orderBy("id", "desc")->take(3)->get();

        $youtubes = OfficialVideo::orderBy("id", "desc")->take(5)->get();


        // FAQ
        $faqs = [
            [
                'question' => "세계망대가 무엇인가요?",
                'answer' => "<b>세계망대</b>란 237 모든 나라를 실제로 살릴 수 있는 망대입니다. 모든 임마누엘 성도님들이 237나라 중 <b>나의 한 나라</b>를 작정하여 기도망대ㆍ전도망대ㆍ선교망대를 세울 것 입니다.",
            ],
            [
                'question' => "작정은 어떻게 할 수 있어요?",
                'answer' => "매주 주보에서 <b>'세계망대 파수꾼 작정현황표'</b>를 확인하셔서, 237 나라 중 비어있는 <b>빈 곳</b>에 작정하시면 됩니다. <br/> 임마누엘교회 본당에 있는 작정서에 성도님의 기본 정보와 작정하실 나라를 기재하시고 교회에 비치되어있는 작정함에 넣어주세요. <br/> 작정하신 내용은 다음주 주보에서 확인하실 수 있습니다. ",
            ],
            [
                'question' => "마음에 두고 기도하던 나라가 있는데 이미 마감되었어요😭",
                'answer' => "아쉽지만 다른 나라를 작정해주셔야합니다. 237 모든 나라에 빈 곳이 없도록, 임마누엘교회 모든 성도님들이 237나라를 마음에 품을 수 있도록 각 나라에 제한인원을 두었습니다.(장로 1명, 권사 3명, 렘넌트 2명, 성도 5명) <br/> 늘 마음에 품었던 나라를 두고 계속해서 기도하시면서, 세계망대를 세우기 위해 빈 나라를 찾아서 작정해주세요.",
            ],
            [
                'question' => "언제까지 작정해야해요?",
                'answer' => "10월 1일 주일까지 작정서를 제출해주시면 됩니다. 10월 8일 주일부터는 작정하지 않으신 분들과 중복으로 작정되신 분들을 대상으로 <b>제비뽑기</b>를 진행하게 됩니다.",
            ],
            [
                'question' => "작정은 이미 했어요! 이제는 무엇을 하면 되나요?",
                'answer' => "237나라에 망대를 세울 준비가 되셨군요🎉<br/> <b>11월 12일 임직식</b>을 시작으로 본격적인 세계망대의 활동이 시작됩니다. 이후로는 <b>세계망대플랫폼</b>에 있는 나의 망대에, 그 나라에 대한 자료와 기도제목을 기록하고, 현지의 선교사ㆍ렘넌트와 소통하며 기도ㆍ전도ㆍ선교의 망대를 세울 수 있습니다.",
            ],
        ];

        return view('home', [
            "new_posts" => $new_posts,
            "hot_posts" => $hot_posts,
            "youtubes" => $youtubes,
            "faqs" => $faqs
        ]);
    }

    public function bartizanCarousel(Request $request){
        return view('bartizan_carousel');
    }
    
    public function updateCountryCode(){

        $nations_array = ["안도라"=> "AD", "아랍에미리트"=> "AE","아프가니스탄"=> "AF","앤티가 바부다"=> "AG","앵귈라"=> "AI","알바니아"=> "AL","아르메니아"=> "AM","앙골라"=> "AO","남극"=> "AQ","아르헨티나"=> "AR","아메리칸사모아"=> "AS","오스트리아"=> "AT","오스트레일리아"=> "AU","아루바"=> "AW","올란드 제도"=> "AX","아제르바이잔"=> "AZ","보스니아 헤르체고비나"=> "BA","바베이도스"=> "BB","방글라데시"=> "BD","벨기에"=> "BE","부르키나파소"=> "BF","불가리아"=> "BG","바레인"=> "BH","부룬디"=> "BI","베냉"=> "BJ","생바르텔레미"=> "BL","버뮤다"=> "BM","브루나이"=> "BN","볼리비아"=> "BO","보네르섬"=> "BQ","브라질"=> "BR","바하마"=> "BS","부탄"=> "BT","부베섬"=> "BV","보츠와나"=> "BW","벨라루스"=> "BY","벨리즈"=> "BZ","캐나다"=> "CA","코코스 제도"=> "CC","공화국의 콩고 민주 공화국"=> "CD","중앙아프리카 공화국"=> "CF","콩고 공화국"=> "CG","스위스"=> "CH","코트디부아르"=> "CI","쿡 제도"=> "CK","칠레"=> "CL","카메룬"=> "CM","중국"=> "CN","콜롬비아"=> "CO","코스타리카"=> "CR","쿠바"=> "CU","카보베르데"=> "CV","퀴라소"=> "CW","크리스마스섬"=> "CX","키프로스"=> "CY","체코"=> "CZ","독일"=> "DE","지부티"=> "DJ","덴마크"=> "DK","도미니카 연방"=> "DM","도미니카 공화국"=> "DO","알제리"=> "DZ","에콰도르"=> "EC","에스토니아"=> "EE","이집트"=> "EG","서사하라"=> "EH","에리트레아"=> "ER","스페인"=> "ES","에티오피아"=> "ET","핀란드"=> "FI","피지"=> "FJ","포클랜드 제도"=> "FK","미크로네시아 연방"=> "FM","페로 제도"=> "FO","프랑스"=> "FR","가봉"=> "GA","영국"=> "GB","그레나다"=> "GD","조지아"=> "GE","프랑스령 기아나"=> "GF","건지섬"=> "GG","가나"=> "GH","지브롤터"=> "GI","그린란드"=> "GL","감비아"=> "GM","기니"=> "GN","과들루프"=> "GP","적도 기니"=> "GQ","그리스"=> "GR","사우스조지아 사우스샌드위치 제도"=> "GS","과테말라"=> "GT","괌"=> "GU","기니비사우"=> "GW","가이아나"=> "GY","홍콩"=> "HK","허드 맥도널드 제도"=> "HM","온두라스"=> "HN","크로아티아"=> "HR","아이티"=> "HT","헝가리"=> "HU","인도네시아"=> "ID","아일랜드"=> "IE","이스라엘"=> "IL","맨섬"=> "IM","인도"=> "IN","영국령 인도양 지역"=> "IO","이라크"=> "IQ","이란"=> "IR","아이슬란드"=> "IS","이탈리아"=> "IT","저지섬"=> "JE","자메이카"=> "JM","요르단"=> "JO","일본"=> "JP","케냐"=> "KE","키르기스스탄"=> "KG","캄보디아"=> "KH","키리바시"=> "KI","코모로"=> "KM","세인트키츠 네비스"=> "KN","조선민주주의인민공화국"=> "KP","대한민국"=> "KR","쿠웨이트"=> "KW","케이맨 제도"=> "KY","카자흐스탄"=> "KZ","라오스"=> "LA","레바논"=> "LB","세인트루시아"=> "LC","스리랑카"=> "LK","리히텐슈타인"=> "LI","라이베리아"=> "LR","레소토"=> "LS","리투아니아"=> "LT","룩셈부르크"=> "LU","라트비아"=> "LV","리비아"=> "LY","모로코"=> "MA","모나코"=> "MC","몰도바"=> "MD","몬테네그로"=> "ME","생마르탱"=> "MF","마다가스카르"=> "MG","마셜 제도"=> "MH","북마케도니아"=> "MK","말리"=> "ML","미얀마"=> "MM","몽골"=> "MN","마카오"=> "MO","북마리아나 제도"=> "MP","마르티니크"=> "MQ","모리타니"=> "MR","몬트세랫"=> "MS","몰타"=> "MT","모리셔스"=> "MU","몰디브"=> "MV","말라위"=> "MW","멕시코"=> "MX","말레이시아"=> "MY","모잠비크"=> "MZ","나미비아"=> "NA","누벨칼레도니"=> "NC","니제르"=> "NE","노퍽섬"=> "NF","나이지리아"=> "NG","니카라과"=> "NI","네덜란드"=> "NL","노르웨이"=> "NO","네팔"=> "NP","나우루"=> "NR","니우에"=> "NU","뉴질랜드"=> "NZ","오만"=> "OM","파나마"=> "PA","페루"=> "PE","프랑스령 폴리네시아"=> "PF","파푸아뉴기니"=> "PG","필리핀"=> "PH","파키스탄"=> "PK","폴란드"=> "PL","생피에르 미클롱"=> "PM","핏케언 제도"=> "PN","푸에르토리코"=> "PR","팔레스타인"=> "PS","포르투갈"=> "PT","팔라우"=> "PW","파라과이"=> "PY","카타르"=> "QA","레위니옹"=> "RE","루마니아"=> "RO","세르비아"=> "RS","러시아"=> "RU","르완다"=> "RW","사우디아라비아"=> "SA","솔로몬 제도"=> "SB","세이셸"=> "SC","수단"=> "SD","스웨덴"=> "SE","싱가포르"=> "SG","세인트헬레나"=> "SH","슬로베니아"=> "SI","스발바르 얀마옌"=> "SJ","슬로바키아"=> "SK","시에라리온"=> "SL","산마리노"=> "SM","세네갈"=> "SN","소말리아"=> "SO","수리남"=> "SR","남수단"=> "SS","상투메 프린시페"=> "ST","엘살바도르"=> "SV","신트마르턴"=> "SX","시리아"=> "SY","에스와티니"=> "SZ","터크스 케이커스 제도"=> "TC","차드"=> "TD","및 남극 프랑스령 남방 및 남극 지역"=> "TF","토고"=> "TG","태국"=> "TH","타지키스탄"=> "TJ","토켈라우"=> "TK","동티모르"=> "TL","투르크메니스탄"=> "TM","튀니지"=> "TN","통가"=> "TO","튀르키예"=> "TR","트리니다드 토바고"=> "TT","투발루"=> "TV","중화민국"=> "TW","탄자니아"=> "TZ","우크라이나"=> "UA","우간다"=> "UG","미국령 군소 제도"=> "UM","미국"=> "US","우루과이"=> "UY","우즈베키스탄"=> "UZ","바티칸 시국"=> "VA","세인트빈센트 그레나딘"=> "VC","베네수엘라"=> "VE","영국령 버진아일랜드"=> "VG","미국령 버진아일랜드"=> "VI","베트남"=> "VN","바누아투"=> "VU","왈리스 푸투나"=> "WF","사모아"=> "WS","예멘"=> "YE","마요트"=> "YT","남아프리카 공화국"=> "ZA","잠비아"=> "ZM","짐바브웨"=> "ZW"];
        foreach ($nations_array as $name => $code){
            if($nation_row = Nation::where("name", $name)->get()->last()){
                info("NATION CODE >> $name $code");
                $nation_row->update([
                    'country_code' => $code
                ]);
            }
        }
    }

    

    public function setJobs(){
        $jobs = [
            "기획전략" => [
                "게임기획", "경영기획", "광고기획", "교육기획", "기술기획", "마케팅기획", "문화기획", "브랜드기획", "사업기획", "상품기획", "서비스기획", "앱기획", "웹기획", "인사기획", "전략기획", "지점관리자", "출판기획", "행사기획", "CEO", "COO", "CTO"
            ],
            "마케팅홍보" => [
                "광고PD", "광고마케팅", "글로벌마케팅", "기업홍보", "디지털마케팅", "마케팅", "마케팅기획", "마케팅전략", "모바일마케팅", "마케팅플래너", "바이럴마케팅", "병원마케팅", "브랜드마케팅", "블로그마케팅", "비즈니스마케팅", "스포츠마케팅", "오프라인마케팅", "인플루언서마케팅", "제휴마케팅", "조사원", "체험마케팅", "콘텐츠기획", "콘텐츠마케팅", "콘텐츠에디터", "퍼포먼스마케팅", "프로덕트마케팅", "행사기획", "홍보", "AD(아트티렉터)", "AE(광고기획자)", "AM(어카운트매니저)", "B2B마케팅", "BM(브랜드매니저)", "CD(크리에이티브디렉터)", "CMO", "CRM마케팅", "CW(카피라이터)", "MW(메디컬라이터)", "SNS마케팅"
            ],
            "회계/세무/재무" => [
                "감사", "경리", "경리사무원", "공인회계사", "관세사", "관세사무원", "세무사", "재무", "전산회계", "회계", "회계사", "AICPA", "CFA", "CFO", "IR/공시", "KICPA"
            ],
            "인사/노무/HRP" => [
                "노무사", "인사", "잡매니저", "직업상담사", "채용담당자", "헤드헌터", "ER(노무관리)", "HRD", "HRM", "HR컨설팅"
            ],
            "총무/법무/사무" => [
                "법률사무원", "법무", "법무사", "변리사", "변호사", "비서", "사내변호사", "사무직", "서무", "송무비서", "수행기사", "안내데스크", "임원비서", "총무", "컴플라이언스", "특허명세사"
            ],
            "IT개발/데이터" => [
                "게임개발", "기술지원", "데이터분석가", "데이터엔지니어", "백엔드/서버개발", "보안컨설팅", "앱개발", "웹개발", "웹마스터", "유지보수", "정보보안", "퍼플리셔", "프론트엔드", "CISO", "CPO", "DBA", "FAE", "GM(게임운영)", "ICT컨설팅", "QA/테스터", "SE(시스템엔지니어)", "SI개발", "SQA"
            ],
            "디자인" => [
                "가구디자인", "건축디자인", "게임디자인", "경관디자인", "공간디자인", "공공디자인", "공예디자인", "광고디자인", "그래픽디자인", "그림작가", "디지털디자인", "로고디자인", "모바일디자인", "무대디자인", "문구디자인", "배너디자인", "북디자인", "브랜드디자인", "산업디자인", "섬유디자인", "시각디자인", "실내디자인", "애니메이터", "앱디자인", "영상디자인", "완구디자인", "웹디자인", "의상디자인", "일러스트레이터", "자동차디자인", "잡화디자인", "전시디자인", "정보디자인", "조명디자인", "주얼리디자인", "캐릭터디자인", "컨셉디자인", "컬러리스트", "콘텐츠디자인", "패브릭디자인", "패키지디자인", "패턴디자인", "편집디자인", "폰트디자인", "표지디자인", "프로모션디자인", "환경디자인", "AD(아트디렉터)", "BI디자인", "BX디자인", "CI디자인", "UI/UX디자인", "VMD"
            ],
            "영업/판매/무역" => [
                "가구판매", "가전판매", "건강식품판매", "건설영업", "관세사", "관세사무원", "광고영업", "국제무역사", "귀금속판매", "기계판매", "기술영업", "네트워크영업", "무역MR", "무역경리", "무역사무원", "무역중개인", "방문판매", "보세사", "부동산영업", "상조영업", "샵마스터", "솔루션기술영업", "시스템영업", "식품/음료영업", "식품/음료판매", "영업", "영업MD", "영업관리", "영업기획", "영업마케팅", "영업전략", "영업지원", "영업직", "영업판촉", "온라인판매", "원산지관리사", "의료기기영업", "의류무역", "의류판매", "자동차딜러", "자동차영업", "자재판매", "잡화판매", "장비영업", "정육판매", "제약영업", "주류영업", "주류판매", "증권영업", "축산물판매", "캐셔", "컴퓨터판매", "타이어판매", "통신기기판매", "티켓판매", "판매직", "포워더", "항공무역", "해상무역", "해외시장개척", "해외영업", "핸드폰판매", "호텔영업", "화장품영업", "화장품판매", "IT영업", "SI영업 "
            ],
            "고객상담/TM" => [
                "상담원", "섭외 TM", "아웃바운드", "이미지컨설턴트", "인바운드", "텔레마케터", "CS", "CX매니저"
            ],
            "구매/자재/물류" => [
                "구매", "구매관리", "구매기획", "국제물류", "물류관리", "물류기획", "물류사무원", "보세사", "유통관리", "자재관리", "재고관리", "창고관리", "포워더", "품질관리", "SCM", "SRM"
            ],
            "상품기획/MD" => [
                "기획MD", "리테일MD", "바잉MD", "브랜드MD", "슈퍼바이저", "영업MD", "오프라인MD", "온라인MD", "유통MD", "AMD", "VMD"
            ],
            "운전/운송/배송" => [
                "납품운전원", "대리운전", "라이더", "물류기사", "배송기사", "배차관리", "버스기사", "보세운송", "사택기사", "선적", "셔틀버스기사", "수행기사", "승합기사", "운전", "육상운송", "적재", "조종사", "지상조업", "지입", "차량도우미", "철도운송", "퀵서비스", "탁송기사", "택배기사", "택시기사", "통관", "포워더", "포장이사", "항공운송", "해상운송"
            ],
            "생산" => [
                "계장설계", "공장장", "공정관리", "공정설계", "공정엔지니어", "구조해석/설계", "금형설계", "기계설계", "기계조작원", "기구설계", "기술설계", "기술엔지니어", "단순생산직", "미싱사", "반도체설계", "부품설계", "생산", "생산관리", "생산기술", "생산설계", "설계엔지니어", "설비OP", "세공사", "시스템설계", "안전보건관리자", "외관검사원", "용접원", "자동제어", "자동화설계", "장비설계", "장비제어", "재단사", "전기설계", "전기제어", "전자제어", "전장설계", "절단가공", "절삭가공", "제관사", "제조", "제조가공", "제품설계", "조색사", "조선설계", "캐드원", "펌프설계", "품질검사원", "품질관리", "프로그램설계", "플랜트설계", "항공정비", "회로설계", "PSM", "QA", "QC"
            ],
            "서비스" => [
                "가사도우미", "가전제품설치", "검침원", "경비원", "경비지도사", "경호원", "관광가이드", "관광통역안내사", "나레이터", "네일리스트", "두피관리사", "라이더(배달원)", "룸메이드", "매장매니저", "매표/검표", "미용사", "미화원", "바리스타", "바텐더", "발레파킹", "벨멘/도어맨", "보석감정사", "보안요원", "부주방장", "뷰티매니저", "산후도우미", "세차원", "소믈리에", "스타일리스트", "승무원", "아쿠아리스트", "안내데스크", "안전요원", "애견미용", "애견훈련", "양조사", "영양사", "왁서", "요리사", "웨딩플래너", "육아도우미", "입주도우미", "장례지도사", "정비기사", "제과/제빵사", "조리사", "주방보조", "주방장", "주유원", "주차요원", "지배인", "지상직", "차량도우미", "체형관리사", "카페매니저", "캐셔", "커뮤니티매니저", "커플매니저", "탁송기사", "테라피스트", "파티쉐", "파티플래너", "푸드스타일리스트", "프로모터", "플로리스트", "피부관리사", "하우스맨", "해설가", "행사도우미", "호텔리어", "홀매니저", "홀서빙", "A/S기사", "GRO(컨시어지)"
            ],
            "연구/R&D" => [
                "대기측정분석사", "로봇엔지니어", "연구원", "인증심사원", "임상DM", "임상PM", "임상STAT", "환경측정분석사", "CRA(임상연구원)", "CRC(연구간호사)", "CRM(임상연구전문가)", "R&D", "R&D기획"
            ],
            "건설/건축" => [
                "가스기능사", "감리원", "감정평가사", "건물관리자", "건설견적원", "건설경리", "건축가", "건축구조설계", "건축기사", "검침원", "공무", "공인중개사", "공조냉동기사", "기계기사", "기술도해사", "기전기사", "내선전공", "내진설계", "다기능공", "대기환경기사", "도시설계", "도장공", "목공", "방수공", "배관공", "배관설계", "배전반설계", "보건관리자", "보일러기사", "보조공", "분양상담사", "비파괴검사원", "산림기사", "산림설계", "설계보조", "설계엔지니어", "소방설계", "수자원설계", "수질환경기사", "시공관리자", "시공기사", "신호수", "안전관리자", "안전보건관리자", "용접부", "작업반장", "전기기사", "전기설계", "전산/기술직", "제관사", "조경설계", "중개보조원", "지역개발컨설팅", "취부사", "캐드원", "토목기술자", "토목설계", "토양환경기사", "통신설계", "폐기물처리기사", "현장관리자", "현장기사", "환경관리자", "환경설계", "CM(건설사업관리)", "QA", "QC", "2D설계", "3D설계"
            ],
            "공공/복지" => [
                "감각통합치료사", "군인·부사관", "도서관사서", "돌봄교사", "목회자", "병역특례", "보호상담원", "사무국장", "사무직", "사회복지사", "생활복지사", "생활지도원", "생활지원사", "심리치료사", "언어치료사 ", "요양보호사", "임기제공무원", "재활교사", "직업상담사", "청소년지도사", "캠페이너", "특수교사", "평생교육사", "활동지원사"
            ],
            "의료" => [
                "간호사", "간호조무사", "놀이치료사", "도수치료사", "마취간호사", "물리치료사", "미술치료사", "방사선사", "보건의료정보관리사", "보험심사청구사", "산업간호사", "상담간호사", "수간호사", "수의사", "수의테크니션", "심리치료사", "심사간호사", "안경사", "약사", "언어치료사", "운동치료사", "음악치료사", "의공기사", "의사", "인지치료사", "임상병리사", "임상심리사", "작업치료사", "재활치료사", "전공의", "전문의", "책임간호사", "청능사/청각사", "초음파사", "치과위생사", "치기공사", "한약사", "한의사", "CRA(임상연구원)", "CRC(연구간호사)", "CRM(임상연구전문가)", "QPS간호사", "간병인", "구급차기사", "두피관리사", "병동보호사", "병원경리", "병원총무", "병원코디네이터", "병원행정사", "보건관리자", "비만관리사", "상담실장", "심리운동사", "약국전산원", "영양사", "요양보호사", "운동처방사", "위생사", "응급구조사", "의지보조기기사", "정신과보호사", "MR"
            ],
            "교육" => [
                "공부방교사", "과외", "교관", "교수설계", "교육운영", "교육컨설턴트", "교육컨텐츠개발", "교육컨텐츠기획", "교재개발", "교직원", "대학강사", "돌봄교사", "바리스타강사", "방과후교사", "방문교사", "보건강사", "보육교사", "보조강사", "상담교사", "원어민강사", "입학사정관", "조교", "직업훈련", "청소년지도사", "컴퓨터교육", "코치", "특수교사", "파트강사", "퍼포먼스강사", "평생교육사", "학습매니저", "학원강사", "학원보조", "훈련교사", "CS강사", "IT강사"
            ],
            "미디어/문화/스포츠" => [
                "가수", "기상캐스터", "기술감독", "기자", "도슨트", "리포터", "방송BJ", "방송엔지니어", "사운드엔지니어", "선수", "성우", "쇼호스트", "스크립터", "스포츠강사", "스포츠에이전트", "아나운서", "에디터", "연예매니저", "영상디자이너", "영화감독", "영화기획", "영화미술", "영화제작", "음반기획", "음반유통", "인플루언서", "작가", "작곡", "재활치료사", "촬영감독", "캐디", "캐스팅매니저", "컬러리스트", "코치", "큐레이터", "크리에이터", "테크니컬라이터", "통/번역", "트레이너", "패션모델", "포토그래퍼", "프리뷰어", "피팅모델", "해설가", "AD", "AE", "CW", "DJ", "FC", "MC", "PD/AD/FD"
            ],
            "금융/보험" => [
                "금융사무", "금융상품영업", "대출상담사", "보험상담", "보험상품개발", "보험설계사", "보험심사", "손해사정사", "심사역", "애널리스트", "텔러", "펀드매니저", "기업금융", "기업분석", "기업심사", "담보대출", "대출심사", "배상", "배상책임", "보험사고", "보험청구", "부동산투자", "손해보험", "손해평가", "신탁", "여신심사", "외환관리", "위험관리", "위험분석", "자산운용", "재무분석", "재물손해사정", "주식영업", "주식투자", "채권관리", "채권추심", "투자검토", "투자분석", "투자심사", "투자자문", "투자자산", "펀드", "환전", "DCM", "ECM", "NPL", "PF영업", "공제기관", "사금융권", "생명보험사", "선물중개회사", "손해보험사", "일반은행", "자산운용사", "저축은행", "제2금융권", "증권사", "투자자문사", "특수은행"
            ]
        ];

        foreach($jobs as $industry => $job_names){
            foreach($job_names as $i => $job){
                Job::create([
                    'industry' => $industry,
                    'name' => $job
                ]);
            }
        }
    }
}
