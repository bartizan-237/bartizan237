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
    AjaxController
};

Route::get('/', function () {
//    return redirect('https://www.naver.com');
    return redirect('/home');
//    $user = \Auth::user();
//    return view('welcome');
});

// Routes for User Auth
Auth::routes();

Route::get('/test', [HomeController::class, 'test']);
//Route::get('/test', [MailController::class, 'send']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get("/login/{provider}", [SocialController::class, 'redirect']);
Route::get("/login/{provider}/callback", [SocialController::class, 'Callback']);

Route::resources([
//    'bartizan' => BartizanController::class,
    'post' => PostController::class,
    'comment' => CommentController::class,
]);

Route::post("upload_image", [AjaxController::class, 'uploadImage']);

// Click LIKE
Route::post("like", [LikeController::class, 'clickLike']);

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
});

Route::group(['namespace' => 'Nation', 'prefix' => 'nation'], function() {
    Route::get("/", [NationController::class, 'index']);
    Route::get("/{nation}", [NationController::class, 'show']);
    Route::post("/search", [NationController::class, 'searchNation']);
});


// USER
Route::group(['namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'auth'
], function() {
    Route::get('/basic_info', [UserController::class, 'basicInfo']);
    Route::post('/basic_info', [UserController::class, 'saveBasicInfo']);
    Route::post('/validate_nickname', [UserController::class, 'validateNickname']);

    Route::get('/my_page', [UserController::class, 'myPage']);
    Route::get('/my_fields', [UserController::class, 'myFields']); // 관심분야
});

// 전체 분야
Route::get('/fields', [UserController::class, 'myFields']); // 관심분야

// SET JOBS
Route::get('/set_jobs', [HomeController::class, 'setJobs']);

// JOIN
Route::post('/join', [WatchmanController::class, 'join']);