<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DdeulController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;


Route::get('/', function () {
    return redirect('/home');
//    $user = \Auth::user();
//    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get("/login/{provider}", [SocialController::class, 'redirect']);
Route::get("/login/{provider}/callback", [SocialController::class, 'Callback']);

Route::resources([
//    'ddeul' => DdeulController::class,
    'post' => PostController::class,
    'comment' => CommentController::class,
]);

// Click LIKE
Route::post("like", [LikeController::class, 'clickLike']);

Route::group(['namespace' => 'Ddeul', 'prefix' => 'ddeul'], function() {
    Route::get("/", [DdeulController::class, 'index']);
    Route::get("/create", [DdeulController::class, 'create']);
    Route::post("/", [DdeulController::class, 'store']);
    Route::get("/{ddeul}", [DdeulController::class, 'show']);
    Route::get("/{ddeul}/edit", [DdeulController::class, 'edit']);
//    Route::post("/{ddeul}", [DdeulController::class, 'update']);
    Route::delete("/{ddeul}", [DdeulController::class, 'delete']);
    Route::post('/validate_name', [DdeulController::class, 'validateName']);
    Route::get("/{ddeul}/posts", [DdeulController::class, 'posts']);
    Route::get("/{ddeul}/posts/{post}", [DdeulController::class, 'showPost']);
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
});

// SET JOBS
Route::get('/set_jobs', [HomeController::class, 'setJobs']);
