<?php

use App\Http\Controllers\DashboardPages;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("/")->group(function () {
    Route::get("/", [PagesController::class, 'index']);
    Route::get("/login", [PagesController::class, 'login']);
    Route::get("/register", [PagesController::class, 'register']);
});

Route::prefix('dashboard')->group(function () {
    Route::get("/", [DashboardPages::class, 'index']);
    Route::get("/my-articles", [DashboardPages::class, 'myArticles']);
    Route::get("/write-article", [DashboardPages::class, 'writeArticles']);
    Route::get("/user-table", [DashboardPages::class, 'userTable']);
    Route::get("/admin-table", [DashboardPages::class, 'adminTable']);
    Route::get("/category-table", [DashboardPages::class, 'categoryTable']);
    Route::get("/articles-table", [DashboardPages::class, 'articlesTable']);
    Route::get("/edit-profile", [DashboardPages::class, 'editProfile']);
    Route::get("/create-user", [DashboardPages::class, 'createUser']);
    Route::get("/create-user", [DashboardPages::class, 'createUser']);

    Route::prefix('create')->group(function () {
        Route::get('admin', [DashboardPages::class, 'createAdmin']);
        Route::get('category', [DashboardPages::class, 'createCategory']);
    });
});
