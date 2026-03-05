<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PenawaranPrintController;
use App\Http\Controllers\PrivateFileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FrontendAuthController;
use App\Http\Controllers\CustomerPenawaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/tentang-kami', AboutController::class)->name('about');

Route::get('/struktur-organisasi', OrganizationController::class)->name('organization');

Route::get('/penawaran/{penawaran}/print', PenawaranPrintController::class)->name('penawaran.print');

Route::get('/project-jasa', [ProjectController::class, 'index'])->name('project');
Route::get('/project-jasa/{slug}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/private-file/{path}', PrivateFileController::class)
    ->where('path', '.*')
    ->name('private-file');

// Frontend Auth
Route::get('/login', [FrontendAuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [FrontendAuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::get('/register', [FrontendAuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [FrontendAuthController::class, 'register'])->name('register.post')->middleware('guest');
Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('logout')->middleware('auth');

// Customer Penawaran (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/penawaran', [CustomerPenawaranController::class, 'index'])->name('penawaran.index');
    Route::get('/penawaran/create', [CustomerPenawaranController::class, 'create'])->name('penawaran.create');
    Route::post('/penawaran', [CustomerPenawaranController::class, 'store'])->name('penawaran.store');
    Route::get('/penawaran/{id}', [CustomerPenawaranController::class, 'show'])->name('penawaran.show');
});
