<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCommentController;

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
    Route::post("/post/{post:slug}", [CommentController::class, "store"]);
    Route::delete("/post/{comment:id}", [CommentController::class, "destroy"]);
    Route::get("me/posts/getSlug", [PostController::class, "getSlug"]);
    Route::resource("me/posts", PostController::class);
});

Route::prefix("/")->middleware("auth", "admin")->group(function() {
    Route::resource("administrator/tags", TagController::class);
    Route::resource("administrator/posts", AdminPostController::class);
    Route::get("administrator/replies/{comment:id}", [AdminCommentController::class, "show"]);
    Route::resource("administrator/comments", AdminCommentController::class);
});