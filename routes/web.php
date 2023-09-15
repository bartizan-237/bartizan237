<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    MailController,
    SocialController,
    UserController,
    BartizanController,
    NationController,
    PostController,
    CommentController,
    LikeController,
    AjaxController,
    JoinRequestController,
    JobController,
    WatchmanController
};

use App\Http\Controllers\Admin\{
    DashboardController,
    BartizanController as AdminBartizanController,
};

Route::get('/', function () { return redirect('/home'); });
//Route::get('/', function () { return redirect('/bartizan/main'); });

// Routes for User Auth
Auth::routes();
Route::get('/welcome', function () { return view('welcome'); }); // 회원가입 완료 후 리디렉션

//Route::get('/test', [HomeController::class, 'test']);
//Route::get('/test', [MailController::class, 'send']);
Route::get('/test', function () { return view('test'); });
//Route::get('/test2', function () { return view('test2'); });
//Route::get('/make', [NationController::class, 'createBartizans']);
Route::get('/sync', [WatchmanController::class, 'sync']); // 작정자 명단 동기화

Route::get('/home', [HomeController::class, 'index'])->name('home');


// SNS Login for Kakao
Route::get("/login/{provider}", [SocialController::class, 'redirect']);
Route::get("/login/{provider}/callback", [SocialController::class, 'Callback']);

// 개인정보처리방침
Route::get('/privacy', function () { return view('privacy.privacy'); });

Route::post("/comment/delete", [CommentController::class, 'destroy']); // custom comment-delete
Route::resources([
//    'bartizan' => BartizanController::class,
    'post' => PostController::class,
    'comment' => CommentController::class,
]);

Route::post("upload_image", [AjaxController::class, 'uploadImage']);

// Click LIKE
Route::post("like", [LikeController::class, 'clickLike']);

// Bartizan
Route::group(['namespace' => 'Bartizan', 'prefix' => 'bartizan'], function() {
    Route::get("/", [BartizanController::class, 'index']); // 망대 목록 : 무한스크롤
    Route::get("/main", [BartizanController::class, 'main']); // 망대 메인 : 최근 게시글, 추천 게시글, 공지사항 등
    Route::get("/create", [BartizanController::class, 'create']);
    Route::get("/scroll", [BartizanController::class, 'scroll']); // infinite scroll
    Route::post("/", [BartizanController::class, 'store']);
    Route::get("/{bartizan}", [BartizanController::class, 'show']);
    Route::get("/{bartizan}/edit", [BartizanController::class, 'edit']);
    Route::put("/{bartizan}", [BartizanController::class, 'update']);

//    Route::post("/{bartizan}", [BartizanController::class, 'update']);
    Route::delete("/{bartizan}", [BartizanController::class, 'delete']);
    Route::post('/validate_name', [BartizanController::class, 'validateName']);
    Route::get("/{bartizan}/posts", [BartizanController::class, 'posts']);
    Route::get("/{bartizan}/posts/{post}", [BartizanController::class, 'showPost']);
//    Route::post("{bartizan}/join", [BartizanController::class, 'join']);
    Route::post("/join", [BartizanController::class, 'join']);
    Route::get("/{bartizan}/join_request", [BartizanController::class, 'joinRequest']);
    Route::get("{bartizan}/join_request_list", [BartizanController::class, 'joinRequestList']);
    Route::get("{bartizan}/watchmen", [BartizanController::class, 'showWatchmen']);
    Route::get("{bartizan}/nation", [BartizanController::class, 'showNation']); // 23.7.26. 망대 - 나라 페이지 통합

    Route::get("{bartizan}/pledges", [BartizanController::class, 'showPledges']); // 23.9.14. 작정자 명단
});


// 23.7.29. Redirect : nation -> bartizan
Route::get("/nation",function (){
    return redirect("/bartizan/main");
});
Route::get("/nation/main",function (){
    return redirect("/bartizan/main");
});

