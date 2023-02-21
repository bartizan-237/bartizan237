<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

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
    public function index()
    {
        if(isset($this->user)){
            $USER = $this->user;
            if($USER->name == null OR $USER->nickname == null){
//                return view('user.basic_info'); // 이름 & 닉네임 설정은 필수
                return redirect("/user/basic_info");
            }
        }

        return view('home');
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
