<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
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
Route::get('/admin/event/edit', function () {
    return view('editEvent');
});
Route::get('/admin/partner/edit', function () {
    return view('editPartner');
});

//Admin POST
Route::post('/api/create/article', [ArticleController::class,'createArticle'])->name('admin.createArticle');
Route::post('/api/create/event', [EventController::class,'createEvent'])->name('admin.createEvent');
Route::post('/api/create/partner', [PartnerController::class,'createPartner'])->name('admin.createPartner');

//Admin PUT
Route::put('/api/edit/article/{id}', [ArticleController::class,'editArticle'])->name('admin.editArticle');
Route::put('/api/edit/event/{id}', [EventController::class,'editEvent'])->name('admin.editEvent');