//Route::group(['namespace' => 'Nation', 'prefix' => 'nation'], function() {
//    Route::get("/", [NationController::class, 'index']); // 237나라 목록
//    Route::get("/main", [NationController::class, 'main']);
//    Route::get("/scroll", [NationController::class, 'scroll']); // infinite scroll
//    Route::get("/{nation}", [NationController::class, 'show']);
////    Route::post("/search", [NationController::class, 'searchNation']); // search는 Get parameter로 처리
//});


// USER
// Route::post('/validate_member_id', [UserController::class, 'validateMemberId']); // UserController는 Auth 미들웨어 적용되어있어서, 로그인세션없이는 접근 불가

Route::group(['namespace' => 'User',
    'prefix' => 'user', // prefix : /user/*
    'middleware' => 'auth' // This Route group need AUTH
], function() {
    Route::get('/basic_info', [UserController::class, 'basicInfo']);
    Route::post('/basic_info', [UserController::class, 'saveBasicInfo']);
    Route::post('/validate_nickname', [UserController::class, 'validateNickname']);
    Route::post('/validate_member_id', [UserController::class, 'validateMemberId'])->withoutMiddleware("auth"); // middleware 예외

    Route::get('/my_page', [UserController::class, 'myPage']); // 유저 정보
    Route::get('/my_page/edit', [UserController::class, 'myPageEdit']); // 유저 정보 수정
    Route::get('/bartizan', [UserController::class, 'userBartizan']); // 유저가 속해있는 망대목록
    Route::get('/post', [UserController::class, 'userPost']); // 유저가 작성한 게시글 / 댓글
    Route::get('/like', [UserController::class, 'userLike']); // 유저가 좋아요 누른 게시글

    Route::get('/quit', [UserController::class, 'quitPage']); // 회원 탈퇴
    Route::post('/quit', [UserController::class, 'quitUser'])->name("quit"); // 회원 탈퇴
    Route::get('/my_fields', [UserController::class, 'myFields']); // 관심분야
});



Route::group(['prefix' => 'admin', // prefix : /user/*
    'middleware' => 'admin' // This Route group need AUTH
], function() {
    Route::get('/', [DashboardController::class, 'dashboard']);

    Route::get('/bartizan', [AdminBartizanController::class, 'index']);
//    Route::post('/basic_info', [UserController::class, 'saveBasicInfo']);
//    Route::post('/validate_nickname', [UserController::class, 'validateNickname']);
//    Route::post('/validate_member_id', [UserController::class, 'validateMemberId'])->withoutMiddleware("auth"); // middleware 예외
//
//    Route::get('/my_page', [UserController::class, 'myPage']); // 유저 정보
//    Route::get('/my_page/edit', [UserController::class, 'myPageEdit']); // 유저 정보 수정
//    Route::get('/bartizan', [UserController::class, 'userBartizan']); // 유저가 속해있는 망대목록
//    Route::get('/post', [UserController::class, 'userPost']); // 유저가 작성한 게시글 / 댓글
//    Route::get('/like', [UserController::class, 'userLike']); // 유저가 좋아요 누른 게시글
//
//    Route::get('/quit', [UserController::class, 'quitPage']); // 회원 탈퇴
//    Route::post('/quit', [UserController::class, 'quitUser'])->name("quit"); // 회원 탈퇴
//    Route::get('/my_fields', [UserController::class, 'myFields']); // 관심분야
});



// 전체 분야
//Route::get('/fields', [UserController::class, 'myFields']); // 관심분야
Route::get('/fields', [JobController::class, 'index']); // 관심분야

// SET JOBS
//Route::get('/set_jobs', [HomeController::class, 'setJobs']);

// JOIN
//Route::group(['namespace' => 'JoinRequest'
//], function(){
//    Route::post('/join/accept', [JoinRequestController::class, 'accept']);
//});

Route::post('/join/accept', [JoinRequestController::class, 'accept']);
Route::post('/join/reject', [JoinRequestController::class, 'reject']);
