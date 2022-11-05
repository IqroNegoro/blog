<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get("/", [HomeController::class, "index"])->name("/");
Route::get("/user/{user:id}", [UserController::class, "show"]);
Route::get("/post/{post:slug}", [PostController::class, "show"]);


Route::prefix("/")->middleware("guest")->group(function() {
    Route::get("login", [AuthController::class, "loginView"]);
    Route::post("login", [AuthController::class, "loginAuth"]);
    Route::post("register", [AuthController::class, "registerAuth"]);
});

Route::prefix("/")->middleware("auth")->group(function() {
    Route::post("logout", [AuthController::class, "logoutAuth"]);
    Route::put("/post/{post:slug}", [PostController::class, "update"]);
    Route::get("me/posts/getSlug", [PostController::class, "getSlug"]);
    Route::resource("me/posts", PostController::class);
});