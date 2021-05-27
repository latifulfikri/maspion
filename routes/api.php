<?php

use App\Http\Controllers\ApiAccount;
use App\Http\Controllers\ApiCategory;
use App\Http\Controllers\ApiPost;
use App\Http\Controllers\ApiPostBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('account')->group(function () {
    Route::get('/', [ApiAccount::class, 'index']);
    Route::post('/register', [ApiAccount::class, 'store']);
    Route::post('/login', [ApiAccount::class, 'login']);
    Route::put('/edit/{id}', [ApiAccount::class, 'update']);
    Route::put('/change-password/{id}', [ApiAccount::class, 'changePassword']);
    Route::put('/change-profile-picture/{id}', [ApiAccount::class, 'changeProfilePicture']);
    Route::delete('/delete/{id}', [ApiAccount::class, 'destroy']);
});

Route::prefix('post')->group(function () {
    Route::get('/', [ApiPost::class, 'index']);
    Route::get('/trending', [ApiPost::class, 'Trending']);
    Route::get('/late', [ApiPost::class, 'Late']);
    Route::get('/reported', [ApiPost::class, 'Reported']);
    Route::post('/store', [ApiPost::class, 'store']);
    Route::put('/edit/{id}', [ApiPost::class, 'update']);
    Route::get('/report/{id}', [ApiPost::class, 'report']);
    Route::get('/unreport/{id}', [ApiPost::class, 'unreport']);
});

Route::prefix('post-body')->group(function () {
    Route::get('/', [ApiPostBody::class, 'index']);
    Route::post('/store', [ApiPostBody::class, 'store']);
    Route::put('/edit/{id}', [ApiPostBody::class, 'update']);
    Route::delete('/delete/{id}', [ApiPostBody::class, 'destroy']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [ApiCategory::class, 'index']);
    Route::post('/store', [ApiCategory::class, 'store']);
    Route::put('/edit/{id}', [ApiCategory::class, 'update']);
    Route::delete('/delete/{id}', [ApiCategory::class, 'destroy']);
});
