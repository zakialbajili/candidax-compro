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