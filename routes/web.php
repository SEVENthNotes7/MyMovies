<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_webController;
use App\Http\Controllers\client_webController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    // views.
    Route::get('/', [client_webController::class, 'viewLogin'])->name('view.login');
    Route::get('/login', [client_webController::class, 'viewLogin'])->name('view.login');
    Route::get('/register', [client_webController::class, 'viewRegister'])->name('view.register');
    // cancel routes.
    Route::get('/cancelregister', [client_webController::class, 'cancelRegister'])->name('cancel.register');
    // register new account.
    Route::post('/registernewaccount', [client_webController::class, 'registerAccount'])->name('register.account');
    // login auth.
    Route::post('/validatelogin', [client_webController::class, 'validateLogin'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    //
    // client routes.
    //

    // view home and navbar.
    Route::get('/home', [client_webController::class, 'viewHome'])->name('Home');
    Route::get('/myvideos/{id}', [client_webController::class, 'viewMyVideos'])->name('view.myvideos');
    Route::get('/profile/{id}', [client_webController::class, 'myProfile'])->name('view.profile');
    // user video uploader.
    Route::post('/uploaduservideo/{id}', [client_webController::class, 'userUploadVideo'])->name('user.uploader.video');
    // page video player.
    Route::get('/videoplayer/{id}', [client_webController::class, 'videoPlayer'])->name('video.player');
    // view edit user video.
    Route::get('/editvideo/{id}', [client_webController::class, 'editUserVideo'])->name('edit.user.video');
    // delete video.
    Route::get('deletevideo/{id}/{image}/{video}', [client_webController::class, 'userDeleteVideo'])->name('user.delete.video');
    // update user video.
    Route::post('/updateuservideo/{id}', [client_webController::class, 'updateUserVideos'])->name('update.user.video');

    // logout.
    Route::get('logout', [client_webController::class, 'logout'])->name('logout');
});
