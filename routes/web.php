<?php

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
Route::get('/admin', function () {
    return view('admin');
});
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
Route::get('/admin/article/edit', function () {
    return view('editArticle');
});
Route::get('/admin/event/edit', function () {
    return view('editEvent');
});
Route::get('/admin/partner/edit', function () {
    return view('editPartner');
});