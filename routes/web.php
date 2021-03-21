<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
});

Route::get('/pessoa',   [PersonController::class,   'index'])->name('person.index');
Route::get('/endereco', [AddressController::class,  'index'])->name('address.index');
Route::get('/telefone', [PhoneController::class,    'index'])->name('phone.index');

