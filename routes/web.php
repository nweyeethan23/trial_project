<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//for home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//for user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
//for long vocation
Route::get('/long_vocation', [App\Http\Controllers\LongVocationController::class, 'index'])->name('long_vocation');
Route::post('/long_vocation/add', [App\Http\Controllers\LongVocationController::class, 'addVocation'])->name('add_vocation');
Route::post('/long_vocation/delete', [App\Http\Controllers\LongVocationController::class, 'delete'])->name('vocation_delete');
// for clinics hour
Route::get('/clinics_hour', [App\Http\Controllers\ClinicsController::class, 'index'])->name('clinics');
Route::get('/clinics_hour/add_hour', [App\Http\Controllers\ClinicsController::class, 'addHour'])->name('add_hour');
Route::post('/clinics_hour/insert_hour', [App\Http\Controllers\ClinicsController::class, 'insertHour'])->name('insert_hour');