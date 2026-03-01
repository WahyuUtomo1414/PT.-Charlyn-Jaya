<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('pages.about');
})->name('about');

Route::get('/struktur-organisasi', function () {
    return view('pages.organization');
})->name('organization');

Route::get('/project-jasa', function () {
    return view('pages.project');
})->name('project');
