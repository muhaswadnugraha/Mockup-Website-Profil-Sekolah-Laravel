<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/pengajar', function () {
    return view('pengajar');
});

Route::get('/prestasi', function () {
    return view('prestasi');
});

Route::get('/ekstrakurikuler', function () {
    return view('ekstrakurikuler');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/profil', function () {
    return view('profil');
});