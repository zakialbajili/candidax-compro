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
Route::get('/contact', function () {
    return view('contact');
});