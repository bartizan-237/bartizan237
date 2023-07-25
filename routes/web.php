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
    JoinRequestController
};

Route::get('/', function () {
//    return redirect('https://www.naver.com');
    return redirect('/home');
//    $user = \Auth::user();
//    return view('welcome');
});

// Routes for User Auth
Auth::routes();

//Route::get('/test', [HomeController::class, 'test']);
//Route::get('/test', [MailController::class, 'send']);
Route::get('/test', function () { return view('test'); });
Route::get('/home', [HomeController::class, 'index'])->name('home');

// SNS Login for Kakao
Route::get("/login/{provider}", [SocialController::class, 'redirect']);
Route::get("/login/{provider}/callback", [SocialController::class, 'Callback']);

// 개인정보처리방침
Route::get('/privacy', function () {
    return view('privacy.privacy');
});

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
    Route::get("/", [BartizanController::class, 'index']);
    Route::get("/create", [BartizanController::class, 'create']);
    Route::post("/", [BartizanController::class, 'store']);
    Route::get("/{bartizan}", [BartizanController::class, 'show']);
    Route::get("/{bartizan}/edit", [BartizanController::class, 'edit']);
//    Route::post("/{bartizan}", [BartizanController::class, 'update']);
    Route::delete("/{bartizan}", [BartizanController::class, 'delete']);
    Route::post('/validate_name', [BartizanController::class, 'validateName']);
    Route::get("/{bartizan}/posts", [BartizanController::class, 'posts']);
    Route::get("/{bartizan}/posts/{post}", [BartizanController::class, 'showPost']);
//    Route::post("{bartizan}/join", [BartizanController::class, 'join']);
    Route::post("/join", [BartizanController::class, 'join']);
    Route::get("{bartizan}/join_request_list", [BartizanController::class, 'joinRequestList']);
    Route::get("{bartizan}/watchmen", [BartizanController::class, 'showWatchmen']);
});

Route::group(['namespace' => 'Nation', 'prefix' => 'nation'], function() {
    Route::get("/", [NationController::class, 'index']); // 237나라 목록
    Route::get("/main", [NationController::class, 'main']);
    Route::get("/scroll", [NationController::class, 'scroll']); // infinite scroll
    Route::get("/{nation}", [NationController::class, 'show']);
//    Route::post("/search", [NationController::class, 'searchNation']); // search는 Get parameter로 처리
});


// USER
// Route::post('/validate_member_id', [UserController::class, 'validateMemberId']); // UserController는 Auth 미들웨어 적용되어있어서, 로그인세션없이는 접근 불가

Route::group(['namespace' => 'User',
    'prefix' => 'user', // prefix : /user/*
    'middleware' => 'auth' // This Route group need AUTH
], function() {
    Route::get('/basic_info', [UserController::class, 'basicInfo']);
    Route::post('/basic_info', [UserController::class, 'saveBasicInfo']);
    Route::post('/validate_nickname', [UserController::class, 'validateNickname']);
    Route::post('/validate_member_id', [UserController::class, 'validateMemberId'])->withoutMiddleware("auth");

    Route::get('/my_page', [UserController::class, 'myPage']);
    Route::get('/quit', [UserController::class, 'quitPage']); // 회원 탈퇴
    Route::post('/quit', [UserController::class, 'quitUser'])->name("quit"); // 회원 탈퇴
    Route::get('/my_fields', [UserController::class, 'myFields']); // 관심분야
});

// 전체 분야
Route::get('/fields', [UserController::class, 'myFields']); // 관심분야

// SET JOBS
Route::get('/set_jobs', [HomeController::class, 'setJobs']);

// JOIN
//Route::group(['namespace' => 'JoinRequest'
//], function(){
//    Route::post('/join/accept', [JoinRequestController::class, 'accept']);
//});

Route::post('/join/accept', [JoinRequestController::class, 'accept']);
Route::post('/join/reject', [JoinRequestController::class, 'reject']);
