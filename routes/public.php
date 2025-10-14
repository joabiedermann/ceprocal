<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'verify' => false]);
Route::get('/inicio', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');
Route::post('/buscar_curso', [App\Http\Controllers\LandingController::class, 'search_course'])->name('search_course');
Route::get('/ver_curso/{id}', [App\Http\Controllers\LandingController::class, 'show_course'])->name('show_course');
Route::get('/validez_certificado/{student}/{course}/{hash}', [App\Http\Controllers\LandingController::class, 'verificate_certificate'])->name('verificate_certificate');
