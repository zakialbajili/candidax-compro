<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/company', function () {
    return view('company');
});
Route::get('/collaboration', function () {
    return view('collaboration');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/articles', function () {
    return view('articles');
});
Route::get('/events', function () {
    return view('events');
});

//Admin GET
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/login', function () {
    return view('adminLogin');
});
Route::get('/admin/article/add', function () {
    return view('addArticle');
});
Route::get('/admin/event/add', function () {
    return view('addEvent');
});
Route::get('/admin/partner/add', function () {
    return view('addPartner');
});
Route::get('/admin/article/edit/{id}', [ArticleController::class, 'indexEditArticle'])->name('admin.indexEditArticle');
Route::get('/admin/event/edit/{id}', [EventController::class, 'indexEditArticle'])->name('admin.indexEditArticle');
Route::get('/admin/partner/edit/{id}', [PartnerController::class, 'indexEditPartner'])->name('admin.indexEditPartner');

//Auth POST
Route::post('/api/auth/user/regist', [AuthController::class, 'registerUser'])->name('admin.registerUser');
Route::post('/api/auth/user/login', [AuthController::class, 'loginUser'])->name('admin.loginUser');

//Admin POST
Route::post('/api/create/article', [ArticleController::class,'createArticle'])->name('admin.createArticle');
Route::post('/api/create/event', [EventController::class,'createEvent'])->name('admin.createEvent');
Route::post('/api/create/partner', [PartnerController::class,'createPartner'])->name('admin.createPartner');

//Admin PUT
Route::put('/api/edit/article/{id}', [ArticleController::class,'editArticle'])->name('admin.editArticle');
Route::put('/api/edit/event/{id}', [EventController::class,'editEvent'])->name('admin.editEvent');
Route::put('/api/edit/partner/{id}', [PartnerController::class,'editPartner'])->name('admin.editPartner');

//Admin DELETE
Route::delete('/api/delete/article/{id}', [ArticleController::class, 'deleteArticle'])->name('admin.deleteArticle');
Route::delete('/api/delete/event/{id}', [EventController::class, 'deleteEvent'])->name('admin.deleteEvent');
Route::delete('/api/delete/partner/{id}', [PartnerController::class, 'deletePartner'])->name('admin.deletePartner');